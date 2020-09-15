<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Kraenkvisuell\NovaCms\Models\Page;

class InitPages extends Command
{
    public $signature = 'cms:init-pages';

    public function handle()
    {
        $this->info('creating home page');

        if (Page::where('is_home', true)->count() == 0) {
            Page::create([
                'slug' => 'home',
                'title' => 'Home',
                'is_home' => true
            ]);

            $this->info('Home page created.');
        } else {
            $this->info('Home page already existed.');
        }
    }
}
