<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Kraenkvisuell\NovaCms\Facades\RoutesHelper;

Route::middleware(['web'])->group(function () {
    Route::post('/update-cookie-consent', 'Kraenkvisuell\NovaCms\Controllers\CookiesController@update')->name('update-cookies-consent');
});

if (
    ! Request::is(substr(config('nova.path'), 1).'*')
    && ! Request::is('nova-api/*')
    && ! Request::is('api/*')
    && ! Request::is('draft/*')
) {
    Route::get('/{locale}'.RoutesHelper::prefix().'/{page}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page-multi');
    Route::get(RoutesHelper::prefix().'/', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page-single-home');
    Route::get(RoutesHelper::prefix().'/{page}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page-single');
}
