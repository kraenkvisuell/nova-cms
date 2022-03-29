<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Caption;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Ratios;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Manogi\Tiptap\Tiptap;

class GalleryLayout extends Layout
{
    protected $name = 'gallery';

    public function title()
    {
        return __('nova-cms::content_blocks.gallery');
    }

    public function fields()
    {
        $fields = [
            Hide::make(),
        ];

        if (config('nova-cms.content.with_collapsed_fields')) {
            $fields[] = Boolean::make(__('nova-cms::content_blocks.collapsed'), 'is_collapsed');
        }

        if (config('nova-cms.content.with_toplines')) {
            $fields[] = Topline::make();
        }

        if (is_array(config('nova-cms.content.images.ratios'))) {
            $fields[] = Ratios::make();
        }

        if (config('nova-cms.content.images.has_max_columns')) {
            $fields[] = Number::make(__('nova-cms::content_blocks.max_columns'), 'max_columns');
        }

        $imageField = MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
            ->types(['Image'])
            ->stacked();

        if (config('nova-cms.content.media.upload_only')) {
            $imageField->uploadOnly();
        }

        $fileField = MediaLibrary::make(__('nova-cms::content_blocks.download_file'), 'file')
            ->stacked();

        if (config('nova-cms.content.media.upload_only')) {
            $fileField->uploadOnly();
        }

        return array_merge($fields, [
            Headline::make(),
            HeadlineLink::make(),
            Blocks::make(__('nova-cms::content_blocks.slides'), 'slides')
                ->addLayout(__('nova-cms::content_blocks.slide'), 'slide', [
                    $imageField,

                    Text::make(__('nova-cms::content_blocks.link'), 'link'),

                    Boolean::make(__('nova-cms::content_blocks.open_link_in_new_tab'), 'open_link_in_new_tab')
                        ->default(false),

                    Caption::make(),

                    $fileField,
                ])
                ->button(__('nova-cms::content_blocks.add_slide'))
                ->collapsed(),
            Anchor::make(),
        ]);
    }
}
