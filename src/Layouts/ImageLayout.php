<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Text;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Caption;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\EmbedCode;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Kraenkvisuell\NovaCms\Fields\Subcaption;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;

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

        $fields[] = MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
            ->types(['Image'])
            ->stacked();
            
        $fields[] = Caption::make();
        
        if (config('nova-cms.content.with_subcaptions')) {
            $fields[] = Subcaption::make();
        }

        $fields[] = Text::make(__('nova-cms::content_blocks.credits'), 'credits');

        return $fields;
    }
}
