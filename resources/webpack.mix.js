const mix = require('laravel-mix');

mix
    .scripts([
        'node_modules/body-scroll-lock/lib/bodyScrollLock.min.js'
    ], 'public/js/main.js')
    .postCss('resources/themes/active/css/main.css', 'public/css', [
        require('tailwindcss')('./resources/themes/active/tailwind.config.js'),
    ])
    .version();
