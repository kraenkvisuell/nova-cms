<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Text;
use Whitecube\NovaFlexibleContent\Flexible;

class BottomLinks
{
    public static function make()
    {
        $fields = [
            Text::make(__('link text'), 'link_text')
                ->translatable(),

            Text::make(__('link url'), 'link_url')
                ->translatable(),
        ];

        return Flexible::make(__('bottom links'), 'bottom_links')
            ->addLayout(__('link'), 'link', $fields)
            ->button(__('add link'))
            ->stacked();
    }
}
