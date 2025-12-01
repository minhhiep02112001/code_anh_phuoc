@php
    $ver = 11368;
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
    <title>Goto Where - Discover the Best Restaurants, Cafes, Bars, Nail Salons, and Hotels</title>
    <meta name="description"
        content="Explore Goto Where to find top-rated restaurants, cozy cafes, vibrant bars, relaxing nail salons, and comfortable hotels. Your ultimate guide to the best local spots!" />
    <meta name="keywords" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Goto Where - Discover the Best Restaurants, Cafes, Bars, Nail Salons, and Hotels" />
    <meta property="og:description"
        content="Explore Goto Where to find top-rated restaurants, cozy cafes, vibrant bars, relaxing nail salons, and comfortable hotels. Your ultimate guide to the best local spots!" />
    <meta property="og:image" content="https://static.goto-where.com/logo-share.png" />
    <meta property="og:url" content="https://goto-where.com/" />
    <link rel="canonical" href="https://goto-where.com/" />
    <meta name="robots" content="index, follow" />
    <link rel="shortcut icon" href="https://static.goto-where.com/favico.png" sizes="32x32">
    <link rel="stylesheet" href="https://goto-where.com/public/css/static-css.min.css">
    <script> var base_url_domain = 'https://goto-where.com/'; </script> <!-- Google tag (gtag.js) -->
  

    <style>
        #time_open table{
            width: 100%;
        }
        .timing-list li{
            line-height: 18px;
            margin-bottom: 0px;
        }
        #time_open table td{
            padding:10px;
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
</body>

</html>
<!-- Page cached by LiteSpeed Cache 6.5.4 on 2025-02-14 19:50:31 -->