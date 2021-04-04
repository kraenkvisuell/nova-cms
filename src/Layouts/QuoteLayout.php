<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Images;
use Kraenkvisuell\NovaCms\Fields\BottomLinks;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;

class QuoteLayout extends Layout
{
    protected $name = 'quote';

    public function title()
    {
        return __('nova-cms::content_blocks.quote');
    }

    public function fields()
    {
        return [
            Hide::make(),
            Textarea::make(__('nova-cms::content_blocks.quote'), 'quote')
                ->translatable(),
            Text::make(__('nova-cms::content_blocks.author'), 'author')
                ->translatable(),
            Images::make()->stacked(),
            BottomLinks::make()->stacked(),
            Anchor::make(),
        ];
    }
}
