<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RemoveExampleViews extends Command
{
    public $signature = 'cms:remove-example-views';

    public function handle()
    {
        $resourceFolderPath = resource_path('views/vendor/nova-cms-examples');

        if (File::exists($resourceFolderPath)) {
            $this->info('deleting ' . $resourceFolderPath);
            File::deleteDirectory($resourceFolderPath);
        }
    }
}
