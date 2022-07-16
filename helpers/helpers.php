<?php

use Illuminate\Support\Facades\Cache;
use Kraenkvisuell\NovaCms\Facades\ContentParser;
use Kraenkvisuell\NovaCms\Facades\MenuMaker;
use Kraenkvisuell\NovaCmsMedia\API;

function nova_cms_menu($slug)
{
    return MenuMaker::make($slug);
}

function nova_cms_empty_image()
{
    return 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
}

function nova_cms_mime($id)
{
    return Cache::rememberForever(
        'nova_cms_mime.'.$id,
        function () use ($id) {
            return API::getMime($id);
        }
    );
}

function nova_cms_ratio($id)
{
    return Cache::rememberForever(
        'nova_cms_ratio.'.$id,
        function () use ($id) {
            return API::getRatio($id);
        }
    );
}

function nova_cms_extension($id)
{
    return API::getExtension($id);
}

function nova_cms_image($id, $imgSize = null, $forceGifResize = false)
{
    return Cache::rememberForever(
        'nova_cms_image.'.$id.'.'.$imgSize.'.'.$forceGifResize,

        function () use ($id, $imgSize, $forceGifResize) {
            if (! $forceGifResize) {
                $imgSize = nova_cms_extension($id) == 'gif' ? null : $imgSize;
            }

            return API::getFiles($id, $imgSize, false);
        }
    );
}

function nova_cms_file($id)
{
    return Cache::rememberForever(
        'nova_cms_file.'.$id,
        function () use ($id) {
            return API::getFiles($id);
        }
    );
}

function nova_cms_link_url($link)
{
    if ($link->link_url) {
        return nova_cms_parse_link($link->link_url);
    }

    if ($link->file) {
        return nova_cms_file($link->file);
    }

    return '#';
}

function nova_cms_link_is_file($link)
{
    if ($link->link_url) {
        return false;
    }

    if ($link->file) {
        return true;
    }

    return false;
}

function nova_cms_link_is_external($link)
{
    if ($link->link_url && strpos(nova_cms_parse_link($link->link_url), '://') > 0) {
        return true;
    }

    return false;
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

    return 'https://'.$link;
}

function nova_cms_setting($slug)
{
    return Cache::remember(
        'nova_cms_setting.'.$slug.'.'.app()->getLocale(),
        now()->addSeconds(10),
        function () use ($slug) {
            $setting = nova_get_setting($slug);

            $jsonCheck = json_decode($setting);

            if (is_object($jsonCheck) && property_exists($jsonCheck, app()->getLocale())) {
                if (! $jsonCheck->{app()->getLocale()}) {
                    if (property_exists($jsonCheck, config('translatable.fallback_locale'))) {
                        return $jsonCheck->{config('translatable.fallback_locale')};
                    }
                }

                return $jsonCheck->{app()->getLocale()};
            }

            return ContentParser::produceAttribute($setting);
        }
    );
}

function nova_cms_currently_on_home()
{
    if (request()->path() == '/') {
        return true;
    }

    return false;
}

function nova_cms_magify_links($str, $open_urls_in_new_tab = false)
{
    $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
    if (preg_match_all("/$regexp/siU", $str, $matches)) {
        foreach ($matches[2] as $url) {
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

function nova_cms_obfuscate_emails($str)
{
    $regex = "[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})";
    if (preg_match_all("/$regex/siU", $str, $matches)) {
        foreach ($matches[0] as $email) {
            $obfuscatedEmail = '<span obfuscated-email>'.base64_encode($email).'</span>';
            $str = str_replace($email, $obfuscatedEmail, $str);
        }
    }

    return $str;
}

function nova_cms_anonymize_embed_code($str)
{
    $regex = '<iframe.*src=\"(.*)\".*><\/iframe>';
    if (preg_match_all("/$regex/siU", $str, $matches)) {
        foreach ($matches[1] as $src) {
            $newSrc = $src;
            if (stristr($src, 'vimeo') && ! stristr($src, 'dnt=1')) {
                if (stristr($src, '?')) {
                    $newSrc .= '&';
                } else {
                    $newSrc .= '?';
                }
                $newSrc .= 'dnt=1';

                $str = str_replace($src, $newSrc, $str);
            }

            if (stristr($src, 'youtube.com')) {
                $str = str_replace('youtube.com', 'youtube-nocookie.com', $str);
            }
        }
    }

    return $str;
}
