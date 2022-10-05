<?php

namespace WebWhales\DlfHackaton2022\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \WebWhales\DlfHackaton2022\DlfHackaton2022
 */
class DlfHackaton2022 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \WebWhales\DlfHackaton2022\DlfHackaton2022::class;
    }
}
