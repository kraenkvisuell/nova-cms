<?php

namespace Kraenkvisuell\NovaCms;

use Kraenkvisuell\NovaCms\Linkable\LinkablePage;

class Menu
{
    public static function linkableModels()
    {
        $models = [];

        if (class_exists('\Kraenkvisuell\NovaCms\Models\Page')) {
            $models[] = LinkablePage::class;
        }

        return $models;
    }
}
