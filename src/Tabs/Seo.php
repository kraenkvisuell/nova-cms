<?php

namespace Kraenkvisuell\NovaCms\Tabs;

use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Seo
{
    public static function make()
    {
        return [
            Text::make(__('nova-cms::seo.browser_title'), 'browser_title')
                ->translatable()
                ->onlyOnForms(),

            Textarea::make(__('nova-cms::seo.meta_description'), 'meta_description')
                    ->translatable()
                    ->onlyOnForms(),

            Textarea::make(__('nova-cms::seo.meta_keywords'), 'meta_keywords')
                    ->translatable()
                    ->onlyOnForms(),

            BooleanGroup::make(__('nova-cms::seo.robots'), 'robots')
                    ->options([
                        'index' => 'Index',
                        'follow' => 'Follow',
                    ])
                    ->default([
                        'index' => true,
                        'follow' => true,
                    ])
                    ->onlyOnForms(),
        ];
    }
}
