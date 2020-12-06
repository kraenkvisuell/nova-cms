<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Select;

class ImagePosition
{
    public static function make()
    {
        return Select::make(__('nova-cms::content_blocks.images_position'), 'images_position')
            ->options([
                'left' => __('nova-cms::content_blocks.left'),
                'right' => __('nova-cms::content_blocks.right'),
                'top' => __('nova-cms::content_blocks.top'),
                'bottom' => __('nova-cms::content_blocks.bottom'),
            ]);
    }
}
