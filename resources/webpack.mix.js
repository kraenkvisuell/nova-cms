const mix = require('laravel-mix');

mix
    .js('resources/themes/active/js/app.js', 'public/js/app.js')
    .postCss('resources/themes/active/css/app.css', 'public/css', [
        require('tailwindcss')('./resources/themes/active/tailwind.config.js'),
    ])
    .version();
