<?php

return [
    // Path for your main CSS file - defaults to "css/main.css"
    'main_css_path' => 'css/main.css',

    // available themes - you can add to this array your own themes.
    // Nova CMS provides the following themes atm: default.
    'themes' => [
        'default'
    ],

    // selected theme
    'theme' => 'default',

    // Available default layouts:
    // Text, Gallery, Hero

    'content-blocks' => [
        'default' => [
            'Hero',
            'Text',
            'Gallery',
        ]
    ],

    'hero' => [
        'slides_can_be_rotated' => false,
        'slides_can_be_resized_in_percent' => false,
        'slides_can_be_moved_in_percent' => false,
    ]
];
