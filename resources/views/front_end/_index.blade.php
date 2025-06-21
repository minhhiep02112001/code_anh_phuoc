@php
    $ver = 11368;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $config_social = getValueSetting('config_social');
@endphp
<!DOCTYPE html>
<html lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    @include('front_end.block.config_seo_header')

 <link href="{{ asset('assets/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link rel="preload" href="{{ convertPathImage('/assets/css/fonts.css') }}?ver={{ $ver }}" as="style"
        onload="this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ convertPathImage('/assets/css/fonts.css') }}?ver={{ $ver }}">
    </noscript>

   
    <link rel="stylesheet" href="{{ convertPathImage('/assets/css/brand_1.css') }}?ver={{ $ver }}"> 
    <link rel="stylesheet" href="{{ convertPathImage('/assets/slick/slick/slick.css') }}?ver={{ $ver }}">
    <link rel="stylesheet" href="{{ convertPathImage('/assets/css/theme_1.css') }}?ver={{ $ver }}">



    @include('front_end.block.config_seo_header')

</head>

<body class="home page-template  ">

    <!-- **Wrapper** -->
    <div class="wrapper">

        <!-- ** Inner Wrapper ** -->
        <div class="inner-wrapper">


            <!-- ** Header Wrapper ** -->
            @include('front_end.layout.header')
            <!-- ** Header Wrapper - End ** -->

            <!-- **Main** -->
            <div id="main">
                <!-- ** Container ** -->
                @yield('content')
                <!-- ** Container End ** -->
            </div><!-- **Main - End ** -->


            <!-- **Footer** -->
            @include('front_end.layout.footer')
            <!-- **Footer - End** -->
        </div><!-- **Inner Wrapper - End** -->

    </div><!-- **Wrapper - End** -->
    <div class="mobile-menu">
        <ul id="menu-new-menu-2" class="wdt-primary-nav " data-menu="62">
            <li class="close-nav"><a href="javascript:void(0);"></a></li>
            <li id="menu-item-2877"
                class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2877 menu-item-depth-0">
                <a href="/" aria-current="page"><span data-text="Home">Home</span></a>
            </li>

            <li id="menu-item-2744"
                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2744 menu-item-depth-0">
                <a href="#about"><span data-text="About">About</span></a>
            </li>
            <li id="menu-item-2757"
                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2757 menu-item-depth-0">
                <a href="#gallery"><span data-text="Contact Us">Photos</span></a>
            </li>
            <li id="menu-item-2755"
                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2755 menu-item-depth-0">
                <a href="#comment"><span data-text="Blog">Review</span></a>
            </li>
            <li id="menu-item-2755"
                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2755 menu-item-depth-0">
                <a href="#location"><span data-text="Blog">Location</span></a>
            </li>
        </ul>
    </div>
    <a id="back-to-top" href="#">
        <span id="back-to-top-hover"></span>
        <span class="back-to-top-icon"><i class="wdticon-angle-up"></i></span>
    </a>

    <script type="text/javascript" src="{{ convertPathImage('/assets/js/script_minified.js') }}?ver={{ $ver }}">
    </script>

    @stack('scripts')
</body>

</html>

<!-- Page cached by LiteSpeed Cache 6.5.4 on 2025-02-14 19:50:31 -->
