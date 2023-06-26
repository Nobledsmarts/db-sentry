<?php

namespace Nobledsmarts\DbSentry\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nobledsmarts\DbSentry\DbSentry
 */
class DbSentry extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Nobledsmarts\DbSentry\DbSentry::class;
    }
}
