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

function nova_cms_file($id)
{
    return API::getFiles($id);
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

function nova_cms_currently_on_home()
{
    if(request()->path() == '/') {
        return true;
    }

    return false;
}

function nova_cms_magify_links($str, $open_urls_in_new_tab = false)
{
    $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
    if(preg_match_all("/$regexp/siU", $str, $matches)) {
        foreach($matches[2] as $url) {
            $url = trim($url);
            if (
                substr($url, 0, 1) != '/'
                && substr($url, 0, 1) != '['
                && substr($url, 0, 1) != '#'
                && substr($url, 0, 1) != '{'
                && substr($url, 0, 7) != 'http://'
                && substr($url, 0, 8) != 'https://'
                && substr($url, 0, 4) != 'ftp:'
                && substr($url, 0, 7) != 'mailto:'
            ) {
                $newUrl = 'http://'.$url;
                if ($open_urls_in_new_tab) {
                    $newUrl .= '" target="_blank';
                }
                $str = str_replace('"'.$url.'"', '"'.$newUrl.'"', $str);
            }

            if ($open_urls_in_new_tab && substr($url, 0, 4) == 'http') {
                $newUrl = $url.'" target="_blank';
                $str = str_replace('"'.$url.'"', '"'.$newUrl.'"', $str);
            }
        }
    }

    return $str;
}
