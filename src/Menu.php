<?php

namespace Kraenkvisuell\NovaCms;

use Kraenkvisuell\NovaCms\Linkable\LinkablePage;

class Menu
{
    public static function linkableModels()
    {
        $models = [];

        if (class_exists('\Kraenkvisuell\NovaPages\Models\Page')) {
            $models[] = LinkablePage::class;
        }

        return $models;
    }
}
