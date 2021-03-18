<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

if (
    !Request::is(substr(config('nova.path'), 1) . '*')
    && !Request::is('nova-api/*')
    && !Request::is('api/*')
    && !Request::is('draft/*')
) {
    
    Route::get(nova_cms_route_prefix().'/{locale}/{page}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page-multi');
    Route::get(nova_cms_route_prefix().'/', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page-single-home');
    Route::get(nova_cms_route_prefix().'/{page}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page-single');
}

function nova_cms_route_prefix()
{
    $prefix = trim(config('nova-cms.base_route_folder'));
    if (!$prefix) {
        return '';
    }

    if (substr($prefix, 0, 1) != '/') {
        $prefix = '/'.$prefix;
    }

    if (substr($prefix, (strlen($prefix) - 1), 1) == '/') {
        $prefix = substr($prefix, 0, (strlen($prefix) - 1));
    }

    return $prefix;
}
