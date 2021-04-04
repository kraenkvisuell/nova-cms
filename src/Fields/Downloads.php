<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Text;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Kraenkvisuell\NovaCmsBlocks\Blocks;

class Downloads
{
    public static function make()
    {
        $fields = [
            MediaLibrary::make(__('nova-cms::content_blocks.file'), 'file')
                ->stacked(),

            Text::make(__('nova-cms::content_blocks.download_title'), 'title')
                ->translatable()
                ->stacked(),
        ];

        return Blocks::make(__('nova-cms::content_blocks.downloads'), 'downloads')
            ->addLayout(__('nova-cms::content_blocks.download'), 'download', $fields)
            ->button(__('nova-cms::content_blocks.add_download'))
            ->collapsed();
    }
}
