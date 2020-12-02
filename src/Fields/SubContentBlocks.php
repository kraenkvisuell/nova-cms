<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Whitecube\NovaFlexibleContent\Flexible;

class SubContentBlocks
{
    public static function make()
    {
        $fields = [
            Headline::make(),
            Anchor::make(),
            Flexible::make(__('items'), 'items')
                ->addLayout(__('text'), 'text', [
                    EditorText::make(),
                ])
                ->addLayout(__('images'), 'images', [
                    Images::make(),
                ])
                ->addLayout(__('videos'), 'videos', [
                    Videos::make(),
                ])
                ->addLayout(__('sounds'), 'sounds', [
                    Sounds::make(),
                ])
                ->button(__('add item'))
                ->collapsed()
                ->stacked(),
            BottomLinks::make()->stacked(),
        ];



        return Flexible::make(__('sub content blocks'), 'sub_content_blocks')
            ->addLayout(__('sub content block'), 'sub_content_block', $fields)
            ->button(__('add sub content block'));
    }
}
