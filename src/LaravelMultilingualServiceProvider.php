<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
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
                echo '<link rel="alternate" hreflang="'.$local.'" href="'.$href.'">';
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
        $package->name('laravel-multilingual')
                ->hasMigrations(['create_locales_table']);
    }
}
