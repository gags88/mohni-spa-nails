#!/usr/bin/env php
<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

const EXIT_CONFIGURATION = 2;
const EXIT_REVIEW_REQUIRED = 3;
const SQUARE_API_VERSION_DEFAULT = '2026-09-16';

$root = dirname(__DIR__);
require $root.'/vendor/autoload.php';

if (class_exists(Dotenv\Dotenv::class)) {
    Dotenv\Dotenv::createImmutable($root)->safeLoad();
}

$options = getopt('', [
    'apply',
    'create-categories',
    'include-starting-prices',
    'list-locations',
    'seed-sandbox',
    'validate',
    'help',
]);

if (isset($options['help'])) {
    echo <<<'HELP'
Square service catalog sync

Usage:
  php scripts/sync_square_services.php --validate
  php scripts/sync_square_services.php --list-locations
  php scripts/sync_square_services.php
  php scripts/sync_square_services.php --apply
  php scripts/sync_square_services.php --apply --create-categories
  php scripts/sync_square_services.php --apply --create-categories --seed-sandbox

The default mode is a read-only dry run. --apply updates only uniquely matched
appointment services. Missing and ambiguous services are always skipped.

Options:
  --validate                 Validate the website pricing manifest; no API call.
  --list-locations           List Square locations for the configured environment.
  --apply                    Apply the displayed price/category changes.
  --create-categories        Create missing categories before applying changes.
  --seed-sandbox             Create missing website services (Sandbox only).
  --include-starting-prices  Sync the numeric base of labels such as "$85+".
  --help                     Show this help.

HELP;
    exit(0);
}

$pricing = require $root.'/config/service-pricing.php';
$laserPricing = require $root.'/config/laser-pricing.php';
$manifest = buildManifest($pricing, $laserPricing);
$manifestErrors = validateManifest($manifest);

if ($manifestErrors) {
    fwrite(STDERR, "Manifest validation failed:\n - ".implode("\n - ", $manifestErrors)."\n");
    exit(EXIT_CONFIGURATION);
}

echo 'Validated '.count($manifest)." website service prices.\n";

if (isset($options['validate'])) {
    echo "No Square API request was made.\n";
    exit(0);
}

$token = envValue('SQUARE_ACCESS_TOKEN');
$environment = strtolower(envValue('SQUARE_ENVIRONMENT', 'production'));
$locationId = envValue('SQUARE_LOCATION_ID', 'LDNGWM2MCEDEJ');
$apiVersion = envValue('SQUARE_API_VERSION', SQUARE_API_VERSION_DEFAULT);
$currency = strtoupper(envValue('SQUARE_CURRENCY', 'CAD'));
$defaultDurationMinutes = (int) envValue('SQUARE_DEFAULT_SERVICE_DURATION_MINUTES', '30');

if ($token === '') {
    fwrite(STDERR, "SQUARE_ACCESS_TOKEN is missing. Add it to .env; never commit the token.\n");
    exit(EXIT_CONFIGURATION);
}

if (!in_array($environment, ['production', 'sandbox'], true)) {
    fwrite(STDERR, "SQUARE_ENVIRONMENT must be production or sandbox.\n");
    exit(EXIT_CONFIGURATION);
}

if (isset($options['seed-sandbox']) && $environment !== 'sandbox') {
    fwrite(STDERR, "--seed-sandbox is blocked outside the Sandbox environment.\n");
    exit(EXIT_CONFIGURATION);
}

if ($defaultDurationMinutes < 5 || $defaultDurationMinutes > 1440) {
    fwrite(STDERR, "SQUARE_DEFAULT_SERVICE_DURATION_MINUTES must be between 5 and 1440.\n");
    exit(EXIT_CONFIGURATION);
}

$baseUri = $environment === 'sandbox'
    ? 'https://connect.squareupsandbox.com'
    : 'https://connect.squareup.com';

$client = new Client([
    'base_uri' => $baseUri,
    'timeout' => 45,
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Square-Version' => $apiVersion,
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ],
]);

