@php 
    $config_website = getValueSetting('config_website');
    $v = 3;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $language->lang ?? app()->getLocale()) }}" dir="ltr"></html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('front_end.block.config_seo_header')
    <link rel="stylesheet" href="/theme/css/index.css?v={{ $v }}">
    <script>
        var base_url_domain = '{{ env('APP_URL') }}';
    </script>
    <style>
        .header-full-top,
        .footer-t-le,
        .header-mobile,
        .button-link {
            background: #346157;
        }

        .header-mobile .overlay-menu-itm .active {
            background-color: #346157 !important;
        }

        .header-mobile .nav-icons>span {
            background: #d71a21;
        }

        .top-nav-l>li>a.current {
            border-bottom: 2px solid #d71a21;
        }

        .top-nav-l>li:hover>a {
            border-bottom: 2px solid #d71a21;
        }

        .box-title .bd-bottom::after,
        .list-item-menu .itm-menu-max .itm-menu-title::after {
            border: 2px solid #0e0e0e;
        }

        .title_form_review strong {
            color: #0e0e0e;
        }

        #news_content a {
            color: #0e0e0e;
            text-decoration: underline;
        }

        .info-box-wrapper a {
            color: #0e0e0e;
            font-weight: bold;
            text-decoration: underline;
        }

        .top-nav-l>li>a,
        .top-nav-r a {
            color: #fff;
        }

        .wiLogo3 {
            margin-top: -20px;
        }

        .logo-in {
            width: 350px;
            height: 70px;
            padding-top: 30px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .header__logo {
            left: 50%;
            top: 13px;
            margin-left: -68px;
            width: 330px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #content .box-wrap-content .bd-bottom-center {
            height: auto;
        }
    </style>

    {!! $post->config_color ?? '' !!}

    @if (!empty($post->schema))
        {!! $post->schema ?? '' !!}
    @endif

</head>

<body class="bg-body container-page">
    @include('theme_brand.theme.layout.header')
    <div class="fixDixBank clearfix"></div>
    <div id="content" class="section content-wrap">
        @yield('content')
    </div>
    @include('theme_brand.theme.layout.footer')
    <script type="text/javascript" src="{{ asset('theme/js/app.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Hàm cuộn đến phần tử với id nằm giữa màn hình
            function scrollToElementInCenter(id) {
                const target = document.getElementById(id);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth', // Cuộn mượt mà
                        block: 'center' // Đưa phần tử vào giữa màn hình
                    });
                }
            }

            // Kiểm tra hash trong URL khi trang được tải
            if (window.location.hash) {
                const id = window.location.hash.substring(1); // Loại bỏ dấu # và lấy id
                scrollToElementInCenter(id);
            }

            // Theo dõi sự kiện thay đổi hash
            window.addEventListener('hashchange', () => {
                const id = window.location.hash.substring(1);
                scrollToElementInCenter(id);
            });
        });
    </script>

    @yield('scripts')
</body>

</html>
