<?php

namespace Kraenkvisuell\NovaCms\Facades;

use Illuminate\Support\Facades\Facade;

class ProxyObject extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'proxy-object';
    }
}
