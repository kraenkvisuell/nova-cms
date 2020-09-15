<?php
if (!Request::is(substr(config('nova.path'), 1) . '*')) {
    Route::get('/{locale?}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page');
    Route::get('/page/{slug}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page');
    Route::get('/{locale}/page/{slug}', 'Kraenkvisuell\NovaCms\Controllers\PagesController@show')->name('nova-page');
}
