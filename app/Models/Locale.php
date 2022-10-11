<?php

namespace ebWhales\DlfHackaton2022\Models;

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
        'default_language'
    ];

    protected $casts = [
        'name' => 'boolean',
        'is_rtl' => 'boolean',
        'default_language' => 'boolean',
    ];
}
