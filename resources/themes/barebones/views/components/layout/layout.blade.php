@props([
    'browserTitle' => 'Neue Website',
])

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, minimum-scale=1.0, maximum-scale=4.0" />
        <meta name="format-detection" content="telephone=no" />

        <title>{{ $browserTitle }}</title>

        <meta content="index, follow" name="robots">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <link rel="icon" href="/img/favicon.png" type="image/png">
        
        
        <link href="{{ mix(config('nova-cms.main_css_path')) }}" rel="stylesheet">

        <script src="{{ mix('js/app.js') }}"></script>

        <script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script>
    </head>

    <body class="
        font-text leading-normal text-base 
    ">
        {{ $slot }}
    </body>
</html>
