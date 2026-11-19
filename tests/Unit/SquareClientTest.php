<?php

namespace Tests\Unit;

use App\Exceptions\SquareApiException;
use App\Services\Square\SquareClient;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SquareClientTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.square.bookings_environment' => 'sandbox',
            'services.square.bookings_access_token' => 'sandbox-test-token',
            'services.square.bookings_location_id' => 'SANDBOX_LOCATION',
            'services.square.api_version' => '2026-11-18',
        ]);
    }

    public function test_it_reads_all_pages_of_appointment_services(): void
    {
        Http::fakeSequence()
            ->push([
                'items' => [['id' => 'ITEM_ONE']],
                'cursor' => 'next-page',
            ])
            ->push([
                'items' => [['id' => 'ITEM_TWO']],
            ]);

        $items = app(SquareClient::class)->appointmentServices();

        $this->assertSame(['ITEM_ONE', 'ITEM_TWO'], array_column($items, 'id'));
        Http::assertSentCount(2);
        Http::assertSent(function ($request) {
            return $request->url() === 'https://connect.squareupsandbox.com/v2/catalog/search-catalog-items'
                && $request->hasHeader('Authorization', 'Bearer sandbox-test-token')
                && $request->hasHeader('Square-Version', '2026-11-18')
                && $request['enabled_location_ids'] === ['SANDBOX_LOCATION'];
        });
    }

    public function test_it_returns_only_bookable_team_profiles(): void
    {
        Http::fake([
            '*' => Http::response([
                'team_member_booking_profiles' => [
                    ['team_member_id' => 'TEAM_ONE', 'is_bookable' => true],
                ],
            ]),
        ]);

        $profiles = app(SquareClient::class)->bookableTeamMembers();

        $this->assertSame('TEAM_ONE', $profiles[0]['team_member_id']);
        Http::assertSent(function ($request) {
            return $request['bookable_only'] === 'true'
                && $request['location_id'] === 'SANDBOX_LOCATION';
        });
    }

    public function test_api_errors_never_include_the_access_token(): void
    {
        Http::fake([
            '*' => Http::response([
                'errors' => [[
                    'category' => 'AUTHENTICATION_ERROR',
                    'detail' => 'The request could not be authorized.',
                ]],
            ], 401),
        ]);

        try {
            app(SquareClient::class)->locations();
            $this->fail('Expected a SquareApiException.');
        } catch (SquareApiException $exception) {
            $this->assertSame(401, $exception->statusCode());
            $this->assertStringNotContainsString('sandbox-test-token', $exception->getMessage());
            $this->assertStringContainsString('could not be authorized', $exception->getMessage());
        }
    }

    public function test_it_refuses_requests_when_credentials_are_missing(): void
    {
        config(['services.square.bookings_access_token' => null]);

        $this->expectException(SquareApiException::class);
        $this->expectExceptionMessage('Square Bookings is not configured');

        app(SquareClient::class)->locations();
    }
}
