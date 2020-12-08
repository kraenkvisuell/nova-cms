<?php

namespace Kraenkvisuell\NovaCms\Traits;

trait HasLockableFields
{
    protected function userCanEditLayout($user)
    {
        if (method_exists($user, 'canEditLayout')) {
            return $user->canEditLayout('\\'.get_class($this));
        }

        return true;
    }
}
