<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Textarea;
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
        return __('gallery');
    }

    public function fields()
    {
        $fields = [];

        if (config('nova-cms.with_toplines')) {
            $fields[] = Topline::make();
        }

        return array_merge($fields, [
            Headline::make(),
            Flexible::make(__('slides'), 'slides')
                ->addLayout(__('slide'), 'slide', [
                    MediaLibrary::make('Bild', 'image')
                        ->types(['Image'])
                        ->stacked(),

                    Textarea::make(__('image caption'), 'caption')
                        ->rows(2)
                        ->translatable()
                        ->stacked(),
                ])
                ->button(__('add slide'))
                ->collapsed(),
            Anchor::make(),
        ]);
    }
}
