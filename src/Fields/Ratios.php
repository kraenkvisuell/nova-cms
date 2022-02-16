<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Select;

class Ratios
{
    public static function make()
    {
        $options = [];
        foreach (config('nova-cms.content.images.ratios') as $ratio) {
            $options[$ratio] = __($ratio);
        }

        return Select::make(__('nova-cms::content_blocks.ratio'), 'ratio')
            ->options($options);
    }
}
