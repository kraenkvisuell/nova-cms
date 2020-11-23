<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;

class DownloadProductionAssets extends Command
{
    public $signature = 'cms:download-production-assets';

    public function handle()
    {
        $this->comment('downloading production assets');

        if (!config('nova-cms.production.host.path')) {
            $this->error('no production assets path defined.');
            return false;
        }

        $execString = "rsync -av -e ssh "
        .config('nova-cms.production.host.username')
        ."@"
        .config('nova-cms.production.host.host')
        .":"
        .config('nova-cms.production.host.path')
        ."/storage/app/public "
        .base_path('storage/app');

        $output = shell_exec($execString);
        $this->info($output);

        $this->info('done');
    }
}
