<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Text;

class HeadlineLink
{
    public static function make()
    {
        return Text::make(__('nova-cms::content_blocks.headline_link'), 'headline_link');
    }
}
