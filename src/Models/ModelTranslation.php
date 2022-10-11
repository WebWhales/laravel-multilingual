<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ModelTranslation extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'translatable_type',
        'translatable_id',
        'translation_id',
    ];

    protected $table = 'model_translations';
}
