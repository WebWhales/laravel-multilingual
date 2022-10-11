<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Exceptions;

class LocaleNotFoundException extends \Exception
{
    public function __construct(string $slug)
    {
        parent::__construct("Locale with slug '{$slug}' not found.");
    }
}
