@php
    $ver = 113;
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

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        :root {
            --wdtPrimaryColor: #ecdec1;
            --wdtPrimaryColorRgb: 236, 222, 193;
            --wdtSecondaryColor: #000000;
            --wdtSecondaryColorRgb: 0, 0, 0;
            --wdtTertiaryColor: #b6713e;
            --wdtTertiaryColorRgb: 182, 113, 62;
            --wdtBodyBGColor: #fcf7ee;
            --wdtBodyBGColorRgb: 252, 247, 238;
            --wdtBodyTxtColor: #202020;
            --wdtBodyTxtColorRgb: 32, 32, 32;
            --wdtHeadAltColor: #000000;
            --wdtHeadAltColorRgb: 0, 0, 0;
            --wdtLinkColor: #000000;
            --wdtLinkColorRgb: 0, 0, 0;
            --wdtLinkHoverColor: #b6713e;
            --wdtLinkHoverColorRgb: 182, 113, 62;
            --wdtBorderColor: #b7b7b7;
            --wdtBorderColorRgb: 183, 183, 183;
            --wdtAccentTxtColor: #ffffff;
            --wdtAccentTxtColorRgb: 255, 255, 255;
            --wdtFontTypo_Base: "Nunito", sans-serif;
            --wdtFontWeight_Base: 400;
            --wdtFontSize_Base: 16px;
            --wdtLineHeight_Base: 1.64;
            --wdtFontTypo_Alt: "Nunito", sans-serif;
            --wdtFontWeight_Alt: 700;
            --wdtFontSize_Alt: 60px;
            --wdtLineHeight_Alt: 1.28;
            --wdtFontTypo_H1: "Nunito", sans-serif;
            --wdtFontWeight_H1: 700;
            --wdtFontSize_H1: 60px;
            --wdtLineHeight_H1: 1.28;
            --wdtFontTypo_H2: "Nunito", sans-serif;
            --wdtFontWeight_H2: 700;
            --wdtFontSize_H2: 50px;
            --wdtLineHeight_H2: 1.28;
            --wdtFontTypo_H3: "Nunito", sans-serif;
            --wdtFontWeight_H3: 500;
            --wdtFontSize_H3: 44px;
            --wdtLineHeight_H3: 1.28;
            --wdtFontTypo_H4: "Nunito", sans-serif;
            --wdtFontWeight_H4: 500;
            --wdtFontSize_H4: 30px;
            --wdtLineHeight_H4: 1.28;
            --wdtFontTypo_H5: "Nunito", sans-serif;
            --wdtFontWeight_H5: 500;
            --wdtFontSize_H5: 26px;
            --wdtLineHeight_H5: 1.28;
            --wdtFontTypo_H6: "Nunito", sans-serif;
            --wdtFontWeight_H6: 500;
            --wdtFontSize_H6: 20px;
            --wdtLineHeight_H6: 1.28;
            --wdtFontTypo_Ext: "Nunito", cursive;
            --wdtFontWeight_Ext: 600;
            --wdtFontSize_Ext: 12px;
            --wdtLineHeight_Ext: 1.1;
        }
    </style> 
     
    <link rel="stylesheet" href="{{ convertPathImage('/assets/css/css_minified.min.css') }}?ver={{ $ver }}">
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
