<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use WebWhales\LaravelMultilingual\Models\Locale;
use WebWhales\LaravelMultilingual\Models\ModelTranslation;
use WebWhales\LaravelMultilingual\Scopes\MultilingualScope;
use WebWhales\LaravelMultilingual\Services\LocaleService;
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
            if (empty($model->locale_id)) {
                $model->locale_id = app(LocaleService::class)->getCurrentLocaleId();
            }
        });
    }

    /**
     * @return \Illuminate\Support\Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    public function getTranslations(): Collection
    {

        return self::query()
            ->withoutLocale()
            ->whereIn('id',
                ModelTranslation::query()
                    ->where('translatable_type', self::class)
                    ->where(function (Builder $query) {
                        $query->where('translatable_id', $this->id)
                            ->orWhere('translation_id', $this->id);
                    })
                    ->get()
                    ->map(fn (ModelTranslation $t) => $t->translatable_id !== $this->id ? $t->translatable_id :
                        $t->translation_id)
                    ->diff($this->id)
                    ->toArray()
            )->get();
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