if (isset($options['list-locations'])) {
    try {
        $response = requestJson($client, 'GET', '/v2/locations');
        $locations = $response['locations'] ?? [];
        if (!$locations) {
            echo "No locations were returned for the {$environment} account.\n";
            exit(0);
        }

        echo "Square ".strtoupper($environment)." locations:\n";
        foreach ($locations as $location) {
            echo sprintf(
                "  - %s | %s | %s | %s | %s\n",
                $location['id'] ?? 'unknown-id',
                $location['name'] ?? 'Unnamed location',
                $location['status'] ?? 'UNKNOWN',
                $location['country'] ?? 'unknown-country',
                $location['currency'] ?? 'unknown-currency'
            );
        }
        exit(0);
    } catch (Throwable $exception) {
        reportApiFailure($exception);
        exit(EXIT_CONFIGURATION);
    }
}

try {
    $categories = fetchCategories($client);
    $items = fetchAppointmentServices($client, $locationId);
} catch (Throwable $exception) {
    reportApiFailure($exception);
    exit(EXIT_CONFIGURATION);
}

echo sprintf(
    "Square %s catalog: %d appointment items and %d categories.\n\n",
    $environment,
    count($items),
    count($categories)
);

$apply = isset($options['apply']);
$createCategories = isset($options['create-categories']);
$seedSandbox = isset($options['seed-sandbox']);
$includeStarting = isset($options['include-starting-prices']);
try {
    $categoryIndex = indexCategories($categories);
} catch (Throwable $exception) {
    fwrite(STDERR, $exception->getMessage()."\n");
    exit(EXIT_REVIEW_REQUIRED);
}
$requiredCategoryNames = array_values(array_unique(array_column($manifest, 'category')));
$missingCategoryNames = array_values(array_filter($requiredCategoryNames, function (string $name) use ($categoryIndex): bool {
    return !isset($categoryIndex[normalize($name)]);
}));

if ($missingCategoryNames && $apply && $createCategories) {
    echo "Creating missing categories: ".implode(', ', $missingCategoryNames)."\n";

    try {
        createCategories($client, $missingCategoryNames);
        $categories = fetchCategories($client);
        $categoryIndex = indexCategories($categories);
        $missingCategoryNames = array_values(array_filter($requiredCategoryNames, function (string $name) use ($categoryIndex): bool {
            return !isset($categoryIndex[normalize($name)]);
        }));
    } catch (Throwable $exception) {
        reportApiFailure($exception);
        exit(EXIT_CONFIGURATION);
    }
}

$candidates = buildCandidates($items);
$plan = buildPlan($manifest, $candidates, $categoryIndex, $currency, $includeStarting);
invalidateReusedMatches($plan);
invalidateConflictingItemCategories($plan);
printPlan($plan, $missingCategoryNames);

if (!$apply) {
    echo "\nDRY RUN ONLY — Square was not changed.\n";
    echo "Review the skipped/ambiguous rows, then run with --apply.\n";
    if ($missingCategoryNames) {
        echo "Add --create-categories to let the script create the missing categories.\n";
    }
    if ($seedSandbox) {
        echo "Add --apply to create the missing services in Sandbox.\n";
    }
    exit(0);
}

if ($seedSandbox && $missingCategoryNames) {
    fwrite(STDERR, "Sandbox seeding requires all categories. Re-run with --create-categories.\n");
    exit(EXIT_REVIEW_REQUIRED);
}

$changes = array_values(array_filter($plan, function (array $row): bool {
    return $row['status'] === 'change';
}));
$missingServices = $seedSandbox ? array_values(array_filter($plan, function (array $row): bool {
    return $row['status'] === 'missing';
})) : [];
$seededCount = 0;

if ($missingServices) {
    $newObjects = buildSandboxServiceObjects(
        $missingServices,
        $categoryIndex,
        $currency,
        $locationId,
        $defaultDurationMinutes
    );

    echo "\nCreating ".count($newObjects)." missing appointment services in Sandbox...\n";
    try {
        batchUpsert($client, $newObjects);
        $seededCount = count($newObjects);
    } catch (Throwable $exception) {
        reportApiFailure($exception);
        exit(EXIT_CONFIGURATION);
    }
    echo "Sandbox services created successfully.\n";
}

