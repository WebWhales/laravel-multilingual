<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use WebWhales\LaravelMultilingual\Http\Middleware\LocalResponseHeader;

class MiddlewareServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', LocalResponseHeader::class);
    }
}
