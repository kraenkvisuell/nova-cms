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
        'top_banners' => FlexibleCast::class,
    ];

    use \Spatie\Translatable\HasTranslations;

    public $translatable = [
        'title',
        'slug',
        'main_content',
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
        return route('nova-page-single', ['page' => $this->slug]);
    }

    public function topBanners()
    {
        if (!$this->top_banners) {
            return [];
        }

        $banners = [];

        foreach ($this->top_banners as $topBanner) {
            $banners[] = [
                'headline' => optional($topBanner['headline'])->{app()->getLocale()},
                'url' => @$topBanner['image'] ? API::getFiles($topBanner['image'], 'large') : null,
                'alt_text' => @$topBanner['alt_text'] ?: '',
            ];
        };

        return $banners;
    }
}
