<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Kraenkvisuell\NovaCms\Models\Page;
use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class BottomLinks
{
    public static function make($fieldTitle = null, $fieldSlug = 'bottom_links')
    {
        $fieldTitle = $fieldTitle ?: __('nova-cms::content_blocks.bottom_links');

        $fields = [
            Text::make(__('nova-cms::content_blocks.link_text'), 'link_text')
                ->translatable(),

            Text::make(__('nova-cms::content_blocks.link_url'), 'link_url')
                ->translatable(),

            Select::make(__('nova-cms::content_blocks.link_page_id'), 'link_page_id')->options(function () {
                return Page::pluck('slug', 'id');
            }),

            MediaLibrary::make(__('nova-cms::content_blocks.download_file'), 'file'),
        ];

        return Blocks::make($fieldTitle, $fieldSlug)
            ->addLayout(__('nova-cms::content_blocks.link'), 'link', $fields)
            ->button(__('nova-cms::content_blocks.add_link'))
            ->stacked();
    }
}
