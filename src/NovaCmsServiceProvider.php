<?php

namespace Kraenkvisuell\NovaCms;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\NovaCms\Console\Init;
use Kraenkvisuell\NovaCms\Console\RemoveExampleViews;
use Kraenkvisuell\NovaCms\Console\PublishExampleViews;

class NovaCmsServiceProvider extends ServiceProvider
{
    public function boot()
    {

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views/components', 'nova-cms');

        $this->publishes([
            __DIR__ . '/../resources/views/components' => resource_path('views/vendor/nova-cms'),
        ], 'nova-cms-views');

        $this->publishes([
            __DIR__ . '/../config/nova-cms.php' => config_path('nova-cms.php'),
        ], 'nova-cms-config');

        Blade::component('nova-cms::layout.layout', 'cms.layout');
        Blade::component('nova-cms::parts.navi', 'cms.navi');

        Nova::tools([
            new \OptimistDigital\MenuBuilder\MenuBuilder,
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                PublishExampleViews::class,
                RemoveExampleViews::class,
                Init::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/nova-cms.php',
            'nova-cms'
        );
    }
}
