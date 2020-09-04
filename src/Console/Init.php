<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Init extends Command
{
    public $signature = 'cms:init';

    public function handle()
    {
        $vendorConfigFile = base_path('vendor/kraenkvisuell/nova-cms/config/nova-menu.php');
        $appConfigFolder = config_path('nova-menu.php');

        $this->info('copying menu config file');
        File::copy($vendorConfigFile, $appConfigFolder);
    }
}
