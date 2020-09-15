<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Command
{
    public $signature = 'cms:create-first-user';

    public function handle()
    {
        if (\App\User::count() == 0) {
            $this->info('creating cms user user@cms.io with password "password"');

            $user = \App\User::make();

            $user->password = Hash::make('password');
            $user->email = 'user@cms.io';
            $user->name = 'CMS-User';

            $user->save();
        }
    }
}
