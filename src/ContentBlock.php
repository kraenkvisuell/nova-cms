<?php

namespace Kraenkvisuell\NovaCms;

use Whitecube\NovaFlexibleContent\Flexible;

class ContentBlock
{
    public function field()
    {
        $field = Flexible::make(__('nova-cms::content_blocks.content_blocks'), 'main_content')
            ->button(__('nova-cms::content_blocks.add_content_block'))
            ->collapsed()
            ->stacked();

        foreach (config('nova-cms.content-blocks.default') as $layout) {
            // Add full class path when short form is used
            if (!stristr($layout, '\\')) {
                $layout = '\Kraenkvisuell\NovaCms\Layouts\\'.$layout.'Layout';
            }

            $field->addLayout($layout);
        }

        return $field;
    }
}
