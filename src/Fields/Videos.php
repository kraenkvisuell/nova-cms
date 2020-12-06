<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Flexible;

class Videos
{
    public static function make()
    {
        $fields = [
            Textarea::make(__('nova-cms::content_blocks.embed_code'), 'embed_code')
                ->rows(10)
                ->stacked(),
        ];

        return Flexible::make(__('nova-cms::content_blocks.videos'), 'videos')
            ->addLayout(__('nova-cms::content_blocks.video'), 'video', $fields)
            ->button(__('nova-cms::content_blocks.add_video'))
            ->collapsed();
    }
}
