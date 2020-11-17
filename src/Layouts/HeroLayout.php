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
        $fields = [
            Topline::make(),
            Headline::make(),

            Tiptap::make(__('text'), 'text')
                ->buttons([
                    'bold',
                    'italic',
                    'link',
                ])
                ->translatable(),

            Text::make(__('main button link'), 'main_button_link'),

            Text::make(__('main button text'), 'main_button_text')
                ->translatable(),

            Text::make(__('secondary button link'), 'secondary_button_link'),

            Text::make(__('secondary button text'), 'secondary_button_text')
                    ->translatable(),

            HeroSlides::make()->collapsed()->stacked(),
        ];

        if (config('nova-cms.hero.slides_can_be_resized_in_percent')) {
            $fields[] = Number::make(__('resize slides by (percent)'), 'resize')
                              ->help(__('plus or minus in percent'));
        }

        return $fields;
    }
}
