<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyLanguageFiles extends Command
{
    public $signature = 'cms:copy-language-files';

    public function handle()
    {
        $this->info('copying language files');

        $langFolder = base_path('resources/lang/vendor/nova-cms-media');
        if (!is_dir($langFolder)) {
            mkdir($langFolder);
        }

        File::copy(
            base_path('vendor/kraenkvisuell/nova-cms/resources/lang/nova-cms-media/de.json'),
            base_path('resources/lang/vendor/nova-cms-media/de.json'),
        );

        $langFolder = base_path('resources/lang/vendor/nova-settings');
        if (!is_dir($langFolder)) {
            mkdir($langFolder);
        }

        File::copy(
            base_path('vendor/kraenkvisuell/nova-cms/resources/lang/nova-settings/de.json'),
            base_path('resources/lang/vendor/nova-settings/de.json'),
        );

        $langFolder = base_path('resources/lang/vendor/nova-menu-builder');
        if (!is_dir($langFolder)) {
            mkdir($langFolder);
        }

        File::copy(
            base_path('vendor/kraenkvisuell/nova-cms/resources/lang/nova-menu-builder/de.json'),
            base_path('resources/lang/vendor/nova-menu-builder/de.json'),
        );

        // $langFolder = base_path('resources/lang/vendor/nova-cms');
        // if (!is_dir($langFolder)) {
        //     mkdir($langFolder);
        // }

        // File::copy(
        //     base_path('vendor/kraenkvisuell/nova-cms/resources/lang/de.json'),
        //     base_path('resources/lang/vendor/nova-cms/de.json'),
        // );
    }
}
