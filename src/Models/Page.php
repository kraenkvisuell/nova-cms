<?php

namespace Kraenkvisuell\NovaCms\Models;

use Illuminate\Database\Eloquent\Model;
use Kraenkvisuell\NovaCms\Traits\HasContentBlocks;
use Kraenkvisuell\NovaCmsBlocks\Value\BlocksCast;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;
    use HasContentBlocks;

    protected $guarded = [];

    public function getTable()
    {
        return config('nova-cms.db_prefix') . 'pages';
    }

    protected $casts = [
        'main_content' => BlocksCast::class,
        'robots' => 'array',
    ];

    public $contentBlockFields = [
        'main_content',
    ];

    public $translatable = [
        'title',
        'navi_title',
        'slug',
        'browser_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
    ];

    public function url()
    {
        $locales = config('nova-translatable.locales');
        $locale = app()->getLocale();

        // Multi-language
        if (is_array($locales) and count($locales) > 1) {
            if ($this->is_home && $locale == config('app.fallback_locale')) {
                return route('nova-page-single');
            }

            return route('nova-page-multi', ['locale' => $locale, 'page' => $this->slug]);
        }

        // Single-language
        if ($this->is_home) {
            return route('nova-page-single-home');
        }

        return route('nova-page-single', ['page' => $this->slug]);
    }
}
