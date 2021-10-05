<?php

namespace Kraenkvisuell\NovaCms;

class MenuMaker
{
    public function make($slug, $onlyActive = true)
    {
        $menu = collect(
            is_array(nova_get_menu_by_slug($slug)) ? nova_get_menu_by_slug($slug)['menuItems'] : []
        )
        ->filter(function ($item) use ($onlyActive) {
            return $onlyActive ? $item['enabled'] : true;
        })
        ->map(function ($item) use ($onlyActive) {
            return $this->createMenuItem($item, $onlyActive);
        });

        return $menu;
    }

    protected function createMenuItem($item, $onlyActive)
    {
        $children = $item['children'] ? collect($item['children'])
            ->filter(function ($item) use ($onlyActive) {
                return $onlyActive ? $item['enabled'] : true;
            })
            ->map(function ($item) use ($onlyActive) {
                return $this->createMenuItem($item, $onlyActive);
            }) : [];
        
        $isCurrent = $item['value'] && $item['type'] == 'page'
            ? ($item['value']->url() == url()->current())
            : false;
        
        return (object) [
            'url' => ($item['value'] && $item['type'] == 'page') ? $item['value']->url() : $item['value'],
            'title' => $item['name'],
            'type' => $item['type'],
            'target' => $item['target'],
            'isCurrent' => $isCurrent,
            'children' => $children,
        ];
    }
}
