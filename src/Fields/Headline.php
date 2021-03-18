<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Headline
{
    public static function make()
    {
        return Textarea::make(__('nova-cms::content_blocks.headline'), 'headline')
            ->rows(2)
            ->translatable();

        return Text::make(__('nova-cms::content_blocks.link'), 'headline_link');
    }
}
