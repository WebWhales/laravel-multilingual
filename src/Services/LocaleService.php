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
            throw new LocaleNotFoundException($slug);
        }

        return $locale->locale;
    }
}