<?php

use ClassicO\NovaMediaLibrary\API;
use Kraenkvisuell\NovaCms\Facades\MenuMaker;
use Kraenkvisuell\NovaCms\Facades\ContentParser;

function nova_cms_menu($slug)
{
    return MenuMaker::make($slug);
}

function nova_cms_image($id, $imgSize = null)
{
    return API::getFiles($id, $imgSize, false);
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

    $setting = ContentParser::produceAttribute($setting);

    return $setting;
}
