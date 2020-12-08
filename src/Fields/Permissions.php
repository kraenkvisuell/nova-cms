<?php

namespace Kraenkvisuell\NovaCms\Fields;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BooleanGroup;

class Permissions
{
    public static function make()
    {
        return BooleanGroup::make('Permissions', 'cms_permissions')->options([
            'isSuperuser' => 'is Superuser',
        ]);
    }
}
