<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Kraenkvisuell\NovaCmsBlocks\Blocks;

class SubContentBlocks
{
    public static function make()
    {
        $fields = [
            Headline::make(),
            Anchor::make(),
            Blocks::make(__('nova-cms::content_blocks.items'), 'items')
                ->addLayout(__('nova-cms::content_blocks.text'), 'text', [
                    EditorText::make(),
                ])
                ->addLayout(__('nova-cms::content_blocks.images'), 'images', [
                    Images::make(),
                ])
                ->addLayout(__('nova-cms::content_blocks.videos'), 'videos', [
                    Videos::make(),
                ])
                ->addLayout(__('nova-cms::content_blocks.sounds'), 'sounds', [
                    Sounds::make(),
                ])
                ->addLayout(__('nova-cms::content_blocks.downloads'), 'downloads', [
                    Headline::make(),
                    Downloads::make(),
                ])
                ->button(__('nova-cms::content_blocks.add_item'))
                ->collapsed()
                ->stacked(),
            BottomLinks::make()->stacked(),
        ];



        return Blocks::make(__('nova-cms::content_blocks.sub_content_blocks'), 'sub_content_blocks')
            ->addLayout(__('nova-cms::content_blocks.sub_content_block'), 'sub_content_block', $fields)
            ->button(__('nova-cms::content_blocks.add_sub_content_block'));
    }
}
