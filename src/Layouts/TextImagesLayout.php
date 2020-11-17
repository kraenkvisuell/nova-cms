<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Images;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\BottomLinks;
use Kraenkvisuell\NovaCms\Fields\EditorText;
use Kraenkvisuell\NovaCms\Fields\ImagePosition;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextImagesLayout extends Layout
{
    protected $name = 'text-images';

    public function title()
    {
        return __('text and image(s)');
    }

    public function fields()
    {
        $fields = [];

        if (config('nova-cms.with_toplines')) {
            $fields[] = Topline::make();
        }

        return array_merge($fields, [
            Headline::make(),
            ImagePosition::make(),
            EditorText::make(),
            Images::make()->stacked(),
            BottomLinks::make()->stacked(),
            Anchor::make(),
        ]);
    }
}
