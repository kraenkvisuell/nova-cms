<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Manogi\Tiptap\Tiptap;

class EditorText
{
    public static function make()
    {
        $headingLevels = [3, 4, 5];

        if (is_array(config('nova-cms.heading_levels'))) {
            $headingLevels = config('nova-cms.heading_levels');
        }

        return Tiptap::make(__('text'), 'text')
            ->buttons([
                'heading',
                'bold',
                'italic',
                'link',
                'blockquote',
                'bullet_list',
                'table',
            ])
            ->headingLevels($headingLevels)
            ->translatable()
            ->stacked();
    }
}
