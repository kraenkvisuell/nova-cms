<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Manogi\Tiptap\Tiptap;

class Caption
{
    public static function make()
    {
        return Tiptap::make(__('nova-cms::content_blocks.caption'), 'caption')
            ->buttons([
                'bold',
                'italic',
                'link',
            ])
            ->translatable()
            ->stacked();
    }
}
