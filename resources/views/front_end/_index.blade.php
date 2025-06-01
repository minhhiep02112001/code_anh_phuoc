@php
    $ver = 125;
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

    <script>
        document.documentElement.className = document.documentElement.className + ' yes-js js_active js'
    </script>
    @include('front_end.block.config_seo_header')


    <style id='lilac-beauty-inline-css' type='text/css'>
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
            --wdtFontTypo_Base: "Lato", sans-serif;
            --wdtFontWeight_Base: 400;
            --wdtFontSize_Base: 16px;
            --wdtLineHeight_Base: 1.64;
            --wdtFontTypo_Alt: "Outfit", sans-serif;
            --wdtFontWeight_Alt: 700;
            --wdtFontSize_Alt: 60px;
            --wdtLineHeight_Alt: 1.28;
            --wdtFontTypo_H1: "Outfit", sans-serif;
            --wdtFontWeight_H1: 700;
            --wdtFontSize_H1: 60px;
            --wdtLineHeight_H1: 1.28;
            --wdtFontTypo_H2: "Outfit", sans-serif;
            --wdtFontWeight_H2: 700;
            --wdtFontSize_H2: 50px;
            --wdtLineHeight_H2: 1.28;
            --wdtFontTypo_H3: "Outfit", sans-serif;
            --wdtFontWeight_H3: 500;
            --wdtFontSize_H3: 44px;
            --wdtLineHeight_H3: 1.28;
            --wdtFontTypo_H4: "Outfit", sans-serif;
            --wdtFontWeight_H4: 500;
            --wdtFontSize_H4: 30px;
            --wdtLineHeight_H4: 1.28;
            --wdtFontTypo_H5: "Outfit", sans-serif;
            --wdtFontWeight_H5: 500;
            --wdtFontSize_H5: 26px;
            --wdtLineHeight_H5: 1.28;
            --wdtFontTypo_H6: "Outfit", sans-serif;
            --wdtFontWeight_H6: 500;
            --wdtFontSize_H6: 20px;
            --wdtLineHeight_H6: 1.28;
            --wdtFontTypo_Ext: "Mrs Saint Delafield", cursive;
            --wdtFontWeight_Ext: 600;
            --wdtFontSize_Ext: 12px;
            --wdtLineHeight_Ext: 1.1;
        }
    </style>

    {{-- FontAwesome preload --}}
    <link rel="preload" href="{{ asset('admins/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link href="{{ asset('admins/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
            media="all" />
    </noscript>

    {{-- Google Fonts preload + fallback --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
        as="style"  />
     
    {{-- Các CSS chính preload + onload --}}
    <link rel="stylesheet" href="/assets/css/css_minified.css?ver={{ $ver }}" as="style"  />
     

    <link rel="stylesheet" href="/assets/css/theme_1.css?ver={{ $ver }}" as="style"  />
  

    <link rel="stylesheet" href="/assets/slick/slick/slick.css?ver={{ $ver }}" as="style"/>
   

    @include('front_end.block.config_seo_header')

    {{-- Các style inline hiện tại giữ nguyên --}}
    <style id='wp-emoji-styles-inline-css' type='text/css'>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style id='safe-svg-svg-icon-style-inline-css' type='text/css'>
        .safe-svg-cover {
            text-align: center
        }

        .safe-svg-cover .safe-svg-inside {
            display: inline-block;
            max-width: 100%
        }

        .safe-svg-cover svg {
            height: 100%;
            max-height: 100%;
            max-width: 100%;
            width: 100%
        }
    </style>

    {{-- Tải JS với defer để không chặn render --}}

</head>

<body
    class="home page-template page-template-elementor_header_footer page page-id-2632 wp-custom-logo theme-lilac-beauty has-go-to-top lilacbeauty-plus-1.0.2 lilacbeauty-pro-1.0.0 woocommerce-no-js elementor-default elementor-template-full-width elementor-kit-11 elementor-page elementor-page-2632">

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
    <div class="mobile-menu  ">
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
    <script type="text/javascript" src="wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1"></script>
    <script type="text/javascript" src="/assets/js/slick.min.js?ver=3.7.1" defer></script>
    <a id="back-to-top" href="#">
        <span id="back-to-top-hover"></span>
        <span class="back-to-top-icon"><i class="wdticon-angle-up"></i></span>
    </a>

    <style>
        span.ti-stars {
            display: flex;
            margin-bottom: 5px;
            margin-top: 5px;
        }

        .ti-review-header {
            display: flex;
            align-content: center;
            justify-content: flex-start;
        }

        img.ti-star {
            width: 12px;
            margin-right: 2px;
        }

        .ti-profile-details {
            padding-left: 10px;
        }

        .ti-widget.ti-goog .ti-widget-container .ti-name {
            font-weight: bold;
            font-size: 14px;
            overflow: hidden;
            padding-right: 25px;
            white-space: nowrap;
            text-overflow: ellipsis;
            color: #000000;
            margin-bottom: 2px;
        }

        .ti-widget.ti-goog .ti-review-item>.ti-inner {
            border-style: solid !important;
            border-color: #f4f4f4 !important;
            background: #f4f4f4 !important;
            border-radius: 4px !important;
            padding: 20px !important;
            margin: 10px !important;
            display: block;
            position: relative;
        }
    </style>
    <script>
        jQuery(document).ready(function() {
            // Khởi tạo Slick Slider
            if (jQuery('.slide-banners').length > 0) {
                jQuery('.slide-banners').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 5000, // Chuyển ảnh sau mỗi 2 giây
                    arrows: true,
                    infinite: true,
                });
            }

            jQuery('.sliders').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000, // Chuyển ảnh sau mỗi 2 giây
                arrows: true,
                infinite: true,
                responsive: [{
                        breakpoint: 800, // Khi màn hình nhỏ hơn hoặc bằng 1000px
                        settings: {
                            slidesToShow: 4, // Hiển thị 5 ảnh
                        },
                    },
                    {
                        breakpoint: 600, // Khi màn hình nhỏ hơn hoặc bằng 600px
                        settings: {
                            slidesToShow: 1, // Hiển thị 4 ảnh
                        },
                    },
                    {
                        breakpoint: 400, // Khi màn hình nhỏ hơn hoặc bằng 400px
                        settings: {
                            slidesToShow: 1, // Hiển thị 3 ảnh
                        },
                    },
                ],
            });
            jQuery('.sliders-brands').slick({
                slidesToShow: 5,
                slidesToScroll: 2,
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000, // Chuyển ảnh sau mỗi 2 giây
                arrows: true,
                infinite: true,
                responsive: [{
                        breakpoint: 800, // Khi màn hình nhỏ hơn hoặc bằng 1000px
                        settings: {
                            slidesToShow: 4, // Hiển thị 5 ảnh
                        },
                    },
                    {
                        breakpoint: 600, // Khi màn hình nhỏ hơn hoặc bằng 600px
                        settings: {
                            slidesToShow: 2, // Hiển thị 4 ảnh
                        },
                    },
                    {
                        breakpoint: 400, // Khi màn hình nhỏ hơn hoặc bằng 400px
                        settings: {
                            slidesToShow: 1, // Hiển thị 3 ảnh
                        },
                    },
                ],
            });
        });

        jQuery(document).ready(function() {
            jQuery("li.close-nav, .mobile-nav-offcanvas-right").on('click', function() {
                jQuery('.mobile-menu').toggleClass('nav-is-visible')
            })
        });
    </script>
    <style>
        /* Thiết lập vị trí, kích thước & màu sắc của nút */
        .slick-prev,
        .slick-next {
            background-color: rgba(0, 0, 0, 0.5);
            /* Màu nền */
            color: white;
            /* Màu icon */
            border-radius: 50% !important;
            /* Bo tròn */
            width: 40px;
            height: 40px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
            /* Đảm bảo nút hiển thị trên cùng */
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .slick-prev,
        .slick-next {
            font-size: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            /* Ẩn chữ nhưng vẫn hiển thị icon */
        }

        /* Nút Previous (Trái) */
        .slick-prev {
            left: -10px;
            /* Điều chỉnh vị trí */
        }

        /* Nút Next (Phải) */
        .slick-next {
            right: -10px;
        }

        /* Thêm icon FontAwesome 4 vào nút */
        .slick-prev::before {
            content: "\f104";
            font-family: "FontAwesome";
            font-size: 20px;
            position: absolute;
            top: 6px;
            left: 14px;
        }

        .slick-next::before {
            content: "\f105";
            /* Icon FontAwesome (fa-chevron-right) */
            font-family: "FontAwesome";
            font-size: 20px;
            position: absolute;
            top: 6px;
            left: 18px;
        }

        /* Hiệu ứng khi hover */
        .slick-prev:hover,
        .slick-next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }


        @media (max-width: 768px) {

            .slick-prev,
            .slick-next {
                width: 30px;
                height: 30px;
            }

            .slick-prev::before,
            .slick-next::before {
                font-size: 16px;
            }
        }
    </style>
    @stack('scripts')
</body>

</html>

<!-- Page cached by LiteSpeed Cache 6.5.4 on 2025-02-14 19:50:31 -->
