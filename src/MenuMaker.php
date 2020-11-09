<?php

namespace Kraenkvisuell\NovaCms;

class MenuMaker
{
    public function make($slug)
    {
        $menu = collect(
            is_array(nova_get_menu_by_slug($slug)) ? nova_get_menu_by_slug($slug)['menuItems'] : []
        )
        ->map(function ($item) {
            return (object)[
                'url' => $item['value']->url(),
                'title' => $item['name'],
                'isCurrent' => $item['value']->url() == url()->current(),
            ];
        });

        return $menu;
    }
}
