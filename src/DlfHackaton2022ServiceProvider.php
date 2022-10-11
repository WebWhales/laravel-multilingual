<?php

namespace WebWhales\DlfHackaton2022;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
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

            return 'dir="'.$isRtl ?? 'ltr'.'"';
        });

        Blade::directive('contentLangTag', function () {
            return 'lang="'.str_replace('_', '-', app()->getLocale()).'"';
        });

        Blade::directive('hrefLangTags', function () {
            // ToDo: Getting the href languages for the current Model post.
            $postLocales = collect();

            $this->getPostLocaleUrls($postLocales)->each(function ($href, $local) {
                echo '<link rel="alternate" hreflang="' . $local . '" href="' . $href . '">';
            });
        });
    }

    public function getPostLocaleUrls(Collection $postLocales): Collection
    {
        $postLocaleUrls = [];
        $postLocales->each(function ($locale) use (&$postLocaleUrls) {
            $postLocaleUrls[$locale] = localized_route(
                request()->route()->getName(),
                request()->route()->parameters(),
                $locale
            );
        });

        return collect($postLocaleUrls);
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
