<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishExampleViews extends Command
{
    public $signature = 'cms:publish-example-views';

    public function handle()
    {
        $vendorFolderPath = base_path('vendor/kraenkvisuell/nova-cms/resources/views/components');
        $resourceFolderPath = resource_path('views/vendor/nova-cms-examples');

        if (File::exists($resourceFolderPath)) {
            $this->info('deleting old ' . $resourceFolderPath);
            File::deleteDirectory($resourceFolderPath);
        }

        $this->info('adding fresh ' . $resourceFolderPath);
        File::copyDirectory($vendorFolderPath, $resourceFolderPath);
    }
}
