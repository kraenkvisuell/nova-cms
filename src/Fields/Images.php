<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;

class Images
{
    public static function make()
    {
        $imageField = MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
            ->types(['Image'])
            ->stacked();

        if (config('nova-cms.content.media.upload_only')) {
            $imageField->uploadOnly();
        }

        $fields = [
            $imageField,

            Textarea::make(__('nova-cms::content_blocks.image_caption'), 'caption')
                ->rows(2)
                ->translatable()
                ->stacked(),

            Textarea::make(__('nova-cms::content_blocks.credits'), 'credits')
                ->rows(2)
                ->translatable()
                ->stacked(),
        ];

        $fileField = MediaLibrary::make(__('nova-cms::content_blocks.download_file'), 'file')
            ->stacked();

        if (config('nova-cms.content.media.upload_only')) {
            $fileField->uploadOnly();
        }

        $fields[] = $fileField;

        if (config('nova-cms.images.images_can_be_rotated')) {
            $fields[] = Number::make(__('nova-cms::content_blocks.image_rotation'), 'rotation')
                              ->help(__('nova-cms::content_blocks.in degrees_negative_turns_left'));
        }

        if (config('nova-cms.images.images_can_be_moved_in_percent')) {
            $fields[] = Number::make(__('nova-cms::content_blocks.move_image_to_the_right'), 'move_right')
                              ->help(__('nova-cms::content_blocks.in_percent_negative_moves_to_the_left'));
        }

        if (config('nova-cms.images.images_can_be_moved_in_percent')) {
            $fields[] = Number::make(__('nova-cms::content_blocks.move_image_down'), 'move_down')
                              ->help(__('nova-cms::content_blocks.in_percent_negative_moves_up'));
        }

        return Blocks::make(__('nova-cms::content_blocks.images'), 'images')
            ->addLayout(__('nova-cms::content_blocks.image'), 'image', $fields)
            ->button(__('nova-cms::content_blocks.add_image'))
            ->collapsed();
    }
}
