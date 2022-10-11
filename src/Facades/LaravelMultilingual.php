<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \WebWhales\LaravelMultilingual\LaravelMultilingual
 */
class LaravelMultilingual extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \WebWhales\LaravelMultilingual\LaravelMultilingual::class;
    }
}
