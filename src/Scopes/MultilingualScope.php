<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use WebWhales\LaravelMultilingual\Exceptions\LocaleNotFoundException;
use WebWhales\LaravelMultilingual\Models\Locale;
use WebWhales\LaravelMultilingual\Services\LocaleService;

class MultilingualScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $column = $this->getLocaleIdColumn($builder);
        $localeId = $this->retrieveCurrentLocaleId();

        $builder->where($column, $localeId);
    }

    /**
     * Extend the query builder with the needed functions.
     *
     * @return void
     */
    public function extend(Builder $builder)
    {
        $builder->macro('withLocale', function (Builder $builder, Locale|int $locale) {
            $column = $this->getLocaleIdColumn($builder);

            if ($locale instanceof Locale) {
                $locale = $locale->id;
            }

            return $builder->withoutGlobalScope($this)->where($column, $locale);
        });

        $builder->macro('withoutLocale', function (Builder $builder) {
            return $builder->withoutGlobalScope($this);
        });
    }

    /**
     * Get the "locale_id" column for the builder.
     *
     * @return string
     */
    protected function getLocaleIdColumn(Builder $builder)
    {
        if (count((array) $builder->getQuery()->joins) > 0) {
            return $builder->getModel()->getQualifiedLocaleIdColumn();
        }

        return $builder->getModel()->getLocaleIdColumn();
    }

    /**
     * @throws LocaleNotFoundException
     */
    private function retrieveCurrentLocaleId(): int
    {
        return app(LocaleService::class)->getCurrentLocaleId();
    }
}