if (!$changes) {
    echo $seededCount > 0
        ? "Run the dry run again to verify the seeded Sandbox catalog.\n"
        : "\nNothing needs updating.\n";
    exit(0);
}

$objects = buildUpdatedObjects($changes, $categoryIndex, $currency);

echo "\nApplying ".count($changes).' service changes across '.count($objects)." catalog items...\n";

try {
    batchUpsert($client, array_values($objects));
} catch (Throwable $exception) {
    reportApiFailure($exception);
    exit(EXIT_CONFIGURATION);
}

echo "Square service prices/categories updated successfully.\n";
echo "Unmatched and ambiguous rows were left unchanged. Run the dry run again to verify.\n";

function buildManifest(array $pricing, array $laserPricing): array
{
    $categoryByMenu = [
        'facials' => 'Facials',
        'body-treatments' => 'Body Treatments',
        'dermaplaning' => 'Dermaplaning',
        'hydra-facial' => 'HydraFacial',
        'micro-needling' => 'Microneedling',
        'microdermabrasion' => 'Microdermabrasion',
        'massage' => 'Massage',
        'makeup' => 'Makeup',
        'waxing' => 'Waxing',
        'threading' => 'Threading',
        'tinting' => 'Tinting and Lifting',
    ];

    $manifest = [];

    foreach ($categoryByMenu as $menuKey => $category) {
        foreach ($pricing[$menuKey]['groups'] as $group) {
            foreach ($group['items'] as $item) {
                $manifest[] = manifestRow($category, $item['name'], $item['price'], $item['duration'] ?? null);
            }
        }
    }

    foreach ($pricing['nails']['groups'] as $group) {
        $category = $group['title'];
        foreach ($group['items'] as $item) {
            $manifest[] = manifestRow($category, $item['name'], $item['price'], $item['duration'] ?? null);
        }
    }

    foreach ($laserPricing as $audience => $sections) {
        $category = $audience === 'Promotions'
            ? 'Laser Promotions'
            : 'Laser Hair Removal - '.$audience;

        foreach ($sections as $items) {
            foreach ($items as $item) {
                $manifest[] = manifestRow($category, $item[0], $item[1], null);
            }
        }
    }

    return $manifest;
}

function manifestRow(string $category, string $name, string $price, ?string $duration): array
{
    preg_match('/([0-9]+(?:\.[0-9]{1,2})?)/', str_replace(',', '', $price), $matches);
    $amount = isset($matches[1]) ? (int) round(((float) $matches[1]) * 100) : null;
    $starting = stripos($price, 'from') !== false || strpos($price, '+') !== false;

    if (strcasecmp(trim($price), 'Complimentary') === 0) {
        $amount = 0;
    }

    return [
        'category' => $category,
        'name' => $name,
        'duration_ms' => durationToMilliseconds($duration),
        'duration_label' => $duration,
        'amount' => $amount,
        'price_label' => $price,
        'starting_price' => $starting,
    ];
}

function durationToMilliseconds(?string $duration): ?int
{
    if ($duration === null || trim($duration) === '') {
        return null;
    }

    $hours = 0;
    $minutes = 0;
    if (preg_match('/(\d+)\s*hr/i', $duration, $match)) {
        $hours = (int) $match[1];
    }
    if (preg_match('/(\d+)\s*min/i', $duration, $match)) {
        $minutes = (int) $match[1];
    }

    return (($hours * 60) + $minutes) * 60 * 1000;
}

