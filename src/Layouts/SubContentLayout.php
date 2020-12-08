<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Text;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Kraenkvisuell\NovaCms\Fields\SubContentBlocks;

class SubContentLayout extends Layout
{
    protected $name = 'sub-content';

    public function title()
    {
        return __('nova-cms::content_blocks.sub_content');
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
            Text::make(__('nova-cms::content_blocks.navigation_headline').' ('.__('nova-cms::content_blocks.optional').')', 'navi_headline'),
            SubContentBlocks::make()->collapsed()->stacked(),
            Anchor::make(),
        ]);
    }
}
