<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;

class Subcaption
{
    public static function make()
    {
        return Textarea::make(__('nova-cms::content_blocks.subcaption'), 'subcaption')
        ->rows(2)
        ->translatable();
    }
}
