<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

if (
    !Request::is(substr(config('nova.path'), 1) . '*')
    && !Request::is('nova-api/*')
    && !Request::is('api/*')
) {
    Route::get('/{locale}/{page}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page-multi');
    Route::get('/{page?}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page-single');
}
