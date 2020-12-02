<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Flexible;

class Sounds
{
    public static function make()
    {
        $fields = [
            Textarea::make(__('embed code'), 'embed_code')
                ->rows(10)
                ->stacked(),
        ];

        return Flexible::make(__('sounds'), 'sounds')
            ->addLayout(__('sound'), 'sound', $fields)
            ->button(__('add sound'))
            ->collapsed();
    }
}
