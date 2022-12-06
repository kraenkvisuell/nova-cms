<?php

namespace Kraenkvisuell\NovaCms;

use Kraenkvisuell\NovaCmsBlocks\Blocks;

class ContentBlock
{
    public function field($title = null, $slug = null, $config = 'default')
    {
        $title = $title ?: __('nova-cms::content_blocks.content_blocks');
        $slug = $slug ?: 'main_content';

        $field = Blocks::make($title, $slug)
            ->button(__('nova-cms::content_blocks.add_content_block'))
            ->collapsed()
            ->useAsTitle([
                'gallery' => 'headline',
                'image' => [
                    'key' => 'image',
                    'usePreview' => true,
                ],
                'hero' => 'headline',
                'people' => 'headline',
                'quote' => 'quote',
                'sub_content' => 'headline',
                'text_images' => 'headline',
                'text' => 'headline',
                'timeline' => 'headline',
                'video' => 'headline',
            ])
            ->stacked();

        foreach (config('nova-cms.content-blocks.'.$config) as $layout) {
            // Add full class path when short form is used
            
            if ($layout) {
                if (!stristr($layout, '\\')) {
                    $layout = '\Kraenkvisuell\NovaCms\Layouts\\'.$layout.'Layout';
                }
                
                try {
                    $field->addLayout($layout);
                } catch (\Throwable $th) {
                    //ray($th);
                }
                
            }
            
        }

        return $field;
    }
}
