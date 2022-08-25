<?php

namespace Kraenkvisuell\NovaCms\Nova;

use Eminiarts\Tabs\Tabs;
use Timothyasp\Color\Color;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Eminiarts\Tabs\TabsOnEdit;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Kraenkvisuell\NovaCms\Tabs\Seo;
use Illuminate\Support\Facades\Auth;
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
        return ucfirst(__('nova-cms::pages.pages'));
    }

    public static function singularLabel()
    {
        return ucfirst(__('nova-cms::pages.page'));
    }

    protected static function applyOrderings($query, array $orderings)
    {
        return parent::applyOrderings($query, ['is_home' => 'desc']);
    }

    public static function authorizedToViewAny(Request $request)
    {
        return Auth::user()->cms_role != 'artist';
    }

    public function fields(Request $request)
    {
        $tabs = [];

        $contentTab = [
            ContentBlock::field(),
        ];

        $settingsTab = [
            Text::make(ucfirst(__('nova-cms::pages.page_title')), 'title')
                ->translatable(),

            Text::make(ucfirst(__('nova-cms::pages.slug')), 'slug')
                ->translatable()
                ->help(__('nova-cms::pages.slug_explanation')),

            Boolean::make(ucfirst(__('nova-cms::pages.is_home')), 'is_home'),

            Boolean::make(ucfirst(__('nova-cms::pages.published')), 'is_published'),
        ];

        if (config('nova-pages.has_bg_color')) {
            $settingsTab[] = Color::make(__('nova-cms::pages.bg_color'), 'bg_color')
            ->sketch()
            ->hideFromDetail();
        }

        if (config('nova-cms.pages.types')) {
            $settingsTab[] = Select::make(__('nova-cms::pages.page_type'), 'page_type')
            ->options(config('nova-cms.pages.types'))
            ->hideFromDetail();
        }

        if ($request->resourceId === null) {
            $tabs[__('nova-cms::settings.settings')] = $settingsTab;
            $tabs[__('nova-cms::pages.content')] = $contentTab;
        } else {
            $tabs[__('nova-cms::pages.content')] = $contentTab;
            $tabs[__('nova-cms::settings.settings')] = $settingsTab;
        }

        $tabs[__('nova-cms::seo.seo')] = Seo::make();

        return [
            (new Tabs(__('nova-cms::pages.page'), $tabs))->withToolbar(),
        ];
    }
}
