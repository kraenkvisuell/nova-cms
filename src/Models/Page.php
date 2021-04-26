<?php

namespace Kraenkvisuell\NovaCms\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Kraenkvisuell\NovaCmsBlocks\Value\BlocksCast;
use Kraenkvisuell\NovaCms\Traits\HasContentBlocks;

class Page extends Model
{
    use HasTranslations;
    use HasContentBlocks;

    protected $guarded = [];

    protected $table = 'pages';

    protected $casts = [
        'main_content' => BlocksCast::class,
        'robots' => 'array',
    ];

    public $contentBlockFields = [
        'main_content',
    ];

    public $translatable = [
        'title',
        'slug',
        'browser_title',
        'meta_description',
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
