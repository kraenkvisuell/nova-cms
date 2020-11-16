<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;

class Init extends Command
{
    public $signature = 'cms:init';

    public function handle()
    {
        $this->call('nova:publish');

        $this->call('nova-lang:publish', ['locales' => 'de']);

        $this->call('cms:copy-config-files');

        $this->call('cms:copy-migration-files');

        $this->call('cms:copy-language-files');

        $this->call('cms:create-first-user');

        $this->call('cms:init-pages');

        $this->call('cms:safely-replace-mix-file');
    }
}
