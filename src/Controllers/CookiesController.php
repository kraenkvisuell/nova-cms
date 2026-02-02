<?php

namespace Kraenkvisuell\NovaCms\Controllers;

class CookiesController
{
    public function update()
    {
        if (request()->post('essentialCookiesAccepted')) {
            session(['cookies_accepted' => true]);
        } else {
            session()->forget('cookies_accepted');
        }

        if (request()->post('functionalCookiesAccepted')) {
            session(['analytics_cookies_accepted' => true]);
        } else {
            session()->forget('analytics_cookies_accepted');
        }

        if (request()->post('analyticsCookiesAccepted')) {
            session(['analytics_cookies_accepted' => true]);
        } else {
            session()->forget('analytics_cookies_accepted');
        }

        if (request()->post('marketingCookiesAccepted')) {
            session(['marketing_cookies_accepted' => true]);
        } else {
            session()->forget('marketing_cookies_accepted');
        }

        return [
            'success' => true,
        ];
    }
}