function validateManifest(array $manifest): array
{
    $errors = [];
    $seen = [];

    foreach ($manifest as $index => $row) {
        if ($row['amount'] === null) {
            $errors[] = sprintf('No numeric price for %s / %s.', $row['category'], $row['name']);
        }

        $key = normalize($row['category']).'|'.normalize($row['name']).'|'.($row['duration_ms'] ?? 'none');
        if (isset($seen[$key])) {
            $errors[] = sprintf('Duplicate manifest row: %s / %s.', $row['category'], $row['name']);
        }
        $seen[$key] = $index;
    }

    return $errors;
}

function fetchCategories(Client $client): array
{
    $objects = [];
    $cursor = null;

    do {
        $query = ['types' => 'CATEGORY'];
        if ($cursor) {
            $query['cursor'] = $cursor;
        }
        $response = requestJson($client, 'GET', '/v2/catalog/list', ['query' => $query]);
        $objects = array_merge($objects, $response['objects'] ?? []);
        $cursor = $response['cursor'] ?? null;
    } while ($cursor);

    return array_values(array_filter($objects, function (array $object): bool {
        return ($object['type'] ?? '') === 'CATEGORY' && empty($object['is_deleted']);
    }));
}

function fetchAppointmentServices(Client $client, string $locationId): array
{
    $items = [];
    $cursor = null;

    do {
        $body = [
            'product_types' => ['APPOINTMENTS_SERVICE'],
            'archived_state' => 'ARCHIVED_STATE_NOT_ARCHIVED',
            'limit' => 100,
        ];
        if ($locationId !== '') {
            $body['enabled_location_ids'] = [$locationId];
        }
        if ($cursor) {
            $body['cursor'] = $cursor;
        }

        $response = requestJson($client, 'POST', '/v2/catalog/search-catalog-items', ['json' => $body]);
        $items = array_merge($items, $response['items'] ?? []);
        $cursor = $response['cursor'] ?? null;
    } while ($cursor);

    return array_values(array_filter($items, function (array $item): bool {
        return ($item['type'] ?? '') === 'ITEM'
            && ($item['item_data']['product_type'] ?? '') === 'APPOINTMENTS_SERVICE'
            && empty($item['item_data']['is_archived']);
    }));
}

function indexCategories(array $categories): array
{
    $index = [];
    foreach ($categories as $category) {
        $name = $category['category_data']['name'] ?? '';
        if ($name !== '') {
            $key = normalize($name);
            if (isset($index[$key]) && ($index[$key]['id'] ?? null) !== ($category['id'] ?? null)) {
                throw new RuntimeException("Square has duplicate categories named '{$name}'. Rename one before syncing.");
            }
            $index[$key] = $category;
        }
    }
    return $index;
}

function createCategories(Client $client, array $names): void
{
    $objects = [];
    foreach (array_values($names) as $index => $name) {
        $objects[] = [
            'type' => 'CATEGORY',
            'id' => '#service-category-'.($index + 1),
            'present_at_all_locations' => true,
            'category_data' => [
                'name' => $name,
                'category_type' => 'REGULAR_CATEGORY',
            ],
        ];
    }
    batchUpsert($client, $objects);
}

function buildCandidates(array $items): array
{
    $candidates = [];

    foreach ($items as $itemIndex => $item) {
        $itemName = trim((string) ($item['item_data']['name'] ?? ''));
        $categoryIds = array_values(array_filter(array_map(function (array $category): ?string {
            return $category['id'] ?? null;
        }, $item['item_data']['categories'] ?? [])));
        $variations = $item['item_data']['variations'] ?? [];

        foreach ($variations as $variationIndex => $variation) {
            if (empty($variation['item_variation_data']['available_for_booking'])) {
                continue;
            }

            $variationName = trim((string) ($variation['item_variation_data']['name'] ?? ''));
            $names = [$itemName, $variationName, trim($itemName.' '.$variationName)];
            if (count($variations) === 1 || in_array(normalize($variationName), ['', 'regular', 'default'], true)) {
                $names[] = $itemName;
            }

            $candidates[] = [
                'item_index' => $itemIndex,
                'variation_index' => $variationIndex,
                'item' => $item,
                'variation' => $variation,
                'item_name' => $itemName,
                'variation_name' => $variationName,
                'names' => array_values(array_unique(array_filter(array_map('normalize', $names)))),
                'duration_ms' => $variation['item_variation_data']['service_duration'] ?? null,
                'category_ids' => $categoryIds,
                'variation_id' => $variation['id'] ?? '',
                'amount' => $variation['item_variation_data']['price_money']['amount'] ?? null,
                'currency' => $variation['item_variation_data']['price_money']['currency'] ?? null,
            ];
        }
    }

    return $candidates;
}

