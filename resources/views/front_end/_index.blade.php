@php
    $ver = 1113168;
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
    <!-- <link rel="stylesheet" href="https://goto-where.com/public/css/static-css.min.css"> -->
    <link rel="stylesheet" href="{{ asset('/assets/css/index.css') }}?v={{ $ver }}">

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

<body>
    <div class="page-wrapper">
        @include('front_end.layout.header')
        <div>
            @yield('content')
        </div>
        @include('front_end.layout.footer')
    </div>

    <script type="text/javascript" src="{{ asset('/assets/js/app.js') }}?v={{ $ver }}"></script>
    @stack('scripts')
</body>

</html>
<!-- Page cached by LiteSpeed Cache 6.5.4 on 2025-02-14 19:50:31 -->
