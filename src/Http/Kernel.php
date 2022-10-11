<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Router;
use WebWhales\LaravelMultilingual\Http\Middleware\LocalResponseHeader;

class Kernel extends HttpKernel
{
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', LocalResponseHeader::class);
    }
}
