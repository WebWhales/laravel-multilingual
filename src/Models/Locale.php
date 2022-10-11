<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'locale',
        'slug',
        'name',
        'is_rtl',
        'default_language',
    ];

    protected $casts = [
        'is_rtl' => 'boolean',
        'default_language' => 'boolean',
    ];
}
