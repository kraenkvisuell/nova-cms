<?php

namespace Kraenkvisuell\NovaCms\Traits;

use Kraenkvisuell\NovaCms\Facades\ContentParser;

trait HasContentBlocks
{
    public function contentBlocks($field = null)
    {
        if (!$field) {
            $field = $this->contentBlockFields[0] ?? 'content';
        }

        $contentBlocks = collect([]);

        $this->{$field}->each(function ($item) use (&$contentBlocks) {
            $contentBlocks->push(
                (object) [
                    'block' => $item->name(),
                    'field' => ContentParser::produceAttributes($item->getAttributes()),
                ]
            );
        });

        return $contentBlocks;
    }
}
