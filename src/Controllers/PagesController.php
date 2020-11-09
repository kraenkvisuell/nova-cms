<?php

namespace Kraenkvisuell\NovaCms\Controllers;

use Kraenkvisuell\NovaCms\Models\Page;

class PagesController
{
    public function show()
    {
        $page = $this->getPageAndSetLocale(func_get_args());

        if (!$page) {
            abort(404);
        }

        return view('page')->with([
            'page' => $page,
        ]);
    }

    protected function getPageAndSetLocale($args)
    {
        // Check if is home page

        if (!$args) {
            return Page::where('is_home', true)->first();
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
            app()->setLocale($args[0]);
            return Page::where('is_home', true)->first();
        }

        // If isn't home page

        $locale = count($args) > 1 ? $args[0] : app()->getLocale();
        $slug = count($args) > 1 ? $args[1] : $args[0];

        if (count($args) > 1) {
            app()->setLocale($locale);
        }

        return Page::where('slug->' . $locale, $slug)->first();
    }
}
