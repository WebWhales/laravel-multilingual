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

        Blade::directive('content_dir', function () {
            // ToDo: Getting the content direction from the current selected language.
            $contentDirection = '';

            return 'dir="'.$contentDirection ?? 'ltr'.'"';
        });

        Blade::directive( 'href_language', function() {
            // ToDo: Getting the current model post.
            $post = '';

            // ToDo: Getting the href languages for the current Model post.
            // I assume this is a collection.
            $postLanguages = collect();

            // ToDo:
            // - Looping over the translations of the current model.
            // - Using a route helper to generate the URL's based on the Translations.
            $postLanguages->each( function( $language ) use ( $post ) {

                // Problems:
                // - Routes defined by the developer will have different parameters.
                // - ...
                echo route( request()->route()->getName(), ['post' => $post, 'lang' => 'de']);
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
