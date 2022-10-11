<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual;

use Illuminate\Database\Schema\Blueprint;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebWhales\LaravelMultilingual\Models\Locale;

class LaravelMultilingualServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        Blueprint::macro('multilingual', function (Blueprint $table) {
            $table->foreignIdFor(Locale::class);
        });
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
