<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;

class Caption
{
    public static function make()
    {
        return Textarea::make(__('nova-cms::content_blocks.caption'), 'caption')
        ->rows(2)
        ->translatable();
    }
}
