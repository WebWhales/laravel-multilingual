<?php

declare(strict_types=1);

namespace WebWhales\DlfHackaton2022;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use WebWhales\DlfHackaton2022\Scopes\MultilingualScope;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder withLocale(Locale|int $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder withoutLocale()
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait Multilingual
{
    public static function bootMultilingual(): void
    {
        static::addGlobalScope(new MultilingualScope);
    }

    public function translations(): MorphToMany
    {
        return $this->morphToMany(static::class, 'translatable', 'model_translations');
    }

    /**
     * Get the name of the "locale_id" column.
     *
     * @return string
     */
    public function getLocaleIdColumn(): string
    {
        return 'locale_id';
    }

    /**
     * Get the fully qualified "locale_id" column.
     *
     * @return string
     */
    public function getQualifiedLocaleIdColumn(): string
    {
        return $this->qualifyColumn($this->getLocaleIdColumn());
    }
}
