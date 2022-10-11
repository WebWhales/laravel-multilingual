<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual;

use Illuminate\Database\Eloquent\Model;
use WebWhales\LaravelMultilingual\Models\Locale;
use WebWhales\LaravelMultilingual\Scopes\MultilingualScope;
use WebWhales\LaravelMultilingual\Tests\TestSupport\TestModel;

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

        static::creating(function (Model $model) {
            // Todo: recognize current locale
            if (empty($model->locale_id)) {
                $model->locale_id = Locale::query()->first()->id;
            }
        });
    }

    public function translations()
    {
        return $this->morphToMany(static::class, 'translatable', 'model_translations', 'translation_id', 'translatable_id');
    }

    public function attachTranslation(TestModel $translatedModel)
    {
        return $translatedModel->translations()->save($this);
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