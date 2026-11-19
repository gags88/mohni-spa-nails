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
            ->assertSee('Kids Manicure &amp; Pedicure', false)
            ->assertSee('Client Reviews')
            ->assertDontSee('Our laser focus')
            ->assertDontSee('Su'.'garing');

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
        $response = $this->get('/services/laser-hair-removal')
            ->assertStatus(200)
            ->assertSee('Laser pricing')
            ->assertSee('Purchase 5 Sessions, Get 1 Free')
            ->assertSee('Full Legs')
            ->assertSee('$199')
            ->assertSee('$225')
            ->assertSee('Women')
            ->assertSee('Men')
            ->assertSee('Promotions')
            ->assertSee('Half Legs + Bikini Line or Underarms')
            ->assertSee('Full Back + Chest + Abdomen')
            ->assertSee('Choose Any 3 Full Areas (Men)')
            ->assertSee('Packages are non-refundable and non-transferable.')
            ->assertSee('Prices are plus GST.')
            ->assertSee('name="laser-pricing"', false)
            ->assertSee('data-video-id="MBk0Q670LXE"', false)
            ->assertSee('/js/laser-video.js?v=1.1', false)
            ->assertSee('Play video');

        $content = $response->getContent();
        $this->assertLessThan(strpos($content, 'id="laser-pricing"'), strpos($content, 'mohni-process mohni-section'));
        $this->assertLessThan(strpos($content, 'mohni-laser-cta'), strpos($content, 'id="laser-pricing"'));
        $this->assertSame(0, preg_match('/<details\b[^>]*\sopen(?:\s|=|>)/i', $content));
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
            '/services/facials' => ['facials', 'Anti-Aging Facial', '$120', 8],
            '/services/body-treatments' => ['body-treatments', 'Body Wrap', '$165', 2],
            '/services/waxing' => ['waxing', 'Brazilian (Women Only)', '$65', 21],
            '/services/threading' => ['threading', 'Full Face (Including Eyebrows)', '$30', 8],
            '/services/tinting' => ['tinting', 'Eyelash Lift and Tint', '$85', 7],
            '/services/manicure-pedicure' => ['nails', 'Kids Nail Art', 'Complimentary', 40],
        ];

        foreach ($pages as $path => [$menuKey, $service, $price, $expectedItemCount]) {
            $response = $this->get($path)
                ->assertOk()
                ->assertSee('Treatment menu')
                ->assertSee($service)
                ->assertSee($price);

            $configuredItemCount = collect(config('service-pricing.'.$menuKey.'.groups'))
                ->sum(function ($group) {
                    return count($group['items']);
                });

            $this->assertSame($expectedItemCount, $configuredItemCount, 'Unexpected configured treatment count for '.$path);

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
            '/services/threading',
            '/services/tinting',
            '/services/waxing',
        ];

        foreach ($pages as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('href="/css/interior-palette.css?v=3.6"', false)
                ->assertSee('Book');
        }
    }

    public function testNonLaserServicePagesKeepInformationBeforePricing()
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
                    strpos($content, 'mohni-service-overview'),
                    'Pricing should follow the treatment overview on '.$path
                );

                if (str_contains($content, 'mohni-service-guides')) {
                    $this->assertLessThan(
                        strpos($content, 'mohni-treatment-menu'),
                        strpos($content, 'mohni-service-guides'),
                        'Pricing should follow the treatment guidance on '.$path
                    );
                }

                $this->assertSame(0, preg_match('/<details\b[^>]*\sopen(?:\s|=|>)/i', $content));
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

    public function testFocusedServiceMenusDoNotIncludeUnrelatedPrices()
    {
        $menus = [
            'body-treatments' => ['Body Glow', 'Makeup Application'],
            'dermaplaning' => ['Dermaplaning Facial', 'Signature HydraFacial'],
            'facials' => ['Customized Facial', 'Microneedling'],
            'hydra-facial' => ['Platinum HydraFacial', 'Dermaplaning Facial'],
            'makeup' => ['Makeup Application', 'Hot Stone Massage'],
            'massage' => ['Relaxation Massage by Esthetician', 'Makeup Application'],
            'micro-needling' => ['Microneedling', 'Anti-Aging Facial'],
            'microdermabrasion' => ['Diamond Microdermabrasion Facial', 'Signature HydraFacial'],
        ];

        foreach ($menus as $menuKey => [$expected, $unrelated]) {
            $names = collect(config('service-pricing.'.$menuKey.'.groups'))
                ->flatMap(function ($group) {
                    return collect($group['items'])->pluck('name');
                })
                ->all();

            $this->assertContains($expected, $names, 'Expected treatment missing from '.$menuKey);
            $this->assertNotContains($unrelated, $names, 'Unrelated treatment leaked into '.$menuKey);
        }

        $bodyNames = collect(config('service-pricing.body-treatments.groups'))->flatMap(function ($group) {
            return collect($group['items'])->pluck('name');
        })->all();
        $this->assertSame(['Body Glow', 'Body Wrap'], $bodyNames);

        $massageNames = collect(config('service-pricing.massage.groups'))->flatMap(function ($group) {
            return collect($group['items'])->pluck('name');
        })->unique()->values()->all();
        $this->assertSame(
            ['Relaxation Massage by Esthetician', 'Hot Stone Massage', 'Foot Massage'],
            $massageNames
        );
    }

    public function testRemovedServiceIsUnavailable()
    {
        $removedService = 'Su'.'garing';

        $this->get('/services/'.strtolower($removedService))->assertNotFound();
        $this->get('/')->assertDontSee($removedService);
    }
}
