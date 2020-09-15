<?php

namespace Kraenkvisuell\NovaCms\Linkable;

use OptimistDigital\MenuBuilder\Classes\MenuLinkable;

class LinkablePage extends MenuLinkable
{
    public static function getIdentifier(): string
    {
        return 'page';
    }

    public static function getName(): string
    {
        return 'Link zu Seite';
    }

    public static function getOptions($locale): array
    {
        if (class_exists('\Kraenkvisuell\NovaCms\Models\Page')) {
            $list = [];
            \Kraenkvisuell\NovaCms\Models\Page::all()
                ->each(function ($page) use (&$list) {
                    $list[$page->id] = $page->title;
                });

            return $list;
        }

        return [];
    }

    public static function getDisplayValue($value = null, array $parameters = null)
    {
        // Example usecase
        // return 'Page: ' . Page::find($value)->name;
        return \Kraenkvisuell\NovaCms\Models\Page::find($value)->title;
    }

    public static function getValue($value = null, array $parameters = null)
    {
        // Example usecase
        // return Page::find($value);
        return \Kraenkvisuell\NovaCms\Models\Page::find($value);
    }
}
