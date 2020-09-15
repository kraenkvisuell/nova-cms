<?php

namespace Kraenkvisuell\NovaCms\Observers;

use Kraenkvisuell\NovaCms\Models\Page;

class PageObserver
{
    public function created(Page $page)
    {
        $this->ensureOnlyOneHomepage($page);
    }

    public function updated(Page $page)
    {
        $this->ensureOnlyOneHomepage($page);
    }

    protected function ensureOnlyOneHomepage($page)
    {
        if ($page->is_home) {
            Page::withoutEvents(function () use ($page) {
                Page::where('id', '!=', $page->id)
                    ->where('is_home', true)
                    ->update(['is_home' => false]);
            });
        }
    }
}
