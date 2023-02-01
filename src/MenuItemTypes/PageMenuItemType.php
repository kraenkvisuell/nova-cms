<?php

namespace Kraenkvisuell\NovaCms\MenuItemTypes;

use Kraenkvisuell\NovaCms\Models\Page;
use OptimistDigital\MenuBuilder\MenuItemTypes\BaseMenuItemType;

class PageMenuItemType extends BaseMenuItemType
{
    public static function getIdentifier(): string
    {
        return 'page';
    }

    public static function getName(): string
    {
        return 'Seite';
    }

    public static function getType(): string
    {
        return 'select';
    }

    public static function getOptions($locale): array
    {
        if (class_exists('\Kraenkvisuell\NovaCms\Models\Page')) {
            $list = [];
            Page::all()
                ->each(function ($page) use (&$list) {
                    $list[$page->id] = $page->title;
                });

            return $list;
        }

        return [];
    }

    public static function getDisplayValue($value = null, array $data = null, $locale = 'de')
    {
        return Page::find($value)->title;
    }

    public static function getValue($value = null, array $data = null, $locale = 'de')
    {
        return Page::find($value);
    }

    public static function getFields(): array
    {
        return [];
    }

    public static function getRules(): array
    {
        return [];
    }

    public static function getData($data = null, array $parameters = null)
    {
        return $data;
    }
}
