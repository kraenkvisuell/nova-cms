<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Kraenkvisuell\NovaCms\Fields\HeroSlides;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class HeroLayout extends Layout
{
    protected $name = 'hero';

    public function title()
    {
        return __('hero').' '.__('hero explanation');
    }

    public function fields()
    {
        $fields = [];

        if (config('nova-cms.with_toplines')) {
            $fields[] = Topline::make();
        }

        if (config('nova-cms.hero.has_headline')) {
            $fields[] = Headline::make();
        }

        if (config('nova-cms.hero.has_topline')) {
            $fields[] = Topline::make();
        }

        if (config('nova-cms.hero.has_text')) {
            $fields[] =  Tiptap::make(__('text'), 'text')
                ->buttons([
                    'bold',
                    'italic',
                    'link',
                ])
                ->translatable();
        }

        if (config('nova-cms.hero.has_button')) {
            $fields[] = Text::make(__('main button link'), 'main_button_link');

            $fields[] = Text::make(__('main button text'), 'main_button_text')
                ->translatable();
        }

        if (config('nova-cms.hero.has_secondary_button')) {
            $fields[] = Text::make(__('secondary button link'), 'secondary_button_link');

            $fields[] = Text::make(__('secondary button text'), 'secondary_button_text')
                ->translatable();
        }

        $fields[] = HeroSlides::make()->collapsed()->stacked();

        if (config('nova-cms.hero.slides_can_be_resized_in_percent')) {
            $fields[] = Number::make(__('resize slides by (percent)'), 'resize')
                              ->help(__('plus or minus in percent'));
        }

        return $fields;
    }
}
