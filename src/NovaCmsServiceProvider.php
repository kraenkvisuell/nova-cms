<?php

namespace Kraenkvisuell\NovaCms;

use Laravel\Nova\Nova;
use Kraenkvisuell\NovaCms\Nova\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\NovaCms\Console\Init;
use Kraenkvisuell\NovaCms\Console\InitPages;
use Kraenkvisuell\NovaCms\Observers\PageObserver;
use Kraenkvisuell\NovaCms\Console\CreateFirstUser;
use Kraenkvisuell\NovaCms\Models\Page as PageModel;
use Kraenkvisuell\NovaCms\Console\RemoveExampleViews;
use Kraenkvisuell\NovaCms\Console\PublishExampleViews;

class NovaCmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views/components', 'nova-cms');

        $this->publishes([
            __DIR__ . '/../resources/views/components' => resource_path('views/vendor/nova-cms'),
        ], 'nova-cms-views');

        $this->publishes([
            __DIR__ . '/../config/nova-cms.php' => config_path('nova-cms.php'),
        ], 'nova-cms-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/nova-pages'),
        ], 'nova-pages-views');

        $this->publishes([
            __DIR__ . '/../config/nova-pages.php' => config_path('nova-pages.php'),
        ], 'nova-pages-config');

        Blade::component('nova-cms::layout.layout', 'cms.layout');
        Blade::component('nova-cms::parts.navi', 'cms.navi');

        Nova::tools([
            new \OptimistDigital\MenuBuilder\MenuBuilder,
        ]);

        Nova::resources([
            Page::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                Init::class,
                InitPages::class,
                CreateFirstUser::class,
                RemoveExampleViews::class,
                PublishExampleViews::class,
            ]);
        }

        PageModel::observe(PageObserver::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/nova-cms.php',
            'nova-cms'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../config/nova-pages.php',
            'nova-pages'
        );
    }
}
