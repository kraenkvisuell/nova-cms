<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\HeroSlides;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;
use Kraenkvisuell\NovaCms\Traits\HasLockableFields;

class HeroLayout extends Layout
{
    use HasLockableFields;

    protected $name = 'hero';

    public function title()
    {
        return __('nova-cms::content_blocks.hero').' '.__('nova-cms::content_blocks.hero_explanation');
    }

    public function fields()
    {
        $fields = [
            Hide::make(),
        ];

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
            $fields[] =  Tiptap::make(__('nova-cms::content_blocks.text'), 'text')
                ->buttons([
                    'bold',
                    'italic',
                    'link',
                ])
                ->translatable();
        }

        if (config('nova-cms.hero.has_button')) {
            $fields[] = Text::make(__('nova-cms::content_blocks.main_button_link'), 'main_button_link');

            $fields[] = Text::make(__('nova-cms::content_blocks.main_button_text'), 'main_button_text')
                ->translatable();
        }

        if (config('nova-cms.hero.has_secondary_button')) {
            $fields[] = Text::make(__('nova-cms::content_blocks.secondary_button_link'), 'secondary_button_link');

            $fields[] = Text::make(__('nova-cms::content_blocks.secondary_button_text'), 'secondary_button_text')
                ->translatable();
        }

        if ($this->userCanEditLayout(request()->user())) {
            $fields[] = HeroSlides::make()
            ->collapsed()
            ->stacked();

            if (config('nova-cms.hero.slides_can_be_resized_in_percent')) {
                $fields[] = Number::make(__('nova-cms::content_blocks.resize_slides_by_percent'), 'resize')
                                  ->help(__('nova-cms::content_blocks.plus_or_minus_in_percent'));
            }
        }

        return $fields;
    }
}
