<?php

namespace Kraenkvisuell\NovaCms\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    protected $table = 'pages';

    use \Spatie\Translatable\HasTranslations;

    public $translatable = [
        'title',
        'slug',
        'main_content',
        'meta_description',
        'browser_title',
    ];
}
