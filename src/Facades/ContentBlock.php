<?php

namespace Kraenkvisuell\NovaCms\Facades;

use Illuminate\Support\Facades\Facade;

class ContentBlock extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'content-block';
    }
}
