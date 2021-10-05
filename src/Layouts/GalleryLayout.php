<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;

class GalleryLayout extends Layout
{
    protected $name = 'gallery';

    public function title()
    {
        return __('nova-cms::content_blocks.gallery');
    }

    public function fields()
    {
        $fields = [
            Hide::make(),
        ];

        if (config('nova-cms.content.with_collapsed_fields')) {
            $fields[] = Boolean::make(__('nova-cms::content_blocks.collapsed'), 'is_collapsed');
        }

        if (config('nova-cms.content.with_toplines')) {
            $fields[] = Topline::make();
        }

        $imageField = MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
            ->types(['Image'])
            ->stacked();

        if (config('nova-cms.content.media.upload_only')) {
            $imageField->uploadOnly();
        }

        $fileField = MediaLibrary::make(__('nova-cms::content_blocks.download_file'), 'file')
            ->stacked();

        if (config('nova-cms.content.media.upload_only')) {
            $fileField->uploadOnly();
        }

        return array_merge($fields, [
            Headline::make(),
            HeadlineLink::make(),
            Blocks::make(__('nova-cms::content_blocks.slides'), 'slides')
                ->addLayout(__('nova-cms::content_blocks.slide'), 'slide', [
                    $imageField,

                    Textarea::make(__('nova-cms::content_blocks.image_caption'), 'caption')
                        ->rows(2)
                        ->translatable()
                        ->stacked(),

                    $fileField,
                ])
                ->button(__('nova-cms::content_blocks.add_slide'))
                ->collapsed(),
            Anchor::make(),
        ]);
    }
}
