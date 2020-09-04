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
    
    <link href="{{ mix(config('nova-cms.main_css_path')) }}" rel="stylesheet">
</head>
<body>
{{ $slot }}
</body>
</html>