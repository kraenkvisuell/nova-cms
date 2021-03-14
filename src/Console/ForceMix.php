<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;

class ForceMix extends Command
{
    public $signature = 'cms:force-mix';

    public function handle()
    {
        $this->call('cms:safely-replace-webpack-mix');

        $this->call('cms:safely-replace-package-json');
    }
}
