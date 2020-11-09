<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Select;

class ImagePosition
{
    public static function make()
    {
        return Select::make(__('images position'), 'images_position')
            ->options([
                'left' => __('left'),
                'right' => __('right'),
                'top' => __('oben'),
                'bottom' => __('unten'),
            ]);
    }
}
