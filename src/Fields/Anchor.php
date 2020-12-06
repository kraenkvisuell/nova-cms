<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Text;

class Anchor
{
    public static function make()
    {
        return Text::make(__('nova-cms::content_blocks.anchor'), 'anchor')->translatable();
    }
}
