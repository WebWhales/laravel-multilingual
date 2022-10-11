<?php

declare(strict_types=1);

namespace WebWhales\DlfHackaton2022;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Routing\Router;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebWhales\DlfHackaton2022\Commands\DlfHackaton2022Command;
use WebWhales\DlfHackaton2022\Models\Locale;

class DlfHackaton2022ServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        Blueprint::macro('multilingual', function (Blueprint $table) {
            $table->foreignIdFor(Locale::class);
        });

        $this->headerWebMiddleware();
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
        $package
            ->name('dlf-hackaton-2022')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_dlf-hackaton-2022_table')
            ->hasCommand(DlfHackaton2022Command::class);
    }
}
