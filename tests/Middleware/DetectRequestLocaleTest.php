<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use WebWhales\LaravelMultilingual\Exceptions\LocaleNotFoundException;
use WebWhales\LaravelMultilingual\Middleware\DetectRequestLocale;

uses(RefreshDatabase::class);

it('uses the default locale', function () {
    registerTestRoutes();

    $this->get('/')->assertOk();

    $this->assertEquals('en', app()->getLocale());
});

it('detects the query locale', function () {
    registerTestRoutes();

    $this->get('/?locale=nl')->assertOk();

    $this->assertEquals('nl', app()->getLocale());
});

it('uses the prefixed segment as locale', function ($locale) {
    registerPrefixedTestRoutes();

    $this->get("/{$locale}/test")->assertOk();

    $this->assertEquals($locale, app()->getLocale());
})->with([
    'nl',
    'en',
]);

it('triggers exceptions when locale does not exists', function () {
    registerPrefixedTestRoutes();

    $this->withoutExceptionHandling();

    try {
        $this->get('/de/test');
    } catch (LocaleNotFoundException $e) {
        $this->assertEquals("Locale with slug 'de' not found.", $e->getMessage());
        $this->assertEquals('en', app()->getLocale());

        throw $e;
    }
})->throws(LocaleNotFoundException::class);

function registerTestRoutes(): void
{
    Route::get(
        '/',
        static function () {
            //
        }
    )->middleware(DetectRequestLocale::class);
}

function registerPrefixedTestRoutes(): void
{
    Route::prefix('{locale}')
        ->get('/test', static function () {
            //
        })
        ->middleware(DetectRequestLocale::class);
}
