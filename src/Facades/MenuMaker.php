<?php

namespace Kraenkvisuell\NovaCms\Facades;

use Illuminate\Support\Facades\Facade;

class MenuMaker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'menu-maker';
    }
}
