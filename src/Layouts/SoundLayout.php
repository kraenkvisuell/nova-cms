<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Caption;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\EmbedCode;
use Kraenkvisuell\NovaCms\Fields\Subcaption;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;

class SoundLayout extends Layout
{
    protected $name = 'sound';

    public function title()
    {
        return __('nova-cms::content_blocks.sound');
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
        $fields[] = EmbedCode::make();
        $fields[] = MediaLibrary::make(__('nova-cms::content_blocks.file'), 'file')
                ->stacked();
        $fields[] = Caption::make();
        if (config('nova-cms.content.with_subcaptions')) {
            $fields[] = Subcaption::make();
        }
        $fields[] = Anchor::make();
        
        return $fields;
    }
}
