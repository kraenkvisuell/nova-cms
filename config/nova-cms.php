<?php

return [
    // Base folder for route urls - if this is empty, page rotes start
    // directly at "/" (and the home page is "/")
    'base_route_folder' => '',

    // Path for your main CSS file - defaults to "css/app.css"
    'main_css_path' => 'css/app.css',

    // available themes - you can add to this array your own themes.
    // Nova CMS provides the following themes atm: default.
    'themes' => [
        'default',
    ],

    // selected theme
    'theme' => 'default',

    // Available default content-blocks:
    // [
    //     'Hero',
    //     'TextImages',
    //     'Quote',
    //     'Text',
    //     'Gallery',
    //     'Image',
    //     'Links',
    //     'Video',
    //     'Sound',
    //     'People',
    //     'SubContent',
    // ]

    'content-blocks' => [
        'default' => [
            'Image',
            'Text',
            'Gallery',
        ],
    ],

    'hero' => [
        'has_text' => false,
        'has_topline' => false,
        'has_headline' => true,
        'has_button' => false,
        'has_secondary_button' => false,
        'slides_can_be_rotated' => false,
        'slides_can_be_resized_in_percent' => false,
        'slides_can_be_moved_in_percent' => false,
        'single_slide_can_be_resized_in_percent' => false,
    ],

    'content' => [
        'open_urls_in_new_tab' => false,
        'with_subcaptions' => false,
        'with_toplines' => false,
        'with_headline_for_folded' => false,
        'with_collapsed_fields' => false,
        'with_bottom_links' => true,
        'sound_with_subtitle' => false,
        'text_images_positions' => [
            'left',
            'right',
        ],
        'images' => [
            'orientations' => [],
            'width' => [],
        ],
        'media' => [
            'upload_only' => false,
        ],
        'editor' => [],
        'with_subcontent_bg_color' => false,

    ],

    'permissions'=> [
        'lockableLayouts' => [],
    ],

    'production' => [
        'host' => [
            'host' => env('PRODUCTION_HOST', 'localhost'),
            'username' => env('PRODUCTION_HOST_USERNAME', 'forge'),
            'path' => env('PRODUCTION_HOST_PATH', ''),
        ],
        'db' => [
            'database'  => env('PRODUCTION_DB_DATABASE', 'forge'),
            'host' => env('PRODUCTION_HOST', 'localhost'),
            'port' => env('PRODUCTION_DB_PORT', '3306'),
            'username'  => env('PRODUCTION_DB_USERNAME', 'forge'),
            'password'  => env('PRODUCTION_DB_PASSWORD', ''),
        ],
    ],

    'pages' => [
        'has_types' => false,
        'types' => [],
    ],
];
