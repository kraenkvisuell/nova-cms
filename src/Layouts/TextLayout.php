<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Text;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;

class TextLayout extends Layout
{
    protected $name = 'text';

    public function title()
    {
        return __('text');
    }

    public function fields()
    {
        return [
            Topline::make(),
            Headline::make(),
            Text::make(),
        ];
    }
}
