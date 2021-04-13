<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Manogi\Tiptap\Tiptap;

class EditorText
{
    public static function make($editorType = 'default')
    {
        $headingLevels = [3, 4, 5];
        $buttons = [
            'heading',
            'bold',
            'italic',
            'link',
            'blockquote',
            'bullet_list',
            'table',
        ];

        if (is_array(config('nova-cms.content.editor.'.$editorType.'.heading_levels'))) {
            $headingLevels = config('nova-cms.content.editor.'.$editorType.'.heading_levels');
        }
        if (is_array(config('nova-cms.content.editor.'.$editorType.'.buttons'))) {
            $buttons = config('nova-cms.content.editor.'.$editorType.'.buttons');
        }

        return Tiptap::make(__('nova-cms::content_blocks.text'), 'text')
            ->buttons($buttons)
            ->headingLevels($headingLevels)
            ->translatable()
            ->stacked();
    }
}
