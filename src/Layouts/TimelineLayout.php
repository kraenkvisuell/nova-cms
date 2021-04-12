<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;
use Laravel\Nova\Fields\Textarea;

class TimelineLayout extends Layout
{
    protected $name = 'timeline';

    public function title()
    {
        return __('nova-cms::content_blocks.timeline');
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

        return array_merge($fields, [
            Headline::make(),
            HeadlineLink::make(),
            Blocks::make(__('nova-cms::content_blocks.timeline'), 'timeline')
                ->addLayout(__('nova-cms::content_blocks.entry'), 'entry', [
                    Text::make(__('nova-cms::content_blocks.date'), 'date')
                        ->stacked(),

                    Text::make(__('nova-cms::content_blocks.headline'), 'headline')
                        ->translatable()
                        ->stacked(),
                    
                    Tiptap::make(__('nova-cms::content_blocks.text'), 'text')
                        ->buttons([
                            'bold',
                            'italic',
                            'link',
                            'bullet_list',
                        ])
                        ->translatable()
                        ->stacked(),
                    
                ])
                ->button(__('nova-cms::content_blocks.add_attribute', ['attribute' => __('nova-cms::content_blocks.entry')]))
                ->useAsTitle(['entry' => 'date'])
                ->collapsed(),
            Anchor::make(),
        ]);
    }
}
