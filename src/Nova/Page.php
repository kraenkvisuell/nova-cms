<?php

namespace Kraenkvisuell\NovaCms\Nova;

use Illuminate\Http\Request;
use Kraenkvisuell\NovaCms\Facades\ContentBlock;
use Kraenkvisuell\NovaCms\Tabs\Seo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Timothyasp\Color\Color;

class Page extends \App\Nova\Resource
{
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

    public function fields(NovaRequest $request)
    {
        return [
            Text::make(__('nova-cms::pages.page_title'), 'title')
                ->translatable(),

        ];

        $fields = [
            ContentBlock::field(),

            Text::make(__('nova-cms::pages.page_title'), 'title')
                ->translatable(),

            Text::make(__('nova-cms::pages.slug'), 'slug')
                ->translatable()
                ->help(__('nova-cms::pages.slug_explanation')),

            Boolean::make(__('nova-cms::pages.is_home'), 'is_home'),

            Boolean::make(__('nova-cms::pages.published'), 'is_published'),
        ];

        if (config('nova-pages.has_bg_color')) {
            $fields[] = Color::make(__('nova-cms::pages.bg_color'), 'bg_color')
            ->sketch()
            ->hideFromDetail();
        }

        if (config('nova-cms.pages.types')) {
            $fields[] = Select::make(__('nova-cms::pages.page_type'), 'page_type')
            ->options(config('nova-cms.pages.types'))
            ->hideFromDetail();
        }

        // $fields[] = Seo::make();

        return $fields;
    }
}
