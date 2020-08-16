<?php

namespace Kraenkvisuell\NovaCms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class NovaCmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views/components', 'nova-layout');

        Blade::component('nova-layout::layout', 'layout');
    }

    public function register()
    {
        //
    }
}
