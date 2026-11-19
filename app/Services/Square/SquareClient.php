<?php

namespace App\Services\Square;

use App\Exceptions\SquareApiException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SquareClient
{
    public function configured(): bool
    {
        return trim((string) config('services.square.bookings_access_token')) !== ''
            && trim((string) config('services.square.bookings_location_id')) !== '';
    }

    public function environment(): string
    {
        return config('services.square.bookings_environment', 'production') === 'sandbox'
            ? 'sandbox'
            : 'production';
    }

    public function baseUrl(): string
    {
        return $this->environment() === 'sandbox'
            ? 'https://connect.squareupsandbox.com'
            : 'https://connect.squareup.com';
    }

    public function locationId(): string
    {
        return (string) config('services.square.bookings_location_id');
    }

    public function locations(): array
    {
        return $this->request('GET', '/v2/locations')['locations'] ?? [];
    }

    public function businessBookingProfile(): array
    {
        return $this->request('GET', '/v2/bookings/business-booking-profile')['business_booking_profile'] ?? [];
    }

    public function appointmentServices(): array
    {
        $items = [];
        $cursor = null;

        do {
            $payload = [
                'product_types' => ['APPOINTMENTS_SERVICE'],
                'archived_state' => 'ARCHIVED_STATE_NOT_ARCHIVED',
                'enabled_location_ids' => [$this->locationId()],
                'limit' => 100,
            ];

            if ($cursor) {
                $payload['cursor'] = $cursor;
            }

            $result = $this->request('POST', '/v2/catalog/search-catalog-items', $payload);
            $items = array_merge($items, $result['items'] ?? []);
            $cursor = $result['cursor'] ?? null;
        } while ($cursor);

        return $items;
    }

    public function catalogCategories(): array
    {
        $categories = [];
        $cursor = null;

        do {
            $query = ['types' => 'CATEGORY'];
            if ($cursor) {
                $query['cursor'] = $cursor;
            }

            $result = $this->request('GET', '/v2/catalog/list', $query);
            $categories = array_merge($categories, $result['objects'] ?? []);
            $cursor = $result['cursor'] ?? null;
        } while ($cursor);

        return $categories;
    }

    public function bookableTeamMembers(): array
    {
        $profiles = [];
        $cursor = null;

        do {
            $query = [
                'bookable_only' => 'true',
                'location_id' => $this->locationId(),
                'limit' => 100,
            ];

            if ($cursor) {
                $query['cursor'] = $cursor;
            }

            $result = $this->request('GET', '/v2/bookings/team-member-booking-profiles', $query);
            $profiles = array_merge($profiles, $result['team_member_booking_profiles'] ?? []);
            $cursor = $result['cursor'] ?? null;
        } while ($cursor);

        return $profiles;
    }

    public function searchAvailability(array $query): array
    {
        return $this->request('POST', '/v2/bookings/availability/search', [
            'query' => $query,
        ])['availabilities'] ?? [];
    }

    protected function request(string $method, string $path, array $data = []): array
    {
        $this->ensureConfigured();

        $options = strtoupper($method) === 'GET'
            ? ['query' => $data]
            : ['json' => $data];

        $response = $this->http()->send($method, $path, $options);

        if ($response->failed()) {
            throw $this->apiException($response, $method, $path);
        }

        $decoded = $response->json();
        if (!is_array($decoded)) {
            throw new SquareApiException('Square returned an invalid response.', $response->status());
        }

        return $decoded;
    }

    protected function http(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl())
            ->withToken((string) config('services.square.bookings_access_token'))
            ->withHeaders([
                'Square-Version' => (string) config('services.square.api_version'),
                'Accept' => 'application/json',
            ])
            ->asJson()
            ->withOptions(['connect_timeout' => 10])
            ->timeout(30);
    }

    protected function ensureConfigured(): void
    {
        if (!$this->configured()) {
            throw new SquareApiException(
                'Square Bookings is not configured. Set SQUARE_BOOKINGS_ACCESS_TOKEN and SQUARE_BOOKINGS_LOCATION_ID.'
            );
        }
    }

    protected function apiException(Response $response, string $method, string $path): SquareApiException
    {
        $errors = $response->json('errors', []);
        $detail = collect($errors)
            ->pluck('detail')
            ->filter()
            ->implode(' ');

        $message = sprintf(
            'Square API %s %s failed with HTTP %d.%s',
            strtoupper($method),
            $path,
            $response->status(),
            $detail ? ' '.$detail : ''
        );

        return new SquareApiException($message, $response->status(), is_array($errors) ? $errors : []);
    }
}
