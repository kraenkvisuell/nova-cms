<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Flexible;

class Videos
{
    public static function make()
    {
        $fields = [
            Textarea::make(__('embed code'), 'embed_code')
                ->rows(10)
                ->stacked(),
        ];

        return Flexible::make(__('videos'), 'videos')
            ->addLayout(__('video'), 'video', $fields)
            ->button(__('add video'))
            ->collapsed();
    }
}
