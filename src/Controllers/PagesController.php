<?php

namespace Kraenkvisuell\NovaCms\Controllers;

use Kraenkvisuell\NovaCms\Models\Page;

class PagesController
{
    public function show()
    {
        $args = func_get_args();
        $page = null;

        // Check if is home page
        if (!$args) {
            $page = Page::where('is_home', true)->first();
        }

        // Check if is home page and locale is set
        if (
            count($args) == 1
            &&
            (
                is_array(config('nova-translatable.locales'))
                && array_key_exists($args[0], config('nova-translatable.locales'))
            )
        ) {
            $page = Page::where('is_home', true)->first();
            app()->setLocale($args[0]);
        }

        // If isn't home page
        if (!$page) {
            $locale = count($args) > 1 ? $args[0] : app()->getLocale();
            $slug = count($args) > 1 ? $args[1] : $args[0];

            if (count($args) > 1) {
                app()->setLocale($locale);
            }

            $page = Page::where('slug->' . $locale, $slug)->first();
        }

        return view('nova-pages::page')->with([
            'page' => $page,
        ]);
    }
}
