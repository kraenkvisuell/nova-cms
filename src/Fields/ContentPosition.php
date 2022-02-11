<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Select;

class ContentPosition
{
    public static function make()
    {
        $options = [];
        foreach (config('nova-cms.content.content_positions') as $position) {
            $options[$position] = __('nova-cms::content_blocks.'.$position);
        }

        return Select::make(__('nova-cms::content_blocks.block_position'), 'content_position')
            ->options($options);
    }
}