function buildPlan(array $manifest, array $candidates, array $categoryIndex, string $currency, bool $includeStarting): array
{
    $plan = [];

    foreach ($manifest as $desired) {
        $targetCategory = $categoryIndex[normalize($desired['category'])] ?? null;
        $name = normalize($desired['name']);
        $matches = array_values(array_filter($candidates, function (array $candidate) use ($name): bool {
            return in_array($name, $candidate['names'], true);
        }));

        if ($desired['duration_ms'] !== null) {
            $durationMatches = array_values(array_filter($matches, function (array $candidate) use ($desired): bool {
                return $candidate['duration_ms'] !== null
                    && (int) $candidate['duration_ms'] === (int) $desired['duration_ms'];
            }));
            if ($durationMatches) {
                $matches = $durationMatches;
            }
        }

        if ($targetCategory) {
            $categoryId = $targetCategory['id'];
            $categoryMatches = array_values(array_filter($matches, function (array $candidate) use ($categoryId): bool {
                return in_array($categoryId, $candidate['category_ids'], true);
            }));
            if ($categoryMatches) {
                $matches = $categoryMatches;
            }
        }

        $row = [
            'desired' => $desired,
            'candidate' => null,
            'status' => 'missing',
            'reason' => 'No exact Square service name match',
            'price_change' => false,
            'category_change' => false,
        ];

        if (count($matches) > 1) {
            $row['status'] = 'ambiguous';
            $row['reason'] = count($matches).' Square services match this name/duration';
        } elseif (count($matches) === 1) {
            $candidate = $matches[0];
            $row['candidate'] = $candidate;

            if ($desired['starting_price'] && !$includeStarting) {
                $row['status'] = 'skipped';
                $row['reason'] = 'Starting-at price requires --include-starting-prices';
            } elseif (!$targetCategory) {
                $row['status'] = 'skipped';
                $row['reason'] = 'Target category does not exist';
            } elseif ($candidate['currency'] !== null && strtoupper((string) $candidate['currency']) !== $currency) {
                $row['status'] = 'skipped';
                $row['reason'] = 'Currency is '.($candidate['currency'] ?: 'unknown').', expected '.$currency;
            } else {
                $row['price_change'] = (int) $candidate['amount'] !== (int) $desired['amount']
                    || ($candidate['variation']['item_variation_data']['pricing_type'] ?? '') !== 'FIXED_PRICING'
                    || strtoupper((string) $candidate['currency']) !== $currency;
                $row['category_change'] = !in_array($targetCategory['id'], $candidate['category_ids'], true)
                    || count($candidate['category_ids']) !== 1;
                $row['status'] = ($row['price_change'] || $row['category_change']) ? 'change' : 'current';
                $row['reason'] = $row['status'] === 'current' ? 'Already current' : 'Ready to update';
            }
        }

        $plan[] = $row;
    }

    return $plan;
}

function invalidateReusedMatches(array &$plan): void
{
    $used = [];
    foreach ($plan as $index => $row) {
        $id = $row['candidate']['variation_id'] ?? '';
        if ($id !== '' && in_array($row['status'], ['change', 'current'], true)) {
            $used[$id][] = $index;
        }
    }

    foreach ($used as $indexes) {
        if (count($indexes) < 2) {
            continue;
        }
        foreach ($indexes as $index) {
            $plan[$index]['status'] = 'ambiguous';
            $plan[$index]['reason'] = 'The same Square variation matched multiple website services';
            $plan[$index]['price_change'] = false;
            $plan[$index]['category_change'] = false;
        }
    }
}

