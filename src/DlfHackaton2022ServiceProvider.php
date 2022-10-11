<?php

namespace WebWhales\DlfHackaton2022;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebWhales\DlfHackaton2022\Commands\DlfHackaton2022Command;

class DlfHackaton2022ServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        Blueprint::macro('multilingual', function () {
            $this->bigInteger('local_id');
        });

        Blade::directive('isContentLtrTag', function () {
            // ToDo: Getting the content direction from the current selected language.
            $isRtl = '';

            return 'dir="' . $isRtl ?? 'ltr' . '"';
        });

        Blade::directive('contentLangTag', function () {
            return 'lang="' . str_replace('_', '-', app()->getLocale()) . '"';
        });

        Blade::directive('hrefLangTags', function () {
            // ToDo: Getting the current model post.
            $post = '';

            // ToDo: Getting the href languages for the current Model post.
            // I assume this is a collection.
            $postLocales = collect();

            // ToDo:
            // - Looping over the translations of the current model.
            // - Using a route helper to generate the URL's based on the Translations.
            $postLocales->each(function ($language) use ($post) {

                // Problems:
                // - Routes defined by the developer will have different parameters, I cannot simply call the route for the given Model.
                // It should go through a middleware of some kind..
                // - ...
                echo route(request()->route()->getName(), ['post' => $post, 'locale' => 'de']);
            });
        });
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
