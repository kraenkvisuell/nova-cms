<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, minimum-scale=1.0, maximum-scale=4.0" />
    <meta name="format-detection" content="telephone=no" />

    <title></title>

    <meta content="index, follow" name="robots">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="https://use.typekit.net/qir7wxz.css">

    <link href="{{ mix(config('nova-cms.main_css_path')) }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
</head>
<body class="
    bg-gray-100 font-sans leading-7 text-base overflow-x-hidden
">

<x-theme.parts.navi />

{{ $slot }}

<x-theme.parts.footer />
</body>
</html>
