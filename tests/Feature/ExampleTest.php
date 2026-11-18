<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSee('Feel at home')
            ->assertSee('/images/hero/laser-luxury-hero-v2.webp', false)
            ->assertSee('/images/services/editorial/facial-treatment-v3.webp', false)
            ->assertSee('/images/hero/manicure-luxury-hero-v2.webp', false)
            ->assertSee('/images/hero/laser-focus-treatment.webp', false);

        foreach ([
            'Navneet Garcha',
            'Rochelle Trenchard',
            'Barbara Parkin',
            'Brittney Ann',
            'Marilynne',
            'Kristina K',
            'Marie Cecile Kotyk',
            'Lorraine Thistlethwaite',
            'Jaspreet Sond',
            'Jhenifer Timpug',
            'Navjot Singh Bhatti',
        ] as $reviewer) {
            $response->assertSee($reviewer);
        }

        $this->assertSame(11, substr_count($response->getContent(), '<blockquote>'));
    }

    public function testLaserPageDisplaysPricing()
    {
        $this->get('/services/laser-hair-removal')
            ->assertStatus(200)
            ->assertSee('Laser pricing')
            ->assertSee('Package of 6')
            ->assertSee('Full Legs')
            ->assertSee('Women')
            ->assertSee('Men')
            ->assertSee('Promotions')
            ->assertSee('name="laser-pricing"', false)
            ->assertSee('data-video-id="MBk0Q670LXE"', false)
            ->assertSee('/js/laser-video.js?v=1.1', false)
            ->assertSee('Play video');
    }

    public function testBookingUrlIsSharedAcrossPages()
    {
        $bookingUrl = config('services.booking.url');

        $this->assertNotEmpty($bookingUrl);

        foreach (['/', '/services/facials', '/services/laser-hair-removal'] as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('href="'.$bookingUrl.'"', false);
        }
    }

    public function testLaserVideoSecurityPolicyAllowsPrivacyEnhancedYoutube()
    {
        $policy = file_get_contents(public_path('.htaccess'));

        $this->assertStringContainsString('script-src \'self\' https://www.youtube.com', $policy);
        $this->assertStringContainsString('https://www.youtube-nocookie.com', $policy);
        $this->assertStringContainsString('https://i.ytimg.com', $policy);
        $this->assertStringContainsString('window.YT.PlayerState.ENDED', file_get_contents(public_path('js/laser-video.js')));
        $this->assertStringContainsString("action.textContent = 'Watch again'", file_get_contents(public_path('js/laser-video.js')));
    }

    public function testServicePagesDisplayCurrentTreatmentMenus()
    {
        $pages = [
            '/services/facials' => ['facials', 'Platinum HydraFacial', '$150'],
            '/services/body-treatments' => ['body-treatments', 'Japanese Head Spa', '$125'],
            '/services/waxing' => ['waxing', 'Brazilian (Women Only)', '$65'],
            '/services/threading' => ['threading', 'Full Face (Including Eyebrows)', '$30'],
            '/services/tinting' => ['tinting', 'Eyelash Lift and Tint', '$85'],
            '/services/manicure-pedicure' => ['nails', 'Kids Nail Art', 'Complimentary'],
        ];

        foreach ($pages as $path => [$menuKey, $service, $price]) {
            $response = $this->get($path)
                ->assertOk()
                ->assertSee('Treatment menu')
                ->assertSee($service)
                ->assertSee($price);

            $expectedItemCount = collect(config('service-pricing.'.$menuKey.'.groups'))
                ->sum(function ($group) {
                    return count($group['items']);
                });

            $this->assertSame(
                $expectedItemCount,
                substr_count($response->getContent(), 'class="mohni-treatment-menu__item"'),
                'Unexpected treatment count for '.$path
            );
        }
    }

    public function testEveryServicePageUsesTheLuxuryLayout()
    {
        $pages = [
            '/services/body-treatments',
            '/services/dermaplaning',
            '/services/facials',
            '/services/hydra-facial',
            '/services/laser-hair-removal',
            '/services/makeup',
            '/services/manicure-pedicure',
            '/services/massage',
            '/services/micro-needling',
            '/services/microdermabrasion',
            '/services/nail-recovery',
            '/services/sugaring',
            '/services/threading',
            '/services/tinting',
            '/services/waxing',
        ];

        foreach ($pages as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('href="/css/interior-palette.css?v=3.3"', false)
                ->assertSee('Book');
        }
    }

    public function testNonLaserServicePagesUseEditorialHeroesBeforePricing()
    {
        $pages = [
            '/services/body-treatments',
            '/services/dermaplaning',
            '/services/facials',
            '/services/hydra-facial',
            '/services/makeup',
            '/services/manicure-pedicure',
            '/services/massage',
            '/services/micro-needling',
            '/services/microdermabrasion',
            '/services/nail-recovery',
            '/services/sugaring',
            '/services/threading',
            '/services/tinting',
            '/services/waxing',
        ];

        foreach ($pages as $path) {
            $content = $this->get($path)
                ->assertOk()
                ->assertSee('mohni-editorial-service', false)
                ->getContent();

            if (str_contains($content, 'mohni-treatment-menu')) {
                $this->assertLessThan(
                    strpos($content, 'mohni-treatment-menu'),
                    strpos($content, 'mohni-editorial-service'),
                    'Pricing should follow the editorial introduction on '.$path
                );
            }
        }
    }

    public function testFocusedServicePagesShowRelevantPricing()
    {
        $pages = [
            '/services/dermaplaning' => ['Dermaplaning pricing', '$85'],
            '/services/hydra-facial' => ['HydraFacial treatments', '$130'],
            '/services/makeup' => ['Makeup application', '$85+'],
            '/services/massage' => ['Massage and restorative care', '$50'],
            '/services/micro-needling' => ['Microneedling pricing', '$335'],
            '/services/microdermabrasion' => ['Microdermabrasion pricing', '$130'],
            '/services/nail-recovery' => ['Gel and nail recovery services', '$90'],
        ];

        foreach ($pages as $path => [$heading, $price]) {
            $this->get($path)
                ->assertOk()
                ->assertSee($heading)
                ->assertSee($price);
        }
    }
}
