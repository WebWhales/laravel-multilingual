<?php

namespace WebWhales\DlfHackaton2022\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Router;
use WebWhales\DlfHackaton2022\Http\Middleware\localResponseHeader;

class Kernel extends HttpKernel
{
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', localResponseHeader::class);
    }
}