function invalidateConflictingItemCategories(array &$plan): void
{
    $targets = [];
    foreach ($plan as $index => $row) {
        $itemId = $row['candidate']['item']['id'] ?? '';
        if ($itemId !== '' && in_array($row['status'], ['change', 'current'], true)) {
            $targets[$itemId][normalize($row['desired']['category'])][] = $index;
        }
    }

    foreach ($targets as $categories) {
        if (count($categories) < 2) {
            continue;
        }
        foreach ($categories as $indexes) {
            foreach ($indexes as $index) {
                $plan[$index]['status'] = 'ambiguous';
                $plan[$index]['reason'] = 'Square item variations map to conflicting website categories';
                $plan[$index]['price_change'] = false;
                $plan[$index]['category_change'] = false;
            }
        }
    }
}

function buildUpdatedObjects(array $changes, array $categoryIndex, string $currency): array
{
    $objects = [];
    $categoryTargetsByItem = [];

    foreach ($changes as $row) {
        $candidate = $row['candidate'];
        $itemId = $candidate['item']['id'];
        if (!isset($objects[$itemId])) {
            $objects[$itemId] = sanitizeForUpsert($candidate['item']);
        }

        $variationIndex = $candidate['variation_index'];
        $objects[$itemId]['item_data']['variations'][$variationIndex]['item_variation_data']['pricing_type'] = 'FIXED_PRICING';
        $objects[$itemId]['item_data']['variations'][$variationIndex]['item_variation_data']['price_money'] = [
            'amount' => $row['desired']['amount'],
            'currency' => $currency,
        ];

        $categoryId = $categoryIndex[normalize($row['desired']['category'])]['id'];
        $categoryTargetsByItem[$itemId][$categoryId] = true;
    }

    foreach ($objects as $itemId => &$object) {
        $categoryIds = array_keys($categoryTargetsByItem[$itemId]);
        if (count($categoryIds) === 1) {
            $object['item_data']['categories'] = [['id' => $categoryIds[0]]];
        } else {
            fwrite(STDERR, "Refusing conflicting categories for Square item {$itemId}.\n");
            unset($objects[$itemId]);
        }
    }
    unset($object);

    return $objects;
}

function buildSandboxServiceObjects(
    array $rows,
    array $categoryIndex,
    string $currency,
    string $locationId,
    int $defaultDurationMinutes
): array {
    $objects = [];

    foreach (array_values($rows) as $index => $row) {
        $desired = $row['desired'];
        $category = $categoryIndex[normalize($desired['category'])] ?? null;
        if (!$category) {
            continue;
        }

        $number = $index + 1;
        $itemId = '#sandbox-service-'.$number;
        $variationId = '#sandbox-service-variation-'.$number;
        $duration = $desired['duration_ms'] ?? ($defaultDurationMinutes * 60 * 1000);
        $locationFields = $locationId === ''
            ? ['present_at_all_locations' => true]
            : ['present_at_all_locations' => false, 'present_at_location_ids' => [$locationId]];

        $objects[] = array_merge([
            'type' => 'ITEM',
            'id' => $itemId,
            'item_data' => [
                'name' => $desired['name'],
                'product_type' => 'APPOINTMENTS_SERVICE',
                'skip_modifier_screen' => false,
                'categories' => [['id' => $category['id']]],
                'variations' => [array_merge([
                    'type' => 'ITEM_VARIATION',
                    'id' => $variationId,
                    'item_variation_data' => [
                        'item_id' => $itemId,
                        'name' => 'Regular',
                        'pricing_type' => 'FIXED_PRICING',
                        'price_money' => [
                            'amount' => $desired['amount'],
                            'currency' => $currency,
                        ],
                        'service_duration' => $duration,
                        'available_for_booking' => true,
                    ],
                ], $locationFields)],
            ],
        ], $locationFields);
    }

    return $objects;
}

