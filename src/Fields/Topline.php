<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;

class Topline
{
    public static function make()
    {
        return Textarea::make(__('topline'), 'topline')
            ->rows(1)
            ->translatable();
    }
}
