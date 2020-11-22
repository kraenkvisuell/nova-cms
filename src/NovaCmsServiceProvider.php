<?php

namespace Kraenkvisuell\NovaCms;

use Laravel\Nova\Nova;
use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Text;
use Kraenkvisuell\NovaCms\Nova\Page;
use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\NovaCms\Console\Init;
use Kraenkvisuell\NovaCms\Console\UseTheme;
use Kraenkvisuell\NovaCms\Console\InitPages;
use OptimistDigital\NovaSettings\NovaSettings;
use Kraenkvisuell\NovaCms\Observers\PageObserver;
use Kraenkvisuell\NovaCms\Console\CopyConfigFiles;
use Kraenkvisuell\NovaCms\Console\CreateFirstUser;
use Kraenkvisuell\NovaCms\Models\Page as PageModel;
use Kraenkvisuell\NovaCms\Console\CopyLanguageFiles;
use Kraenkvisuell\NovaCms\Console\CopyMigrationFiles;
use Kraenkvisuell\NovaCms\Console\RemoveExampleViews;
use Kraenkvisuell\NovaCms\Console\PublishExampleViews;
use Kraenkvisuell\NovaCms\Console\SafelyReplacePackageJson;
use Kraenkvisuell\NovaCms\Console\SafelyReplaceWebpackMix;

class NovaCmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $viewPaths = is_array(config('view.paths')) ? config('view.paths') : [];
        if (!in_array(resource_path('themes/active/views'), $viewPaths)) {
            $viewPaths[] = resource_path('themes/active/views');
        }

        config(['view.paths' => $viewPaths]);

        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang/nova-cms', 'nova-cms');

        $this->publishes([
            __DIR__.'/../resources/lang/nova-cms' => resource_path('lang/vendor/nova-cms'),
        ]);

        $this->loadJsonTranslationsFrom(__DIR__.'/../vendor/coderello/laravel-nova-lang/resources/lang');

        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang/nova-cms');
        $this->loadJsonTranslationsFrom(resource_path('lang/vendor/nova-cms'));

        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang/nova-menu-builder');
        $this->loadJsonTranslationsFrom(resource_path('lang/vendor/nova-menu-builder'));

        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang/nova-settings');
        $this->loadJsonTranslationsFrom(resource_path('lang/vendor/nova-settings'));

        $this->loadJsonTranslationsFrom(__DIR__.'/../vendor/laravel-lang/json');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views/live', 'nova-cms');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->publishes([
            __DIR__ . '/../config/nova-cms.php' => config_path('nova-cms.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../config/nova-pages.php' => config_path('nova-pages.php'),
        ]);

        $this->publishes([
            __DIR__.'/../config/nova-menu.php' => config_path('nova-menu.php'),
        ]);

        config(['nova-menu.locales' => config('translatable.locales')]);

        Nova::resources([
            Page::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                Init::class,
                UseTheme::class,
                InitPages::class,
                CreateFirstUser::class,
                CopyConfigFiles::class,
                CopyLanguageFiles::class,
                CopyMigrationFiles::class,
                RemoveExampleViews::class,
                PublishExampleViews::class,
                SafelyReplaceWebpackMix::class,
                SafelyReplacePackageJson::class,
            ]);
        }

        PageModel::observe(PageObserver::class);

        NovaSettings::addSettingsFields(
            [
                Tiptap::make(__('address'), 'address')->translatable(),
                Text::make(__('phone'), 'phone'),
                Text::make(__('email'), 'email'),
            ],
            [
                'address' => 'array',
            ]
        );

        require_once(__DIR__ . '/../helpers/helpers.php');
    }

    public function register()
    {
        $this->app->bind('menu-maker', function () {
            return new MenuMaker();
        });

        $this->app->bind('content-block', function () {
            return new ContentBlock();
        });

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
