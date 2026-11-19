<?php

namespace App\Services\Square;

use Illuminate\Support\Collection;

class SquareServiceCatalog
{
    /** @var SquareClient */
    protected $square;

    public function __construct(SquareClient $square)
    {
        $this->square = $square;
    }

    public function grouped(): Collection
    {
        $categoryNames = collect($this->square->catalogCategories())
            ->filter(function (array $category) {
                return ($category['type'] ?? null) === 'CATEGORY' && empty($category['is_deleted']);
            })
            ->mapWithKeys(function (array $category) {
                return [
                    $category['id'] => $category['category_data']['name'] ?? 'Other services',
                ];
            });

        return collect($this->square->appointmentServices())
            ->flatMap(function (array $item) use ($categoryNames) {
                return $this->servicesFromItem($item, $categoryNames);
            })
            ->sortBy(function (array $service) {
                return mb_strtolower($service['category'].' '.$service['name']);
            })
            ->groupBy('category');
    }

    public function find(string $variationId): ?array
    {
        return $this->grouped()
            ->flatten(1)
            ->first(function (array $service) use ($variationId) {
                return hash_equals((string) $service['id'], $variationId);
            });
    }

    protected function servicesFromItem(array $item, Collection $categoryNames): array
    {
        $itemData = $item['item_data'] ?? [];
        if (!empty($itemData['is_archived'])) {
            return [];
        }

        $categoryId = collect($itemData['categories'] ?? [])->pluck('id')->filter()->first();
        $category = $categoryId ? $categoryNames->get($categoryId, 'Other services') : 'Other services';
        $variations = $itemData['variations'] ?? [];

        return collect($variations)
            ->filter(function (array $variation) {
                return !empty($variation['item_variation_data']['available_for_booking'])
                    && empty($variation['is_deleted']);
            })
            ->map(function (array $variation) use ($item, $itemData, $category, $variations) {
                $variationData = $variation['item_variation_data'] ?? [];
                $variationName = trim((string) ($variationData['name'] ?? ''));
                $showVariationName = count($variations) > 1
                    && !in_array(mb_strtolower($variationName), ['', 'regular', 'default'], true);

                return [
                    'id' => $variation['id'],
                    'version' => $variation['version'] ?? $item['version'] ?? null,
                    'name' => trim(($itemData['name'] ?? 'Service').($showVariationName ? ' — '.$variationName : '')),
                    'category' => $category,
                    'duration_minutes' => isset($variationData['service_duration'])
                        ? (int) round($variationData['service_duration'] / 60000)
                        : null,
                    'amount' => $variationData['price_money']['amount'] ?? null,
                    'currency' => $variationData['price_money']['currency'] ?? config('services.square.currency', 'CAD'),
                ];
            })
            ->values()
            ->all();
    }
}
