<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\BottomLinks;
use Kraenkvisuell\NovaCms\Fields\EditorText;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextLayout extends Layout
{
    protected $name = 'text';

    public function title()
    {
        return __('text');
    }

    public function fields()
    {
        $fields = [];

        if (config('nova-cms.with_toplines')) {
            $fields[] = Topline::make();
        }

        return array_merge($fields, [
            Headline::make(),
            EditorText::make(),
            BottomLinks::make()->stacked(),
            Anchor::make(),
        ]);
    }
}
