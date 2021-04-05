<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Laravel\Nova\Fields\Number;
use Kraenkvisuell\NovaCmsBlocks\Blocks;

class HeroSlides
{
    public static function make()
    {
        $fields = [
            MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
                ->types(['Image'])
                ->stacked(),

            Textarea::make(__('nova-cms::content_blocks.image_caption'), 'caption')
                ->rows(2)
                ->translatable()
                ->stacked(),
        ];

        if (config('nova-cms.hero.single_slide_can_be_resized_in_percent')) {
            $fields[] = Number::make(__('nova-cms::content_blocks.resize_slide_by_percent'), 'resize')
                              ->help(__('nova-cms::content_blocks.plus_or_minus_in_percent'));
        }

        if (config('nova-cms.hero.slides_can_be_rotated')) {
            $fields[] = Number::make(__('nova-cms::content_blocks.slide_rotation'), 'rotation')
                              ->help(__('nova-cms::content_blocks.in_degrees_negative_turns_left'));
        }

        if (config('nova-cms.hero.slides_can_be_moved_in_percent')) {
            $fields[] = Number::make(__('nova-cms::content_blocks.move_slide_to_the_right'), 'move_right')
                              ->help(__('nova-cms::content_blocks.in_percent_negative_moves_to_the_left'));
        }

        if (config('nova-cms.hero.slides_can_be_moved_in_percent')) {
            $fields[] = Number::make(__('nova-cms::content_blocks.move_slide_down'), 'move_down')
                              ->help(__('nova-cms::content_blocks.in_percent_negative_moves_up'));
        }

        return Blocks::make(__('nova-cms::content_blocks.slides'), 'slides')
            ->addLayout(__('nova-cms::content_blocks.slide'), 'slide', $fields)
            ->button(__('nova-cms::content_blocks.add_slide'));
    }
}
