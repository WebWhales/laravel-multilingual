<?php

namespace WebWhales\DlfHackaton2022\Tests\TestSupport;

use Illuminate\Database\Eloquent\Model;
use WebWhales\DlfHackaton2022\Multilingual;

class TestModel extends Model
{
    use Multilingual;

    protected $table = 'test_models';

    protected $guarded = [];

    public $timestamps = false;
}
