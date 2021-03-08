<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

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

        if (config('nova-cms.with_toplines')) {
            $fields[] = Topline::make();
        }

        return array_merge($fields, [
            Headline::make(),
            Flexible::make(__('nova-cms::content_blocks.slides'), 'slides')
                ->addLayout(__('nova-cms::content_blocks.slide'), 'slide', [
                    MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
                        ->types(['Image'])
                        ->stacked(),

                    Textarea::make(__('nova-cms::content_blocks.image_caption'), 'caption')
                        ->rows(2)
                        ->translatable()
                        ->stacked(),

                    MediaLibrary::make(__('nova-cms::content_blocks.download_file'), 'file')
                        ->stacked(),
                ])
                ->button(__('nova-cms::content_blocks.add_slide'))
                ->collapsed(),
            Anchor::make(),
        ]);
    }
}
