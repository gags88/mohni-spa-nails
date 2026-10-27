<?php

namespace Tests\Feature;

use App\Http\Middleware\EnsureModernPreviewAccess;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ModernPreviewAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'modern-preview.enabled' => true,
            'modern-preview.password_hash' => Hash::make('test-preview-password'),
            'modern-preview.duration' => 120,
            'modern-preview.path' => '/modern',
        ]);
    }

    protected function tearDown(): void
    {
        Carbon::setTestNow();

        parent::tearDown();
    }

    public function test_preview_pages_require_a_password()
    {
        $this->get('/')
            ->assertRedirect(route('modern-preview.login'));

        $this->get(route('modern-preview.login'))
            ->assertOk()
            ->assertSee('A private first look')
            ->assertSee('Mohni Nail and Spa website')
            ->assertSee('href="/modern/css/modern-preview.css?v=1.0"', false)
            ->assertDontSee('laser-luxury-hero', false)
            ->assertDontSee('<style>', false)
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow, noarchive');
    }

    public function test_incorrect_password_is_rejected()
    {
        $this->from(route('modern-preview.login'))
            ->post(route('modern-preview.authenticate'), [
                'password' => 'incorrect-password',
            ])
            ->assertRedirect(route('modern-preview.login'))
            ->assertSessionHasErrors('password')
            ->assertSessionMissing(EnsureModernPreviewAccess::SESSION_KEY);
    }

    public function test_correct_password_grants_access_for_two_hours()
    {
        Carbon::setTestNow(Carbon::parse('2026-10-26 12:00:00'));

        $this->post(route('modern-preview.authenticate'), [
            'password' => 'test-preview-password',
        ])->assertRedirect(route('home.show'));

        $this->assertSame(
            now()->addMinutes(120)->timestamp,
            session(EnsureModernPreviewAccess::SESSION_KEY)
        );

        Carbon::setTestNow(now()->addMinutes(119));

        $response = $this->get('/');

        $response->assertOk();
        $this->assertStringContainsString('no-store', $response->headers->get('Cache-Control'));

        Carbon::setTestNow(now()->addMinutes(2));

        $this->get('/')
            ->assertRedirect(route('modern-preview.login'))
            ->assertSessionMissing(EnsureModernPreviewAccess::SESSION_KEY);
    }

    public function test_internal_urls_are_prefixed_for_the_modern_path()
    {
        $this->withSession([
            EnsureModernPreviewAccess::SESSION_KEY => now()->addMinutes(120)->timestamp,
        ])->get('/')
            ->assertOk()
            ->assertSee('href="/modern/about"', false)
            ->assertSee('src="/modern/images/hero/laser-luxury-hero.webp"', false)
            ->assertDontSee('href="/modern/modern/', false);
    }
}
