<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Services;

use WebWhales\LaravelMultilingual\Exceptions\LocaleNotFoundException;
use WebWhales\LaravelMultilingual\Models\Locale;

class LocaleService
{
    /**
     * @throws LocaleNotFoundException
     */
    public function getLocaleBySlug(string $slug): Locale
    {
        $locale = Locale::whereSlug($slug)
            ->first();

        if (! $locale instanceof Locale) {
            throw new LocaleNotFoundException($slug);
        }

        return $locale;
    }

    /**
     * @throws LocaleNotFoundException
     */
    public function getLocaleValueBySlug(string $slug): string
    {
        $locale = Locale::whereSlug($slug)
            ->select('locale')
            ->first();

        if (! $locale instanceof Locale) {
            throw LocaleNotFoundException::bySlug($slug);
        }

        return $locale->locale;
    }

    /**
     * @throws LocaleNotFoundException
     */
    public function getLocaleModelByLocale(string $locale): Locale
    {
        $locale = Locale::whereLocale($locale)
            ->first();

        if (! $locale instanceof Locale) {
            throw LocaleNotFoundException::byLocale($locale);
        }

        return $locale;
    }

    /**
     * @throws LocaleNotFoundException
     */
    public function getLocaleIdByLocale(string $locale): int
    {
        $locale = Locale::whereLocale($locale)
            ->select('id')
            ->first();

        if (! $locale instanceof Locale) {
            throw LocaleNotFoundException::byLocale($locale);
        }

        return $locale->id;
    }
}
