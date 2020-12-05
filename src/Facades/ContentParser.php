<?php

namespace Kraenkvisuell\NovaCms\Facades;

use Illuminate\Support\Facades\Facade;

class ContentParser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'content-parser';
    }
}
