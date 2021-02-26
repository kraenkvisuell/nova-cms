@props([
    'browserTitle' => 'Schloss Bödigheim',
    'metaDescription' => '',
])

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, minimum-scale=1.0, maximum-scale=4.0" />
    <meta name="format-detection" content="telephone=no" />

    <title>{{ $browserTitle }}</title>

    <meta content="index, follow" name="robots">
    <meta content="{{ $metaDescription }}" name="description">
    <meta content="" name="keywords">

    <link rel="icon" href="/img/favicon02.png" type="image/png">
    <link rel="stylesheet" href="https://use.typekit.net/qir7wxz.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ mix('js/main.js') }}"></script>
    <link href="{{ mix(config('nova-cms.main_css_path')) }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
</head>
<body class="
    bg-dark-grey font-main text-grey
">

<div class="flex justify-center">
    <div class="w-full max-w-container">

        <x-parts.navi />

        {{ $slot }}

        <x-parts.footer />

    </div>
</div>

</body>
</html>
