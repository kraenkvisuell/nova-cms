<?php

namespace Kraenkvisuell\NovaCms\Models;

use ClassicO\NovaMediaLibrary\API;
use Illuminate\Database\Eloquent\Model;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class Page extends Model
{
    protected $guarded = [];

    protected $table = 'pages';

    protected $casts = [
        'main_content' => FlexibleCast::class,
    ];

    use \Spatie\Translatable\HasTranslations;
    use \Kraenkvisuell\NovaCms\Traits\HasContentBlocks;

    public $contentBlockFields = [
        'main_content',
    ];

    public $translatable = [
        'title',
        'slug',
        'meta_description',
        'browser_title',
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
