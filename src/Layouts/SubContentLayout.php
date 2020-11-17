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
        $fields = [];

        if (config('nova-cms.with_toplines')) {
            $fields[] = Topline::make();
        }

        return array_merge($fields, [
            Headline::make(),
            Text::make(__('navigation headline (optional)'), 'navi_headline'),
            SubContentBlocks::make()->collapsed()->stacked(),
            Anchor::make(),
        ]);
    }
}
