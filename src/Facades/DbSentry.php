<?php

namespace Nobledsmarts\DBSentry\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nobledsmarts\DBSentry\DBSentry
 */
class DBSentry extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Nobledsmarts\DBSentry\DBSentry::class;
    }
}
