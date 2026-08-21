@php
    $ver = 111369;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $config_social = getValueSetting('config_social');
@endphp
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @include('front_end.block.config_seo_header')
    <link rel="stylesheet" href="{{ asset('/assets/css/menujoys-all-css.min.css') }}?v={{ $ver }}">
    <script>
        var base_url_domain = '{{ env('APP_URL', '/') }}';
    </script>
</head>

<body class="">
    @include('front_end.layout.header')
    <main id="main">
        @yield('content')
    </main>
    @include('front_end.layout.footer')
    <script type="text/javascript" src="{{ asset('/assets/js/menujoys-all-js.min.js') }}?v={{ $ver }}"></script>
    @stack('scripts')
</body>
</html>
