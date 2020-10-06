<?php

namespace Kraenkvisuell\NovaCms;

use Laravel\Nova\Nova;
use Kraenkvisuell\NovaCms\Nova\Page;
use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\NovaCms\Console\Init;
use Kraenkvisuell\NovaCms\Console\InitPages;
use OptimistDigital\MenuBuilder\MenuBuilder;
use ClassicO\NovaMediaLibrary\NovaMediaLibrary;
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

        $this->loadViewsFrom(__DIR__ . '/../resources/views/'.config('nova-cms.theme'), 'cms');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/nova-cms'),
        ], 'nova-cms-views');

        $this->publishes([
            __DIR__ . '/../config/nova-cms.php' => config_path('nova-cms.php'),
        ], 'nova-cms-config');



        $this->publishes([
            __DIR__ . '/../config/nova-pages.php' => config_path('nova-pages.php'),
        ], 'nova-pages-config');

        Nova::tools([
            new MenuBuilder,
            new NovaMediaLibrary,
        ]);

        config(['nova-menu.locales' => config('translatable.locales')]);

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

        $this->mergeConfigFrom(
            __DIR__ . '/../config/nova-menu.php',
            'nova-menu'
        );
    }
}
