<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Boolean;

class Hide
{
    public static function make()
    {
        return Boolean::make(__('hide'), 'hide');
    }
}
