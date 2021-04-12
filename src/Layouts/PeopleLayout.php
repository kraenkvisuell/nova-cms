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

class PeopleLayout extends Layout
{
    protected $name = 'people';

    public function title()
    {
        return __('nova-cms::content_blocks.people');
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
            Blocks::make(__('nova-cms::content_blocks.people'), 'people')
                ->addLayout(__('nova-cms::content_blocks.person'), 'person', [
                    Text::make(__('nova-cms::content_blocks.name'), 'name')
                        ->stacked(),
                    
                    Text::make(__('nova-cms::content_blocks.role'), 'role')
                        ->translatable()
                        ->stacked(),

                    MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
                        ->types(['Image'])
                        ->stacked(),

                    Tiptap::make(__('nova-cms::content_blocks.description'), 'description')
                        ->buttons([
                            'bold',
                            'italic',
                            'link',
                            'bullet_list',
                        ])
                        ->translatable()
                        ->stacked(),
                    
                ])
                ->button(__('nova-cms::content_blocks.add_attribute', ['attribute' => __('nova-cms::content_blocks.person')]))
                ->useAsTitle(['person' => 'name'])
                ->collapsed(),
            Anchor::make(),
        ]);
    }
}
