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

        if (!file_exists($appConfigFolder)) {
            $this->info('copying menu config file');
            File::copy($vendorConfigFile, $appConfigFolder);
        }

        $vendorMigrationFolder = base_path('vendor/optimistdigital/nova-settings/database/migrations');
        $appMigrationFolder = base_path('database/migrations');

        $this->info('copying settings migration file');
        File::copyDirectory($vendorMigrationFolder, $appMigrationFolder);

        $langFolder = base_path('resources/lang/vendor/nova-settings');
        if (!is_dir($langFolder)) {
            mkdir($langFolder);
        }

        File::copy(
            base_path('vendor/kraenkvisuell/nova-cms/resources/lang/de.json'),
            base_path('resources/lang/vendor/nova-settings/de.json'),
        );


        $this->call('cms:create-first-user');

        $this->call('cms:init-pages');
    }
}
