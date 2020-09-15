<?php

namespace Kraenkvisuell\NovaCms\Nova;

use Kraenkvisuell\Tabs\Tabs;
use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Kraenkvisuell\Tabs\TabsOnEdit;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaContentBlocks\Facades\ContentBlock;
use Kraenkvisuell\NovaHero\Facades\Hero;

class Page extends Resource
{
    use TabsOnEdit;

    public static $model = \Kraenkvisuell\NovaCms\Models\Page::class;

    public static $title = 'title';

    public static $search = [
        'title',
    ];

    public static function label()
    {
        return 'Seiten';
    }

    public static function singularLabel()
    {
        return 'Seite';
    }

    public function fields(Request $request)
    {
        $tabs = [
            'Main' => [
                Text::make('Seitentitel', 'title')
                    ->sortable()
                    ->rules('required', 'max:255')
                    ->translatable(),

                Text::make('Text-ID', 'slug')
                    ->sortable()
                    ->rules('required', 'max:255')
                    ->translatable()
                    ->help('Wird in der URL verwendet (außer bei der Startseite)'),

                Boolean::make('Ist Startseite', 'is_home'),
            ]
        ];

        if (config('nova-pages.has_hero')) {
            $tabs['Hero'] = [
                Hero::field(),
            ];
        }

        $tabs['Inhalt'] = [
            ContentBlock::field(),
        ];

        $tabs['SEO'] = [
            Text::make('Browser Title')
                ->translatable(),

            Textarea::make('Meta Description')
                    ->translatable(),
        ];

        return [
            (new Tabs('Seite', $tabs))->withToolbar(),
        ];
    }
}
