<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BookingServiceSelectionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.square.enabled' => true,
            'services.square.bookings_environment' => 'production',
            'services.square.bookings_access_token' => 'production-read-token',
            'services.square.bookings_location_id' => 'MOHNI_LOCATION',
            'services.square.bookings_timezone' => 'America/Winnipeg',
            'services.square.api_version' => '2026-11-18',
        ]);
    }

    public function test_booking_page_displays_live_bookable_services_grouped_by_category(): void
    {
        Http::fake(function ($request) {
            if (strpos($request->url(), '/v2/catalog/list') !== false) {
                return Http::response(['objects' => [[
                    'type' => 'CATEGORY',
                    'id' => 'FACIALS',
                    'category_data' => ['name' => 'Facials'],
                ]]]);
            }

            return Http::response(['items' => [[
                'type' => 'ITEM',
                'id' => 'EXPRESS_FACIAL',
                'version' => 1234,
                'item_data' => [
                    'name' => 'Express Facial',
                    'product_type' => 'APPOINTMENTS_SERVICE',
                    'categories' => [['id' => 'FACIALS']],
                    'variations' => [[
                        'type' => 'ITEM_VARIATION',
                        'id' => 'EXPRESS_FACIAL_REGULAR',
                        'version' => 1234,
                        'item_variation_data' => [
                            'name' => 'Regular',
                            'available_for_booking' => true,
                            'service_duration' => 1800000,
                            'price_money' => ['amount' => 5000, 'currency' => 'CAD'],
                        ],
                    ]],
                ],
            ]]]);
        });

        $this->get('/book')
            ->assertStatus(200)
            ->assertSee('Choose your treatment')
            ->assertSee('Facials')
            ->assertSee('Express Facial')
            ->assertSee('30 min')
            ->assertSee('$50.00')
            ->assertSee('See available times')
            ->assertSee('action="/book/availability"', false)
            ->assertDontSee('disabled aria-disabled="true"', false)
            ->assertDontSee('<details', false)
            ->assertDontSee('<summary', false)
            ->assertDontSee('aria-hidden="true"></i>', false)
            ->assertSee('EXPRESS_FACIAL_REGULAR', false);

        $this->get('/book?service=Express%20Facial&duration=30%20Min&category=Facials')
            ->assertOk()
            ->assertSee('value="EXPRESS_FACIAL_REGULAR"', false)
            ->assertSee(' checked ', false)
            ->assertSee('<strong data-booking-selection-name>Express Facial</strong>', false)
            ->assertDontSee('data-booking-selection hidden', false);

        $this->get('/book?category=Facials')
            ->assertOk()
            ->assertSee('type="search" value="Facials"', false)
            ->assertSee('/js/booking.js?v=1.5', false);
    }

    public function test_selected_service_displays_live_square_availability(): void
    {
        Http::fake(function ($request) {
            if (strpos($request->url(), '/v2/catalog/list') !== false) {
                return Http::response(['objects' => [[
                    'type' => 'CATEGORY',
                    'id' => 'FACIALS',
                    'category_data' => ['name' => 'Facials'],
                ]]]);
            }

            if (strpos($request->url(), '/v2/catalog/search-catalog-items') !== false) {
                return Http::response(['items' => [[
                    'type' => 'ITEM',
                    'id' => 'EXPRESS_FACIAL',
                    'version' => 1234,
                    'item_data' => [
                        'name' => 'Express Facial',
                        'categories' => [['id' => 'FACIALS']],
                        'variations' => [[
                            'type' => 'ITEM_VARIATION',
                            'id' => 'EXPRESS_FACIAL_REGULAR',
                            'version' => 1234,
                            'item_variation_data' => [
                                'name' => 'Regular',
                                'available_for_booking' => true,
                                'service_duration' => 1800000,
                                'price_money' => ['amount' => 5000, 'currency' => 'CAD'],
                            ],
                        ]],
                    ],
                ]]]);
            }

            if (strpos($request->url(), '/v2/bookings/availability/search') !== false) {
                return Http::response(['availabilities' => [[
                    'start_at' => '2026-11-20T16:00:00Z',
                    'location_id' => 'MOHNI_LOCATION',
                    'appointment_segments' => [[
                        'duration_minutes' => 30,
                        'service_variation_id' => 'EXPRESS_FACIAL_REGULAR',
                        'service_variation_version' => 1234,
                        'team_member_id' => 'TEAM_MEMBER_1',
                    ]],
                ]]]);
            }

            if (strpos($request->url(), '/v2/bookings/team-member-booking-profiles') !== false) {
                return Http::response(['team_member_booking_profiles' => [[
                    'team_member_id' => 'TEAM_MEMBER_1',
                    'display_name' => 'Mohni Specialist',
                ]]]);
            }

            return Http::response([], 404);
        });

        $this->travelTo(now()->setDate(2026, 11, 19));

        $this->get('/book/availability?service_variation_id=EXPRESS_FACIAL_REGULAR&date=2026-11-19')
            ->assertOk()
            ->assertSee('Choose a time')
            ->assertSee('Express Facial')
            ->assertSee('10:00 AM')
            ->assertSee('Mohni Specialist');

        Http::assertSent(function ($request) {
            return strpos($request->url(), '/v2/bookings/availability/search') !== false
                && $request['query']['filter']['segment_filters'][0]['service_variation_id'] === 'EXPRESS_FACIAL_REGULAR'
                && !isset($request['query']['filter']['segment_filters'][0]['service_variation_version']);
        });
    }

    public function test_availability_rejects_a_service_not_in_the_live_catalog(): void
    {
        Http::fake(function ($request) {
            if (strpos($request->url(), '/v2/catalog/list') !== false) {
                return Http::response(['objects' => []]);
            }

            return Http::response(['items' => []]);
        });

        $this->get('/book/availability?service_variation_id=NOT_A_SERVICE')
            ->assertNotFound();
    }

    public function test_customer_can_reach_review_without_creating_a_square_booking(): void
    {
        Http::fake(function ($request) {
            if (strpos($request->url(), '/v2/catalog/list') !== false) {
                return Http::response(['objects' => [[
                    'type' => 'CATEGORY',
                    'id' => 'FACIALS',
                    'category_data' => ['name' => 'Facials'],
                ]]]);
            }

            if (strpos($request->url(), '/v2/catalog/search-catalog-items') !== false) {
                return Http::response(['items' => [[
                    'type' => 'ITEM',
                    'id' => 'EXPRESS_FACIAL',
                    'version' => 1234,
                    'item_data' => [
                        'name' => 'Express Facial',
                        'categories' => [['id' => 'FACIALS']],
                        'variations' => [[
                            'type' => 'ITEM_VARIATION',
                            'id' => 'EXPRESS_FACIAL_REGULAR',
                            'version' => 1234,
                            'item_variation_data' => [
                                'name' => 'Regular',
                                'available_for_booking' => true,
                                'service_duration' => 1800000,
                                'price_money' => ['amount' => 5000, 'currency' => 'CAD'],
                            ],
                        ]],
                    ],
                ]]]);
            }

            if (strpos($request->url(), '/v2/bookings/team-member-booking-profiles') !== false) {
                return Http::response(['team_member_booking_profiles' => [[
                    'team_member_id' => 'TEAM_MEMBER_1',
                    'display_name' => 'Mohni Specialist',
                ]]]);
            }

            return Http::response([], 404);
        });

        $selection = [
            'service_variation_id' => 'EXPRESS_FACIAL_REGULAR',
            'start_at' => '2026-11-20T16:00:00Z',
            'team_member_id' => 'TEAM_MEMBER_1',
        ];

        $this->get('/book/details?'.http_build_query($selection))
            ->assertOk()
            ->assertSee('Tell us about you')
            ->assertSee('Express Facial')
            ->assertSee('Mohni Specialist');

        $this->post('/book/review', array_merge($selection, [
            'customer_name' => 'Preview Customer',
            'email' => 'preview@example.com',
            'phone' => '204-555-0100',
            'notes' => 'Preview only',
        ]))
            ->assertOk()
            ->assertSee('Review your appointment')
            ->assertSee('Preview Customer')
            ->assertSee('Nothing has been submitted')
            ->assertSee('Confirm booking')
            ->assertSee('disabled', false);

        Http::assertNotSent(function ($request) {
            return rtrim(parse_url($request->url(), PHP_URL_PATH), '/') === '/v2/bookings';
        });
    }

    public function test_booking_page_is_hidden_while_feature_flag_is_disabled(): void
    {
        config(['services.square.enabled' => false]);

        $this->get('/book')->assertNotFound();
        Http::assertNothingSent();
    }

    public function test_booking_page_fails_safely_when_square_is_unavailable(): void
    {
        Http::fake(['*' => Http::response([
            'errors' => [['detail' => 'Square is temporarily unavailable.']],
        ], 503)]);

        $this->get('/book')
            ->assertStatus(503)
            ->assertSee('Online booking is temporarily unavailable');
    }
}
