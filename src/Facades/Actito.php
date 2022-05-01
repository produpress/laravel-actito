<?php

namespace Produpress\Actito\Facades;

use Illuminate\Support\Facades\Facade;

class Actito extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actito';
    }
}
