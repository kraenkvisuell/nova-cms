<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
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
        $fields = [
            Hide::make(),
        ];
        
        if (config('nova-cms.content.with_collapsed_fields')) {
            $fields[] = Boolean::make(__('nova-cms::content_blocks.collapsed'), 'is_collapsed');
        }

        $fields = array_merge($fields, [
            Textarea::make(__('nova-cms::content_blocks.quote'), 'quote')
                ->translatable(),
            Text::make(__('nova-cms::content_blocks.author'), 'author')
                ->translatable(),
            Images::make()->stacked(),
        ]);

        if (config('nova-cms.content.with_bottom_links')) {
            $fields[] = BottomLinks::make()->stacked();
        }

        $fields[] = Anchor::make();

        return $fields;
    }
}
