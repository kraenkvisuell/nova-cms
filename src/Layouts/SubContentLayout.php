<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\SubContentBlocks;
use Laravel\Nova\Fields\Text;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class SubContentLayout extends Layout
{
    protected $name = 'sub-content';

    public function title()
    {
        return __('sub content');
    }

    public function fields()
    {
        return [
            Topline::make(),
            Headline::make(),
            Text::make(__('navigation headline (optional)'), 'navi_headline'),
            Anchor::make(),
            SubContentBlocks::make()->collapsed()->stacked(),
        ];
    }
}
