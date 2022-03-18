<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;

class SubContentBlocks
{
    public static function make()
    {
        $textFields = [
            Headline::make(),
            EditorText::make(),
            Boolean::make(__('nova-cms::content_blocks.collapsed'), 'collapsed'),
        ];

        if (
            config('nova-cms.content.with_subcontent_bg_color')
            && is_array(config('nova-cms.content.bg_colors'))
        ) {
            $textFields[] = Select::make(__('nova-cms::pages.bg_color'), 'bg_color')
                ->options(config('nova-cms.content.bg_colors'));
        }

        $imageFields = [
            Images::make(),
        ];

        if (
            config('nova-cms.content.images.orientations')
            && is_array(config('nova-cms.content.images.orientations'))
        ) {
            $imageFields[] = Select::make(__('nova-cms::content_blocks.orientation'), 'orientation')
                ->options(config('nova-cms.content.images.orientations'));
        }

        $fields = [
            Headline::make(),
            Anchor::make(),
            Blocks::make(__('nova-cms::content_blocks.items'), 'items')
                ->addLayout(__('nova-cms::content_blocks.text'), 'text', $textFields)
                ->addLayout(__('nova-cms::content_blocks.images'), 'images', $imageFields)
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
