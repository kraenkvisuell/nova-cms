<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Text;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;

class LinksLayout extends Layout
{
    protected $name = 'links';

    public function title()
    {
        return __('nova-cms::content_blocks.links');
    }

    public function fields()
    {
        $fields = [
            Hide::make(),
        ];

        if (config('nova-cms.content.with_toplines')) {
            $fields[] = Topline::make();
        }

        return array_merge($fields, [
            Headline::make(),
            
            Blocks::make(__('nova-cms::content_blocks.links'), 'links')
                ->addLayout(__('nova-cms::content_blocks.link'), 'link', [
                    Text::make(__('nova-cms::content_blocks.link_text'), 'link_text')
                        ->translatable(),

                    Text::make(__('nova-cms::content_blocks.link_url'), 'link_url')
                        ->translatable(),

                    MediaLibrary::make(__('nova-cms::content_blocks.download_file'), 'file'),
                ])
                ->button(
                    __('nova-cms::content_blocks.add_attribute', 
                    ['attribute' => __('nova-cms::content_blocks.link')])
                )
                ->useAsTitle(['link' => 'link_text'])
                ->collapsed(),
            Anchor::make(),
        ]);
    }
}
