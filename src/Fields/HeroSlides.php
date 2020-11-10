<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Laravel\Nova\Fields\Number;
use Whitecube\NovaFlexibleContent\Flexible;

class HeroSlides
{
    public static function make()
    {
        $fields = [
            MediaLibrary::make('Bild', 'image')
                ->types(['Image'])
                ->stacked(),

            Textarea::make(__('image caption'), 'caption')
                ->rows(2)
                ->translatable()
                ->stacked(),
        ];

        if (config('nova-cms.hero.slides_can_be_rotated')) {
            $fields[] = Number::make(__('slide rotation'), 'rotation')
                              ->help(__('in degrees (negative turns left)'));
        }

        if (config('nova-cms.hero.slides_can_be_moved_in_percent')) {
            $fields[] = Number::make(__('move slide to the right'), 'move_right')
                              ->help(__('in percent (negative moves to the left)'));
        }

        if (config('nova-cms.hero.slides_can_be_moved_in_percent')) {
            $fields[] = Number::make(__('move slide down'), 'move_down')
                              ->help(__('in percent (negative moves up)'));
        }

        return Flexible::make(__('slides'), 'slides')
            ->addLayout(__('slide'), 'slide', $fields)
            ->button(__('add slide'));
    }
}
