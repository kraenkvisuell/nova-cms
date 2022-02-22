<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Models\Page;
use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

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

        $fileField = MediaLibrary::make(__('nova-cms::content_blocks.download_file'), 'file');

        if (config('nova-cms.content.media.upload_only')) {
            $fileField->uploadOnly();
        }

        return array_merge($fields, [
            Headline::make(),

            Blocks::make(__('nova-cms::content_blocks.links'), 'links')
                ->addLayout(__('nova-cms::content_blocks.link'), 'link', [
                    Text::make(__('nova-cms::content_blocks.link_text'), 'link_text')
                        ->translatable(),

                    Text::make(__('nova-cms::content_blocks.link_url'), 'link_url')
                        ->translatable(),

                    Select::make(__('nova-cms::content_blocks.link_page_id'), 'link_page_id')->options(function () {
                        return Page::pluck('slug', 'id');
                    }),

                    $fileField,
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
