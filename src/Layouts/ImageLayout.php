<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Caption;
use Kraenkvisuell\NovaCms\Fields\ContentPosition;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Subcaption;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class ImageLayout extends Layout
{
    protected $name = 'image';

    public function title()
    {
        return __('nova-cms::content_blocks.image');
    }

    public function fields()
    {
        $fields = [
            Hide::make(),
        ];

        if (config('nova-cms.content.with_toplines')) {
            $fields[] = Topline::make();
        }

        $fields[] = Headline::make();

        $imageField = MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
            ->types(['Image'])
            ->stacked();

        if (config('nova-cms.content.media.upload_only')) {
            $imageField->uploadOnly();
        }

        $fields[] = $imageField;

        $fields[] = Caption::make();

        if (config('nova-cms.content.with_subcaptions')) {
            $fields[] = Subcaption::make();
        }

        if (
            config('nova-cms.content.images.orientations')
            && is_array(config('nova-cms.content.images.orientations'))
        ) {
            $fields[] = Select::make(__('nova-cms::content_blocks.orientation'), 'orientation')
                ->options(config('nova-cms.content.images.orientations'));
        }

        if (
            config('nova-cms.content.images.width')
            && is_array(config('nova-cms.content.images.width'))
        ) {
            $fields[] = Select::make(__('nova-cms::content_blocks.image_width'), 'width')
                ->options(config('nova-cms.content.images.width'));
        }

        if (config('nova-cms.content.content_positions')) {
            $fields[] = ContentPosition::make();
        }

        $fields[] = Text::make(__('nova-cms::content_blocks.credits'), 'credits');

        return $fields;
    }
}
