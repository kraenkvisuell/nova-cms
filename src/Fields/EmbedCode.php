<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Textarea;

class EmbedCode
{
    public static function make()
    {
        return Code::make(__('nova-cms::content_blocks.embed_code'), 'embed_code')
            ->stacked();
    }
}
