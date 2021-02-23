<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Command
{
    public $signature = 'cms:create-first-user';

    public function handle()
    {
        $this->info('creating first user');

        if (\App\Models\User::count() == 0) {
            $this->info('creating cms user cms@kraenk.de with password "password"');

            $user = \App\Models\User::make();

            $user->password = Hash::make('password');
            $user->email = 'cms@kraenk.de';
            $user->name = 'CMS-User';

            $user->save();
        } else {
            $this->comment('a user already existed');
        }
    }
}
