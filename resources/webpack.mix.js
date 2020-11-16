const mix = require('laravel-mix');

mix
    .postCss('resources/themes/active/css/main.css', 'public/css', [
        require('tailwindcss')('./resources/themes/active/tailwind.config.js'),
    ])
    .version();
