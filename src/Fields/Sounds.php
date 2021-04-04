<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaCmsBlocks\Blocks;

class Sounds
{
    public static function make()
    {
        $fields = [
            Textarea::make(__('nova-cms::content_blocks.embed_code'), 'embed_code')
                ->rows(10)
                ->stacked(),
        ];

        return Blocks::make(__('nova-cms::content_blocks.sounds'), 'sounds')
            ->addLayout(__('nova-cms::content_blocks.sound'), 'sound', $fields)
            ->button(__('nova-cms::content_blocks.add_sound'))
            ->collapsed();
    }
}
