<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Tests\TestSupport;

use Illuminate\Database\Eloquent\Model;
use WebWhales\LaravelMultilingual\Traits\Multilingual;

class TestModel extends Model
{
    use Multilingual;

    protected $table = 'test_models';

    protected $guarded = [];

    public $timestamps = false;
}
