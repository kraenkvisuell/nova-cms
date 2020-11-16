<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyMigrationFiles extends Command
{
    public $signature = 'cms:copy-migration-files';

    public function handle()
    {
        $this->info('copying migration files');

        $vendorMigrationFolder = base_path('vendor/optimistdigital/nova-settings/database/migrations');
        $appMigrationFolder = base_path('database/migrations');

        $this->info('copying settings migration file');
        File::copyDirectory($vendorMigrationFolder, $appMigrationFolder);
    }
}
