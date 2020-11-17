<?php

namespace Kraenkvisuell\NovaCms;

use Whitecube\NovaFlexibleContent\Flexible;

class ContentBlock
{
    public function field()
    {
        $field = Flexible::make(__('content blocks'), 'main_content')
            ->button('Block hinzufügen')
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
