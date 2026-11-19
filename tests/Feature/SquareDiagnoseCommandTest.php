<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SquareDiagnoseCommandTest extends TestCase
{
    public function test_diagnostics_are_read_only_and_report_the_square_foundation(): void
    {
        config([
            'services.square.bookings_environment' => 'sandbox',
            'services.square.bookings_access_token' => 'sandbox-test-token',
            'services.square.bookings_location_id' => 'SANDBOX_LOCATION',
            'services.square.api_version' => '2026-11-18',
        ]);

        Http::fake(function ($request) {
            if (substr($request->url(), -strlen('/v2/locations')) === '/v2/locations') {
                return Http::response(['locations' => [[
                    'id' => 'SANDBOX_LOCATION',
                    'name' => 'Mohni Sandbox',
                    'country' => 'CA',
                    'currency' => 'CAD',
                ]]]);
            }

            if (strpos($request->url(), '/v2/catalog/search-catalog-items') !== false) {
                return Http::response(['items' => [['id' => 'SERVICE_ONE']]]);
            }

            if (strpos($request->url(), '/business-booking-profile') !== false) {
                return Http::response(['business_booking_profile' => [
                    'support_seller_level_writes' => true,
                ]]);
            }

            return Http::response(['team_member_booking_profiles' => [[
                'team_member_id' => 'TEAM_ONE',
                'is_bookable' => true,
            ]]]);
        });

        $this->artisan('square:diagnose')
            ->expectsOutput('Square appointment integration diagnostics')
            ->expectsOutput('  Appointment items: 1')
            ->expectsOutput('  Bookable team members: 1')
            ->expectsOutput('All Square foundation checks passed. No data was changed.')
            ->assertExitCode(0);

        foreach (Http::recorded() as $exchange) {
            $this->assertContains($exchange[0]->method(), ['GET', 'POST']);
        }
    }
}
