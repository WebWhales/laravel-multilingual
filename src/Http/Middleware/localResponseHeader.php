<?php

declare(strict_types=1);

namespace WebWhales\DlfHackaton2022\Http\Middleware;

use Closure;

class localResponseHeader
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Content-Language', app()->getLocale());

        return $response;
    }
}
