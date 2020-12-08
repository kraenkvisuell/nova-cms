<?php

namespace Kraenkvisuell\NovaCms\Traits;

use Kraenkvisuell\NovaCms\Models\CmsPermission;

trait WithCmsPermissions
{
    public function getCasts()
    {
        $this->casts['cms_permissions'] = 'array';

        return parent::getCasts();
    }

    public function isSuperUser()
    {
        return @$this->cms_permissions['isSuperuser'];
    }

    public function canEditLayout($field = null)
    {
        if (!$field) {
            return true;
        }

        if ($this->isSuperUser()) {
            return true;
        }

        $lockableLayouts = config('nova-cms.permissions.lockableLayouts') ?: [];


        foreach ($lockableLayouts as $lockableLayout) {
            // Add full class path when short form is used
            if (!stristr($lockableLayout, '\\')) {
                $lockableLayout = '\Kraenkvisuell\NovaCms\Layouts\\'.$lockableLayout.'Layout';
            }

            if ($field == $lockableLayout) {
                return $this->hasCmsPermission('manageLayout', $lockableLayout);
            }
        }

        return true;
    }

    public function hasCmsPermission($type, $name)
    {
        return false;
    }
}
