<?php

use ClassicO\NovaMediaLibrary\API;
use Kraenkvisuell\NovaCms\Facades\MenuMaker;

function nova_cms_menu($slug)
{
    return MenuMaker::make($slug);
}

function nova_cms_image($id)
{
    return API::getFiles($id, null, false);
}

function nova_cms_parse_link($link)
{
    $link = trim($link);

    if (
        strpos($link, '://') > 0
        || substr($link, 0, 1) == '/'
        || substr($link, 0, 7) == 'mailto:'
    ) {
        return $link;
    }

    return 'https://' . $link;
}

function nova_cms_setting($slug)
{
    $setting = nova_get_setting($slug);

    if (is_array($setting)) {
        if (@$setting[app()->getLocale()]) {
            return $setting[app()->getLocale()];
        }

        if (@$setting[config('translatable.fallback_locale')]) {
            return $setting[config('translatable.fallback_locale')];
        }

        return collect($setting)->first();
    }

    return $setting;
}
