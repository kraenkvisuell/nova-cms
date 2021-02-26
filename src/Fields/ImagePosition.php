<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Select;

class ImagePosition
{
    public static function make()
    {
        $options = [];
        foreach (config('nova-cms.text-images-positions') ?: ['left', 'right', 'top', 'bottom'] as $position) {
            $options[$position] = __('nova-cms::content_blocks.'.$position);
        }
        return Select::make(__('nova-cms::content_blocks.images_position'), 'images_position')
            ->options($options);
    }
}
