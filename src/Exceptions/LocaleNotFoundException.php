<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Exceptions;

class LocaleNotFoundException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function bySlug(string $slug): self
    {
        return new self("Locale with slug '{$slug}' not found.");
    }

    public static function byLocale(string $locale): self
    {
        return new self("Locale with locale '{$locale}' not found.");
    }

    public static function noLocales(): self
    {
        return new self("Locale table is empty.");
    }
}