function sanitizeForUpsert(array $object): array
{
    foreach (['updated_at', 'created_at', 'is_deleted'] as $field) {
        unset($object[$field]);
    }
    if (isset($object['item_data']['description_plaintext'])) {
        unset($object['item_data']['description_plaintext']);
    }
    if (isset($object['item_data']['variations'])) {
        foreach ($object['item_data']['variations'] as &$variation) {
            foreach (['updated_at', 'created_at', 'is_deleted'] as $field) {
                unset($variation[$field]);
            }
        }
        unset($variation);
    }
    return $object;
}

function printPlan(array $plan, array $missingCategoryNames): void
{
    $counts = array_count_values(array_column($plan, 'status'));
    foreach (['change', 'current', 'missing', 'ambiguous', 'skipped'] as $status) {
        echo sprintf("%-10s %d\n", strtoupper($status).':', $counts[$status] ?? 0);
    }

    if ($missingCategoryNames) {
        echo "\nMissing Square categories:\n";
        foreach ($missingCategoryNames as $name) {
            echo "  - {$name}\n";
        }
    }

    foreach (['change', 'ambiguous', 'missing', 'skipped'] as $status) {
        $rows = array_values(array_filter($plan, function (array $row) use ($status): bool {
            return $row['status'] === $status;
        }));
        if (!$rows) {
            continue;
        }

        echo "\n".strtoupper($status).":\n";
        foreach ($rows as $row) {
            $desired = $row['desired'];
            $duration = $desired['duration_label'] ? ' · '.$desired['duration_label'] : '';
            $current = $row['candidate']['amount'] ?? null;
            $currentLabel = $current === null ? '' : ' (Square: $'.number_format($current / 100, 2).')';
            echo sprintf(
                "  - [%s] %s%s: %s%s — %s\n",
                $desired['category'],
                $desired['name'],
                $duration,
                $desired['price_label'],
                $currentLabel,
                $row['reason']
            );
        }
    }
}

function batchUpsert(Client $client, array $objects): array
{
    if (!$objects) {
        return [];
    }

    $response = requestJson($client, 'POST', '/v2/catalog/batch-upsert', [
        'json' => [
            'idempotency_key' => uuidV4(),
            'batches' => array_map(function (array $batch): array {
                return ['objects' => $batch];
            }, array_chunk($objects, 1000)),
        ],
    ]);

    if (!empty($response['errors'])) {
        throw new RuntimeException('Square rejected the catalog update: '.json_encode($response['errors']));
    }

    return $response;
}

function requestJson(Client $client, string $method, string $uri, array $options = []): array
{
    $response = $client->request($method, $uri, $options);
    $decoded = json_decode((string) $response->getBody(), true);
    if (!is_array($decoded)) {
        throw new RuntimeException("Square returned invalid JSON for {$method} {$uri}.");
    }
    return $decoded;
}

function reportApiFailure(Throwable $exception): void
{
    if ($exception instanceof RequestException && $exception->hasResponse()) {
        $status = $exception->getResponse()->getStatusCode();
        $body = (string) $exception->getResponse()->getBody();
        $decoded = json_decode($body, true);
        $details = is_array($decoded) ? json_encode($decoded['errors'] ?? $decoded) : $body;
        fwrite(STDERR, "Square API request failed ({$status}): {$details}\n");
        return;
    }
    fwrite(STDERR, 'Square sync failed: '.$exception->getMessage()."\n");
}

function envValue(string $key, string $default = ''): string
{
    $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
    return $value === false || $value === null || $value === '' ? $default : trim((string) $value);
}

function normalize(string $value): string
{
    $value = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $value = str_replace(['&', '–', '—', '/', '+'], [' and ', '-', '-', ' ', ' and '], $value);
    $value = preg_replace('/\bwith\b/i', ' ', $value);
    $value = preg_replace('/[^\pL\pN]+/u', ' ', $value);
    $value = preg_replace('/\s+/', ' ', trim((string) $value));
    return mb_strtolower($value, 'UTF-8');
}

function uuidV4(): string
{
    $data = random_bytes(16);
    $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
    $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
