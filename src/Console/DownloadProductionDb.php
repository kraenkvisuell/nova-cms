<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;

class DownloadProductionDb extends Command
{
    public $signature = 'cms:download-production-db';

    public function handle()
    {
        $this->comment('downloading production db');

        if (! config('nova-cms.production.db.database')) {
            $this->error('no production db defined.');

            return false;
        }

        $filename = config('nova-cms.production.db.database').'-'.time().'.gz';

        $execString = 'ssh -C '.config('nova-cms.production.host.username').'@'
        .config('nova-cms.production.db.host')
        ." '"
        .'mysqldump -u '
        .config('nova-cms.production.db.username');

        if (config('nova-cms.production.db.password')) {
            $execString .= ' -p'
                .config('nova-cms.production.db.password');
        }

        $execString .= ' '
        .config('nova-cms.production.db.database')
        .' | gzip'
        ."' > ~/Downloads/".$filename;

        exec($execString);

        $this->info('done');
    }
}
