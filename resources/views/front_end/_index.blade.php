@php
    $ver = 111369;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $config_social = getValueSetting('config_social');
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @include('front_end.block.config_seo_header')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Fraunces:opsz,wght@9..144,600;9..144,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/index.css') }}?v={{ $ver }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/venue.css') }}?v={{ $ver }}">
    @stack('styles')

    <style>
        #time_open table {
            width: 100%;
        }

        .timing-list li {
            line-height: 18px;
            margin-bottom: 0px;
        }

        #time_open table td {
            padding:10px 0px;
        }

        .main-header .logo-box a {
            font-size: 30px;
            font-weight: 700;
            color: #fff;
        }
    </style>
</head>

<body class="@yield('body_class')">
    <div class="page-wrapper">
        @include('front_end.layout.header')
        <div>
            @yield('content')
        </div>
        @include('front_end.layout.footer')
    </div>

    <script type="text/javascript" src="{{ asset('/assets/js/venue-core.js') }}?v={{ $ver }}" defer></script>
    @stack('scripts')
</body>

</html>
