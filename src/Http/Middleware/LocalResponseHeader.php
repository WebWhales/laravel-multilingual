<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Http\Middleware;

use Closure;

class LocalResponseHeader
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Content-Language', app()->getLocale());

        return $response;
    }
}
