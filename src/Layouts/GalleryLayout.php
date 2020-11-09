<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Whitecube\NovaFlexibleContent\Flexible;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Laravel\Nova\Fields\Textarea;

class GalleryLayout extends Layout
{
    protected $name = 'gallery';

    public function title()
    {
        return __('gallery');
    }

    public function fields()
    {
        return [
            Topline::make(),
            Headline::make(),
            Flexible::make(__('slides'), 'slides')
                ->addLayout(__('slide'), 'slide', [
                    Textarea::make(__('image caption'), 'caption')->stacked(),
                ])
                ->button(__('add slide'))
                ->collapsed(),
        ];
    }
}
