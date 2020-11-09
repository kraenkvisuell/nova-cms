<?php

namespace Kraenkvisuell\NovaCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UseTheme extends Command
{
    public $signature = 'cms:use-theme {theme}';

    public $description = 'copies theme files to your resources - backs up any exisiting theme folder.';

    public function handle()
    {
        $theme = $this->argument('theme');

        $folderPath = base_path('vendor/kraenkvisuell/nova-cms/resources/themes/'.$theme);

        if (!is_dir($folderPath)) {
            return $this->error('This theme does not exist.');
        }



        // backing up existing theme
        $exisitingThemePath = 'resources/themes/active';

        if (is_dir(base_path($exisitingThemePath))) {
            $jsonFile = base_path($exisitingThemePath.'/theme.json');

            $exisitingThemeName = 'unknown';
            if (is_file($jsonFile)) {
                $json = json_decode(file_get_contents($jsonFile));
                if ($json->name) {
                    $exisitingThemeName = $json->name;
                }
            }

            $backupFolder = 'backup-'.$exisitingThemeName.'-'.time();

            rename(base_path($exisitingThemePath), base_path('resources/themes/'.$backupFolder));

            $this->comment('We backed your current theme to '.$backupFolder);
        }

        // copying theme
        File::copyDirectory($folderPath, base_path('resources/themes/active'));

        $this->info('You can now use the theme files.');
    }
}
