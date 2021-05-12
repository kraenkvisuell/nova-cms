<?php

namespace Kraenkvisuell\NovaCms\Nova;

use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Eminiarts\Tabs\TabsOnEdit;
use Laravel\Nova\Fields\Boolean;
use Kraenkvisuell\NovaCms\Tabs\Seo;
use Kraenkvisuell\NovaCms\Facades\ContentBlock;

class Page extends \App\Nova\Resource
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
        return __('nova-cms::pages.pages');
    }

    public static function singularLabel()
    {
        return __('nova-cms::pages.page');
    }

    protected static function applyOrderings($query, array $orderings)
    {
        return parent::applyOrderings($query, ['is_home' => 'desc']);
    }

    public function fields(Request $request)
    {
        $tabs = [];

        $contentTab = [
            ContentBlock::field(),
        ];


        $settingsTab = [
            Text::make(__('nova-cms::pages.page_title'), 'title')
                ->translatable(),

            Text::make(__('nova-cms::pages.slug'), 'slug')
                ->translatable()
                ->help(__('nova-cms::pages.slug_explanation')),

            Boolean::make(__('nova-cms::pages.is_home'), 'is_home')->hideFromIndex(),
        ];

        if ($request->resourceId === null) {
            $tabs[__('nova-cms::settings.settings')] =  $settingsTab;
            $tabs[__('nova-cms::pages.content')] =  $contentTab;
        } else {
            $tabs[__('nova-cms::pages.content')] =  $contentTab;
            $tabs[__('nova-cms::settings.settings')] =  $settingsTab;
        }

        $tabs[__('nova-cms::seo.seo')] = Seo::make();

        return [
            (new Tabs(__('nova-cms::pages.page'), $tabs))->withToolbar(),
        ];
    }
}
