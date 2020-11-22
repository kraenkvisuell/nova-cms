<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SafelyReplaceWebpackMix extends Command
{
    public $signature = 'cms:safely-replace-webpack-mix';

    public function handle()
    {
        $this->info('safely replacing webpack.mix.js');
        $mixFile = base_path('webpack.mix.js');

        if (File::exists($mixFile)) {
            File::move($mixFile, base_path('webpack.mix.backup.js'));
        }

        File::copy(
            base_path('vendor/kraenkvisuell/nova-cms/resources/webpack.mix.js'),
            base_path('webpack.mix.js')
        );
    }
}
