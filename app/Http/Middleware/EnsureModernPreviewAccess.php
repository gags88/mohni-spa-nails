<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureModernPreviewAccess
{
    public const SESSION_KEY = 'modern_preview_authenticated_until';

    public function handle(Request $request, Closure $next)
    {
        if (! config('modern-preview.enabled')) {
            return $next($request);
        }

        if ($request->routeIs('modern-preview.*')) {
            return $this->withPrivateCacheHeaders($next($request));
        }

        if (! filled(config('modern-preview.password_hash'))) {
            abort(503, 'Preview access is not configured.');
        }

        $authenticatedUntil = (int) $request->session()->get(self::SESSION_KEY, 0);

        if ($authenticatedUntil <= now()->timestamp) {
            $request->session()->forget(self::SESSION_KEY);

            return $this->withPrivateCacheHeaders(
                redirect()->guest(route('modern-preview.login'))
            );
        }

        return $this->withPrivateCacheHeaders($next($request));
    }

    private function withPrivateCacheHeaders($response)
    {
        $response->headers->set('Cache-Control', 'private, no-store, no-cache, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        $response->headers->set('X-Robots-Tag', 'noindex, nofollow, noarchive');

        return $response;
    }
}
