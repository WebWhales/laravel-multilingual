<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'locale',
        'slug',
        'name',
        'is_rtl',
        'is_default',
    ];

    protected $casts = [
        'is_rtl' => 'boolean',
        'is_default' => 'boolean',
    ];
}
