<?php

namespace Kraenkvisuell\NovaCms;

use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\NovaCms\Console\CopyConfigFiles;
use Kraenkvisuell\NovaCms\Console\CopyLanguageFiles;
use Kraenkvisuell\NovaCms\Console\CopyMigrationFiles;
use Kraenkvisuell\NovaCms\Console\CreateFirstUser;
use Kraenkvisuell\NovaCms\Console\DownloadProductionAssets;
use Kraenkvisuell\NovaCms\Console\DownloadProductionDb;
use Kraenkvisuell\NovaCms\Console\ForceMix;
use Kraenkvisuell\NovaCms\Console\Init;
use Kraenkvisuell\NovaCms\Console\InitPages;
use Kraenkvisuell\NovaCms\Console\PublishExampleViews;
use Kraenkvisuell\NovaCms\Console\RemoveExampleViews;
use Kraenkvisuell\NovaCms\Console\SafelyReplacePackageJson;
use Kraenkvisuell\NovaCms\Console\SafelyReplaceWebpackMix;
use Kraenkvisuell\NovaCms\Console\UseTheme;
use Kraenkvisuell\NovaCms\Models\Page as PageModel;
use Kraenkvisuell\NovaCms\Nova\Page;
use Kraenkvisuell\NovaCms\Observers\PageObserver;
use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Nova;
use Manogi\Tiptap\Tiptap;
use OptimistDigital\NovaSettings\NovaSettings;

class NovaCmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $viewPaths = is_array(config('view.paths')) ? config('view.paths') : [];
        if (! in_array(resource_path('themes/active/views'), $viewPaths)) {
            $viewPaths[] = resource_path('themes/active/views');
        }

        config(['view.paths' => $viewPaths]);

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/nova-cms', 'nova-cms');

        $this->loadJsonTranslationsFrom(resource_path('lang/vendor/nova'));

        $this->publishes([
            __DIR__.'/../resources/lang/nova-cms' => resource_path('lang/vendor/nova-cms'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../resources/views/live', 'nova-cms');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->publishes([
            __DIR__.'/../config/nova-cms.php' => config_path('nova-cms.php'),
        ], 'cms');

        $this->publishes([
            __DIR__.'/../config/nova-pages.php' => config_path('nova-pages.php'),
        ], 'pages');

        $this->publishes([
            __DIR__.'/../config/nova-menu.php' => config_path('nova-menu.php'),
        ], 'menu');

        config(['nova-menu.locales' => config('translatable.locales')]);

        Nova::resources([
            Page::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                Init::class,
                UseTheme::class,
                ForceMix::class,
                InitPages::class,
                CreateFirstUser::class,
                CopyConfigFiles::class,
                CopyLanguageFiles::class,
                CopyMigrationFiles::class,
                RemoveExampleViews::class,
                PublishExampleViews::class,
                DownloadProductionDb::class,
                SafelyReplaceWebpackMix::class,
                DownloadProductionAssets::class,
                SafelyReplacePackageJson::class,
            ]);
        }

        PageModel::observe(PageObserver::class);

        NovaSettings::addSettingsFields([

                    Text::make(__('nova-cms::settings.website_title'), 'website_title')
                        ->translatable(),
                    Tiptap::make(__('nova-cms::content_blocks.address'), 'address')
                        ->translatable(),
                    Text::make(__('nova-cms::content_blocks.phone'), 'phone')
                        ->translatable(),
                    Text::make(__('nova-cms::content_blocks.email'), 'email')
                        ->translatable(),
                    Textarea::make(__('nova-cms::settings.verification_embed_codes'), 'verification_embed_codes'),
                    Textarea::make(__('nova-cms::settings.analytics_embed_codes'), 'analytics_embed_codes')
                        ->help(__('nova-cms::settings.analytics_embed_codes_hint')),
                    Textarea::make(__('nova-cms::settings.friendly_analytics_embed_codes'), 'friendly_analytics_embed_codes')
                        ->help(__('nova-cms::settings.friendly_analytics_embed_codes_hint')),

                    Blocks::make(__('nova-cms::content_blocks.social_links'), 'social_links')
                        ->addLayout(__('nova-cms::content_blocks.link'), 'link', [
                            Text::make(__('nova-cms::content_blocks.link_title'), 'link_title')->translatable(),

                            Text::make(__('nova-cms::content_blocks.link_url'), 'link_url')->translatable(),

                            Text::make(__('nova-cms::content_blocks.id'), 'slug'),

                            MediaLibrary::make(__('nova-cms::content_blocks.link_icon'), 'link_icon')
                                ->types(['Image']),

                            Code::make(__('nova-cms::content_blocks.svg_tag'), 'svg_tag')->language('xml'),
                        ])
                        ->button(__('nova-cms::content_blocks.add_social_link'))
                        ->stacked(),
            ], [], 'Website');

        require_once __DIR__.'/../helpers/helpers.php';
    }

    public function register()
    {
        $this->app->bind('menu-maker', function () {
            return new MenuMaker();
        });

        $this->app->bind('content-block', function () {
            return new ContentBlock();
        });

        $this->app->bind('content-parser', function () {
            return new ContentParser();
        });

        $this->app->bind('routes-helper', function () {
            return new RoutesHelper();
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/nova-cms.php',
            'nova-cms'
        );

        $this->mergeConfigFrom(
            __DIR__.'/../config/nova-pages.php',
            'nova-pages'
        );

        $this->mergeConfigFrom(
            __DIR__.'/../config/nova-menu.php',
            'nova-menu'
        );
    }
}
