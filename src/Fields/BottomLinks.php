<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Text;
use Whitecube\NovaFlexibleContent\Flexible;

class BottomLinks
{
    public static function make()
    {
        $fields = [
            Text::make(__('nova-cms::content_blocks.link_text'), 'link_text')
                ->translatable(),

            Text::make(__('nova-cms::content_blocks.link_url'), 'link_url')
                ->translatable(),
        ];

        return Flexible::make(__('nova-cms::content_blocks.bottom_links'), 'bottom_links')
            ->addLayout(__('nova-cms::content_blocks.link'), 'link', $fields)
            ->button(__('nova-cms::content_blocks.add_link'))
            ->stacked();
    }
}
