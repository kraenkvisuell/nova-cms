<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Caption;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\EmbedUrl;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\EmbedCode;
use Kraenkvisuell\NovaCms\Fields\Subcaption;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;
use Kraenkvisuell\NovaCms\Fields\ContentPosition;

class VideoLayout extends Layout
{
    protected $name = 'video';

    public function title()
    {
        return __('nova-cms::content_blocks.video');
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
        $fields[] = HeadlineLink::make();
        $fields[] = EmbedUrl::make();
        $fields[] = EmbedCode::make();

        if (config('nova-cms.content.video_with_file')) {
            $fields[] = MediaLibrary::make(__('nova-cms::content_blocks.file'), 'file')
                ->stacked();
        }

        $fields[] = Caption::make();

        if (config('nova-cms.content.with_subcaptions')) {
            $fields[] = Subcaption::make();
        }

        if (config('nova-cms.content.content_positions')) {
            $fields[] = ContentPosition::make();
        }

        $fields[] = Anchor::make();

        return $fields;
    }
}
