<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Text;

class EmbedUrl
{
    public static function make()
    {
        return Text::make(
            __('nova-cms::content_blocks.embed_url'), 
            'embed_url'
        );
    }
}
