<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use WebWhales\LaravelMultilingual\Models\Locale;

class MultilingualScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $column = $this->getLocaleIdColumn($builder);
        $locale = $this->retrieveCurrentLocale();

        $builder->where($column, $locale->id);
    }

    /**
     * Extend the query builder with the needed functions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
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
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return string
     */
    protected function getLocaleIdColumn(Builder $builder)
    {
        if (count((array) $builder->getQuery()->joins) > 0) {
            return $builder->getModel()->getQualifiedLocaleIdColumn();
        }

        return $builder->getModel()->getLocaleIdColumn();
    }

    private function retrieveCurrentLocale(): Locale
    {
        return Locale::query()->first();
    }
}
