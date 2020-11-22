<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SafelyReplacePackageJson extends Command
{
    public $signature = 'cms:safely-replace-package-json';

    public function handle()
    {
        $this->info('safely replacing package.json');
        $packageJson = base_path('package.json');

        if (File::exists($packageJson)) {
            File::move($packageJson, base_path('package.json.backup.js'));
        }

        File::copy(
            base_path('vendor/kraenkvisuell/nova-cms/resources/package.json'),
            base_path('package.json')
        );
    }
}
