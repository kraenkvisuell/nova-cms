<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\EditorText;
use Kraenkvisuell\NovaCms\Fields\BottomLinks;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Laravel\Nova\Fields\Boolean;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;

class TextLayout extends Layout
{
    protected $name = 'text';

    public function title()
    {
        return __('nova-cms::content_blocks.text');
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

        $fields = array_merge($fields, [
            Headline::make(),
            HeadlineLink::make(),
            EditorText::make(),
            Boolean::make(__('nova-cms::content_blocks.center_text'), 'is_centered'),
        ]);

        if (config('nova-cms.content.with_bottom_links')) {
            $fields[] = BottomLinks::make()->stacked();
        }

        $fields[] = Anchor::make();

        return $fields;
    }
}
