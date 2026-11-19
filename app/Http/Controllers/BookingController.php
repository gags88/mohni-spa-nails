<?php

namespace App\Http\Controllers;

use App\Exceptions\SquareApiException;
use App\Services\Square\SquareClient;
use App\Services\Square\SquareServiceCatalog;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index(Request $request, SquareServiceCatalog $catalog)
    {
        abort_unless(config('services.square.enabled'), 404);

        try {
            $serviceGroups = $catalog->grouped();
        } catch (SquareApiException $exception) {
            report($exception);

            return response()->view('pages.booking.unavailable', [], 503);
        }

        $requestedService = trim((string) $request->query('service', ''));
        $requestedDuration = trim((string) $request->query('duration', ''));
        $requestedCategory = trim((string) $request->query('category', ''));
        $preselectedService = $requestedService === '' ? null : $this->matchRequestedService(
            $serviceGroups->flatten(1),
            $requestedService,
            $requestedDuration,
            $requestedCategory
        );

        return view('pages.booking.services', [
            'serviceGroups' => $serviceGroups,
            'requestedFilter' => Str::limit(
                $preselectedService ? '' : ($requestedService !== '' ? $requestedService : $requestedCategory),
                150,
                ''
            ),
            'preselectedService' => $preselectedService,
        ]);
    }

    public function availability(Request $request, SquareServiceCatalog $catalog, SquareClient $square)
    {
        abort_unless(config('services.square.enabled'), 404);

        $validated = $request->validate([
            'service_variation_id' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date_format:Y-m-d'],
        ]);

        try {
            $service = $catalog->find($validated['service_variation_id']);
            abort_unless($service, 404);

            $timezone = (string) config('services.square.bookings_timezone', 'America/Winnipeg');
            $today = CarbonImmutable::now($timezone)->startOfDay();
            $selectedDate = isset($validated['date'])
                ? CarbonImmutable::createFromFormat('Y-m-d', $validated['date'], $timezone)->startOfDay()
                : $today;

            if ($selectedDate->lt($today)) {
                $selectedDate = $today;
            }

            $endDate = $selectedDate->addDays(7);
            $availabilities = $square->searchAvailability([
                'filter' => [
                    'location_id' => $square->locationId(),
                    'start_at_range' => [
                        'start_at' => $selectedDate->utc()->toIso8601String(),
                        'end_at' => $endDate->utc()->toIso8601String(),
                    ],
                    'segment_filters' => [[
                        'service_variation_id' => $service['id'],
                    ]],
                ],
            ]);

            $teamMembers = collect($square->bookableTeamMembers())
                ->mapWithKeys(function (array $profile) {
                    return [($profile['team_member_id'] ?? '') => ($profile['display_name'] ?? 'Available specialist')];
                });

            $slotsByDate = collect($availabilities)
                ->filter(function (array $availability) {
                    return !empty($availability['start_at']);
                })
                ->map(function (array $availability) use ($timezone, $teamMembers) {
                    $startsAt = CarbonImmutable::parse($availability['start_at'])->setTimezone($timezone);
                    $segment = collect($availability['appointment_segments'] ?? [])->first() ?? [];

                    return [
                        'start_at' => $availability['start_at'],
                        'date_key' => $startsAt->format('Y-m-d'),
                        'date_label' => $startsAt->format('l, F j'),
                        'time_label' => $startsAt->format('g:i A'),
                        'team_member_id' => $segment['team_member_id'] ?? null,
                        'team_member_name' => $teamMembers->get($segment['team_member_id'] ?? '', 'Available specialist'),
                    ];
                })
                ->unique(function (array $slot) {
                    return $slot['start_at'].'|'.$slot['team_member_id'];
                })
                ->sortBy('start_at')
                ->groupBy('date_key');
        } catch (SquareApiException $exception) {
            report($exception);

            return response()->view('pages.booking.unavailable', [], 503);
        }

        return view('pages.booking.availability', [
            'service' => $service,
            'slotsByDate' => $slotsByDate,
            'selectedDate' => $selectedDate,
            'previousDate' => $selectedDate->gt($today) ? $selectedDate->subDays(7) : null,
            'nextDate' => $selectedDate->addDays(7),
        ]);
    }

    public function details(Request $request, SquareServiceCatalog $catalog, SquareClient $square)
    {
        abort_unless(config('services.square.enabled'), 404);

        $validated = $request->validate([
            'service_variation_id' => ['required', 'string', 'max:255'],
            'start_at' => ['required', 'date'],
            'team_member_id' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            $service = $catalog->find($validated['service_variation_id']);
            abort_unless($service, 404);
            $appointment = $this->appointmentSummary($validated, $square);
        } catch (SquareApiException $exception) {
            report($exception);

            return response()->view('pages.booking.unavailable', [], 503);
        }

        $customer = $this->draftCustomer($request, $validated);

        return view('pages.booking.details', compact('service', 'appointment', 'customer'));
    }

    public function review(Request $request, SquareServiceCatalog $catalog, SquareClient $square)
    {
        abort_unless(config('services.square.enabled'), 404);

        $validated = $request->validate([
            'service_variation_id' => ['required', 'string', 'max:255'],
            'start_at' => ['required', 'date'],
            'team_member_id' => ['nullable', 'string', 'max:255'],
            'customer_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        try {
            $service = $catalog->find($validated['service_variation_id']);
            abort_unless($service, 404);
            $appointment = $this->appointmentSummary($validated, $square);
        } catch (SquareApiException $exception) {
            report($exception);

            return response()->view('pages.booking.unavailable', [], 503);
        }

        $customer = [
            'name' => $validated['customer_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'notes' => $validated['notes'] ?? null,
        ];

        $request->session()->put('booking.preview_draft', [
            'selection' => [
                'service_variation_id' => $validated['service_variation_id'],
                'start_at' => $validated['start_at'],
                'team_member_id' => $validated['team_member_id'] ?? null,
            ],
            'customer' => $customer,
        ]);

        return view('pages.booking.review', [
            'service' => $service,
            'appointment' => $appointment,
            'customer' => $customer,
        ]);
    }

    protected function appointmentSummary(array $selection, SquareClient $square): array
    {
        $timezone = (string) config('services.square.bookings_timezone', 'America/Winnipeg');
        $startsAt = CarbonImmutable::parse($selection['start_at'])->setTimezone($timezone);
        $teamMemberId = $selection['team_member_id'] ?? null;
        $teamMember = collect($square->bookableTeamMembers())
            ->firstWhere('team_member_id', $teamMemberId);
        $teamMemberName = $teamMember['display_name'] ?? 'Available specialist';

        return [
            'start_at' => $selection['start_at'],
            'date_key' => $startsAt->format('Y-m-d'),
            'date_label' => $startsAt->format('l, F j, Y'),
            'time_label' => $startsAt->format('g:i A'),
            'team_member_id' => $teamMemberId,
            'team_member_name' => $teamMemberName,
        ];
    }

    protected function draftCustomer(Request $request, array $selection): array
    {
        $draft = $request->session()->get('booking.preview_draft', []);
        $draftSelection = $draft['selection'] ?? [];

        foreach (['service_variation_id', 'start_at', 'team_member_id'] as $field) {
            if (($draftSelection[$field] ?? null) !== ($selection[$field] ?? null)) {
                return [];
            }
        }

        return is_array($draft['customer'] ?? null) ? $draft['customer'] : [];
    }

    protected function matchRequestedService(
        Collection $services,
        string $requestedName,
        string $requestedDuration,
        string $requestedCategory
    ): ?array {
        $normalizedName = $this->normalizeServiceText($requestedName);
        $normalizedCategory = $this->normalizeServiceText($requestedCategory);
        $durationMinutes = $this->durationMinutes($requestedDuration);

        if ($normalizedName === '') {
            return null;
        }

        $matches = $services->filter(function (array $service) use ($normalizedName) {
            return $this->normalizeServiceText((string) ($service['name'] ?? '')) === $normalizedName;
        });

        if ($matches->isEmpty()) {
            $matches = $services->filter(function (array $service) use ($normalizedName) {
                $catalogName = $this->normalizeServiceText((string) ($service['name'] ?? ''));

                return $catalogName !== ''
                    && (str_contains($catalogName, $normalizedName) || str_contains($normalizedName, $catalogName));
            });
        }

        if ($normalizedCategory !== '') {
            $categoryMatches = $matches->filter(function (array $service) use ($normalizedCategory) {
                $catalogCategory = $this->normalizeServiceText((string) ($service['category'] ?? ''));

                return str_contains($catalogCategory, $normalizedCategory)
                    || str_contains($normalizedCategory, $catalogCategory);
            });

            if ($categoryMatches->isNotEmpty()) {
                $matches = $categoryMatches;
            }
        }

        if ($durationMinutes !== null) {
            $durationMatches = $matches->where('duration_minutes', $durationMinutes);
            if ($durationMatches->isNotEmpty()) {
                $matches = $durationMatches;
            }
        }

        return $matches->first();
    }

    protected function normalizeServiceText(string $value): string
    {
        $value = str_replace('&', 'and', Str::ascii(Str::lower($value)));

        return preg_replace('/[^a-z0-9]+/', '', $value) ?: '';
    }

    protected function durationMinutes(string $duration): ?int
    {
        if ($duration === '') {
            return null;
        }

        $hours = preg_match('/(\d+)\s*h/i', $duration, $hourMatch) ? (int) $hourMatch[1] : 0;
        $minutes = preg_match('/(\d+)\s*m/i', $duration, $minuteMatch) ? (int) $minuteMatch[1] : 0;
        $total = ($hours * 60) + $minutes;

        return $total > 0 ? $total : null;
    }
}
