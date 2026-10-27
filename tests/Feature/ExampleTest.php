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
            ->assertSee('/images/hero/laser-luxury-hero.webp', false)
            ->assertSee('/images/hero/facial-luxury-hero.webp', false)
            ->assertSee('/images/hero/manicure-luxury-hero.webp', false)
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
            ->assertSee('Full Legs');
    }
}
