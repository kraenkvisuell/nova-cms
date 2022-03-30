<?php

namespace Kraenkvisuell\NovaCms\Controllers;

class CookiesController
{
    public function update()
    {
        session(['cookies_accepted' => true]);

        if (request()->post('functionalCookiesAccepted')) {
            session(['analytics_cookies_accepted' => true]);
        }

        return [
            'success' => true,
        ];
    }
}
