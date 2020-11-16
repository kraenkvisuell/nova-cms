<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyConfigFiles extends Command
{
    public $signature = 'cms:copy-config-files';

    public function handle()
    {
        $this->info('copying config files');

        $vendorConfigFile = base_path('vendor/kraenkvisuell/nova-cms/config/nova-menu.php');
        $appConfigFile = config_path('nova-menu.php');

        if (!file_exists($appConfigFile)) {
            $this->info('copying menu config file');
            File::copy($vendorConfigFile, $appConfigFile);
        }
    }
}
