<?php

namespace Kraenkvisuell\NovaCms\Tabs;

use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;

class Seo
{
    public static function make()
    {
        $ogImageField = MediaLibrary::make(__('nova-cms::content_blocks.og_image'), 'og_image')
            ->types(['Image'])
            ->onlyOnForms();

        if (config('nova-cms.content.media.upload_only')) {
            $ogImageField->uploadOnly();
        }

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

            Text::make(__('nova-cms::content_blocks.og_title'), 'og_title')
                ->translatable()
                ->onlyOnForms(),

            Textarea::make(__('nova-cms::content_blocks.og_description'), 'og_description')
                ->translatable()
                ->onlyOnForms(),

            $ogImageField,
        ];
    }
}
