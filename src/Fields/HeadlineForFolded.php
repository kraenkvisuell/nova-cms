<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;

class HeadlineForFolded
{
    public static function make()
    {
        return Textarea::make(__('nova-cms::content_blocks.headline_for_folded'), 'headline_for_folded')
            ->rows(1)
            ->translatable();
    }
}
