<?php

namespace Kraenkvisuell\NovaCms\Nova;

use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Eminiarts\Tabs\TabsOnEdit;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaCms\Facades\ContentBlock;

class Page extends Resource
{
    use TabsOnEdit;

    public static $model = \Kraenkvisuell\NovaCms\Models\Page::class;

    public static $title = 'title';

    public static $sortable = false;

    public static $search = [
        'title',
    ];

    public static function label()
    {
        return __('pages');
    }

    public static function singularLabel()
    {
        return __('page');
    }

    protected static function applyOrderings($query, array $orderings)
    {
        return parent::applyOrderings($query, ['is_home' => 'desc']);
    }

    public function fields(Request $request)
    {
        $tabs = [
            'Main' => [
                Text::make('Seitentitel', 'title')
                    ->translatable(),

                Text::make('Text-ID', 'slug')
                    ->translatable()
                    ->help('Wird in der URL verwendet (außer bei der Startseite)'),

                Boolean::make('Ist Startseite', 'is_home'),
            ]
        ];

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
