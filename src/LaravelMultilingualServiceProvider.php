<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Routing\Router;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebWhales\LaravelMultilingual\Models\Locale;

class LaravelMultilingualServiceProvider extends PackageServiceProvider
{
    public function register()
    {
        $this->app->register(ViewServiceProvider::class);
        $this->app->register(MiddlewareServiceProvider::class);
    }

    public function boot()
    {
        Blueprint::macro('multilingual', function (Blueprint $table) {
            $table->foreignIdFor(Locale::class);
        });

        //$this->headerWebMiddleware();
    }

    private function headerWebMiddleware(): void
    {
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web');
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name('laravel-multilingual')
            ->hasMigrations(['create_locales_table']);
    }
}
