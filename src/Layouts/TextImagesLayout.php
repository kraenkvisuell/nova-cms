<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Boolean;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Images;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\EditorText;
use Kraenkvisuell\NovaCms\Fields\BottomLinks;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Kraenkvisuell\NovaCms\Fields\ImagePosition;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;

class TextImagesLayout extends Layout
{
    protected $name = 'text-images';

    public function title()
    {
        return __('nova-cms::content_blocks.text_and_image_s');
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
            ImagePosition::make(),
            EditorText::make(),
            Images::make()->stacked(),
        ]);

        if (config('nova-cms.content.with_bottom_links')) {
            $fields[] = BottomLinks::make()->stacked();
        }

        $fields[] = Anchor::make();

        return $fields;
    }
}
