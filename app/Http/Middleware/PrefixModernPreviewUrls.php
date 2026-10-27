<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrefixModernPreviewUrls
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (! config('modern-preview.enabled') || ! $this->isHtmlResponse($response)) {
            return $response;
        }

        $prefix = rtrim(config('modern-preview.path'), '/');
        $content = preg_replace_callback(
            '/(?P<attribute>\b(?:href|src|action)=["\'])(?P<path>\/(?!\/)[^"\']*)/i',
            static function (array $matches) use ($prefix) {
                if ($matches['path'] === $prefix || strpos($matches['path'], $prefix.'/') === 0) {
                    return $matches[0];
                }

                return $matches['attribute'].$prefix.$matches['path'];
            },
            $response->getContent()
        );

        $response->setContent($content);

        return $response;
    }

    private function isHtmlResponse(Response $response): bool
    {
        return strpos((string) $response->headers->get('Content-Type'), 'text/html') !== false;
    }
}
