<?php

namespace Produpress\Actito\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Actito Facade
 *
 * @package Produpress\Actito\Facades
 */
class Actito extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito';
    }
}
