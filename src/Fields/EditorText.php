<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Manogi\Tiptap\Tiptap;

class EditorText
{
    public static function make()
    {
        return Tiptap::make(__('text'), 'text')
            ->buttons([
                'heading',
                'bold',
                'italic',
                'link',
                'blockquote',
                'bullet_list',
            ])
            ->headingLevels([1, 2, 3, 4, 5])
            ->translatable()
            ->stacked();
    }
}
