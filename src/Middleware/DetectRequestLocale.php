<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Middleware;

use Closure;
use Illuminate\Http\Request;
use WebWhales\LaravelMultilingual\Exceptions\LocaleNotFoundException;
use WebWhales\LaravelMultilingual\Services\LocaleService;

class DetectRequestLocale
{
    public function __construct(
        protected LocaleService $localeService
    ) {
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     *
     * @throws LocaleNotFoundException
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $requestedLocale = $request->query('locale') ?: $request->route()?->parameter('locale');

        if ($requestedLocale !== null) {
            app()->setLocale($this->localeService->getLocaleValueBySlug($requestedLocale));
        }

        return $next($request);
    }
}
