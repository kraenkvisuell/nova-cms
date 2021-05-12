<?php

namespace Kraenkvisuell\NovaCms;

class RoutesHelper
{
    public function prefix()
    {
        $prefix = trim(config('nova-cms.base_route_folder'));
        if (!$prefix) {
            return '';
        }

        if (substr($prefix, 0, 1) != '/') {
            $prefix = '/'.$prefix;
        }

        if (substr($prefix, (strlen($prefix) - 1), 1) == '/') {
            $prefix = substr($prefix, 0, (strlen($prefix) - 1));
        }

        return $prefix;
    }
}
