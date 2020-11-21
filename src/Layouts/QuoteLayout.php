<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Images;
use Kraenkvisuell\NovaCms\Fields\BottomLinks;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class QuoteLayout extends Layout
{
    protected $name = 'quote';

    public function title()
    {
        return __('quote');
    }

    public function fields()
    {
        return [
            Hide::make(),
            Textarea::make(__('quote'), 'quote')
                ->translatable(),

            Images::make()->stacked(),
            BottomLinks::make()->stacked(),
            Anchor::make(),
        ];
    }
}
