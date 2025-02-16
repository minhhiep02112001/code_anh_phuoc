@php
    $ver = 126;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $medias = $post->media->all();
    $_medias = collect($medias)->where('type', 'post')->all();
    $menus = collect($medias)->where('type', 'post_menu')->all();
    $banners = collect($medias)->where('type', 'banner')->all();

@endphp
@php
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
@endphp

<!DOCTYPE html>
<html lang="is">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    {{-- @include('front_end.block.config_seo_header') --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('/theme_admin/bower_components/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="/assets_2/css/index.css">
    <script>
        var base_url_domain = '{{ env('APP_URL') }}';
    </script>
    <style>
        .item-banner {
            padding: 3px;
        }

        #content h2 {
            font-weight: 700;
        }

        @media(max-width : 680px) {
            .banner_images {
                margin-top: 80px !important;
            }

            ul.rs.small-list {
                padding: 10px;
            }

            .big-list-item-tit.tt-u.fs-18 {
                font-size: 16px !important;
            }

            .title-edit {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 0;
                display: content;
                width: 168px;
            }
        }
    </style>
</head>

<body class="bg-body container-page">
    <div id="header-full-top" class="section header-full-top fixdiv clearfix">
        <div class="container"
            style="display: flex;
            justify-content: space-between;
            align-items: center;">
            <div class="logo-in make-left">
                <a href="/" class="make-left" title="<?php echo $config_website->meta_title ?? ''; ?>">
                    <i class="icons wiLogo3"
                        style=" background: transparent url('<?php echo getImageThumb($config_website->logo ?? ''); ?>') no-repeat; background-size: 100% 100%;"></i>
                </a>
            </div>
            <div class="menu-top make-right">

                <ul class="rs make-right fs-16 tt-u top-nav-l">
                    <li>
                        <a href="#about"
                            class="navigation__item">{{ __('config_data.pages.menus.about') }}</a>
                    </li>
                    <li>
                        <a href="#menu"
                            class="navigation__item navigation__item_active">{{ __('config_data.pages.menus.menu') }}</a>
                    </li>
                    <li>
                        <a href="#photo"
                            class="navigation__item">{{ __('config_data.pages.menus.photo') }}</a>
                    </li>
                    @if ($comments->count() > 0)
                        <li>

                            <a href="#review"
                                class="navigation__item">{{ __('config_data.pages.menus.review') }}</a>
                        </li>
                    @endif
                    <li>

                        <a href="#information"
                            class="navigation__item">{{ __('config_data.pages.menus.infor') }}</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>

    <div class="header-mobile fixdiv clearfix __web-inspector-hide-shortcut__">
        <div class="row">
            <div class="header__dropdown make-left">
                <a href="javascript:;" class="nav-icons">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <div class="overlay" id="overlay">
                    <nav class="overlay-menu">
                        <ul class="rs fs-25 fw-rb">

                            <li class="overlay-menu-itm border-top">
                                <a href="#about"
                                    class="navigation__item">{{ __('config_data.pages.menus.about') }}</a>
                            </li>
                            <li class="overlay-menu-itm border-top">
                                <a href="#menu"
                                    class="navigation__item navigation__item_active">{{ __('config_data.pages.menus.menu') }}</a>
                            </li>

                            <li class="overlay-menu-itm border-top">
                                <a href="#photo"
                                    class="navigation__item">{{ __('config_data.pages.menus.photo') }}</a>
                            </li>

                            @if ($comments->count() > 0)
                                <li class="overlay-menu-itm border-top">

                                    <a href="#review"
                                        class="navigation__item">{{ __('config_data.pages.menus.review') }}</a>
                                </li>
                            @endif

                            <li class="overlay-menu-itm border-top">

                                <a href="#information"
                                    class="navigation__item">{{ __('config_data.pages.menus.infor') }}</a>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <a href="/" class="header__logo" title="<?php echo $config_website->meta_title ?? ''; ?>">
                <i class="icons wiLogo3"
                    style="margin-top:0px; background: transparent url('<?php echo getImageThumb($config_website->logo ?? ''); ?>') no-repeat; background-size: 100% 100%;"></i>
            </a>
            {{-- <a href="/" class="header__logo">
                {{ $config_website->title ?? '' }}
            </a> --}}
        </div>
    </div>
    <div id="content" class="section content-wrap">
        <div class="container box-wrap-top ">

            @if (!empty($banners))
                <div class=" hot-box-wrap clearfix" itemscope="" itemtype="http://schema.org/ImageGallery"
                    data-pswp-uid="1">

                    <ul class="banner_images">
                        @foreach ($banners as $k => $item)
                            <li>
                                <div class="item-banner">
                                    {!! getThumbnail($item, 400, 500, 'img-item-slide', "{$post->title} banner {$k}") !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="box-wrap hot-box-wrap clearfix pdt30" id="about">
                <div class="box-wrap-content">
                    <div class="rs fs-30 fwb box-title fwb ta-c fc-black">
                        <div class="bd-bottom-center">
                            <h2 class="title-wc"> {{ __('config_data.pages.menus.about') }}
                                {{ $post->title }}</h2>
                        </div>
                    </div>
                    <div class="info-box-wrapper ta-c clearfix fs-18 lh-200">
                        {!! $post->content_about ?? '' !!}
                    </div>
                </div>
            </div>

            <div id="map" class="box-container">
                <div class="  clearfix">
                    <div class="section__item" data-v-f6930fca>
                        <h2 class="about-restaurant__title-section">
                            {{ __('config.config_home.location') }} {{ $post->title }}
                        </h2>
                    </div>
                    <div class="info-box-wrapper clearfix">
                        <div class="box-map">
                            <div class="info-box-r-le make-left">
                                <div class="list-map ss-container" ss-container>


                                    <ul class="rs small-list">
                                        <li data-iframe-map="{{ $post->link_map ?? '' }}"
                                            class="small-list-item record-restaurant">
                                            <div class="div-img make-left">
                                                {!! getThumbnail($post, 90, 90) !!}
                                            </div>

                                            <div class="small-list-info make-left">
                                                <div class="big-list-item-tit tt-u fs-18 fc-white fwb">
                                                    <a class="fs-18" href="#" title="Map" rel="nofollow">
                                                        {{ str_replace(['Address', 'address'], '', $post->address) }}</a>
                                                </div>
                                                <div class="big-list-date">
                                                    <span class="fs-16 clearfix">
                                                        {{ str_replace(['Address', 'address'], '', $post->address) }}</span>
                                                    @if (!empty($post->phone))
                                                        <span
                                                            class="fs-16 clearfix">{{ __('config.config_home.hotline') }}:
                                                            {{ $post->phone }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            @if (!empty($post->iframe_map))
                                <div class="info-box-l-le-map make-right">
                                    <div id="map_canvas" class="map make-right">
                                        <iframe src="{{ getIframeSrcFromString($post->iframe_map) }}" width="100%"
                                            height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            @if (!empty($menus))
                <div id="menu" class="box-container max-width-container content-asides-offset" itemscope=""
                    itemtype="http://schema.org/ImageGallery" data-pswp-uid="1">

                    <div class="section__item" data-v-f6930fca>
                        <h2 class="about-restaurant__title-section" data-v-f6930fca>
                            {{ __('config_data.pages.menus.menu') }} {{ $post->title }}</h2>
                    </div>

                    <div class=" hot-box-wrap clearfix">
                        <ul class="slide-menu">
                            @foreach ($menus as $k => $image)
                                <li>
                                    <div class="item-slide">
                                        <div class="item-banner">
                                            {!! getThumbnail($image, 300, 400, 'img-item-slide', "{$post->title} menu {$k}") !!}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (!empty($_medias))

                <div id="photo" class="box-container max-width-container content-asides-offset" itemscope=""
                    itemtype="http://schema.org/ImageGallery" data-pswp-uid="1">
                    <div class="section__item" data-v-f6930fca>
                        <h2 class="about-restaurant__title-section" data-v-f6930fca>
                            {{ __('config_data.pages.menus.photo') }} {{ $post->title }}</h2>
                    </div>

                    <div class=" hot-box-wrap clearfix">
                        <div class="box-list-photo">
                            <figure class="list-photos">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($_medias as $k => $image)
                                    @php
                                        $i++;
                                        if ($i > 6) {
                                            break;
                                        }
                                    @endphp
                                    <div class="item-img">
                                        {!! getThumbnail($image, 400, 300, 'image-photo', "{$post->title} image {$k}") !!}
                                    </div>
                                @endforeach

                            </figure>
                        </div>
                    </div>
                </div>
            @endif


            @if ($comments->count() > 0)
                <div class="review box-container" id="reviews">
                    <div class="section__item" data-v-f6930fca>
                        <h2 class="about-restaurant__title-section" data-v-f6930fca>
                            {{ __('config_data.pages.menus.review') }} {{ $post->title }}</h2>
                    </div>
                    <div class="container">
                        <div class="list_review">
                            <div class="data-review">
                                @foreach ($comments as $comment)
                                    <div class="item-reviews">
                                        <div style="display: flex;align-items: center;">
                                            <div class="avatar">
                                                <div class="user_image">
                                                    <span>{{ strtoupper(substr($comment->fullname, 0, 1)) }}</span>
                                                </div>
                                            </div>
                                            <div class="author-info">
                                                <div class="author-name"> <b>{{ $comment->fullname }}</b> </div>
                                            </div>
                                        </div>
                                        <div class="rating_review">
                                            <div class="list-rate"><svg width="20" height="20"
                                                    viewBox="0 0 20 20">
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M0 4C0 1.79086 1.79086 0 4 0H10V20H4C1.79086 20 0 18.2091 0 16V4Z">
                                                    </path>
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M20 4C20 1.79086 18.2091 0 16 0H10V20H16C18.2091 20 20 18.2091 20 16V4Z">
                                                    </path>
                                                    <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10 13.3736L12.5949 14.7111C12.7378 14.7848 12.9006 14.8106 13.0593 14.7847C13.4681 14.718 13.7454 14.3325 13.6787 13.9237L13.2085 11.0425L15.2824 8.98796C15.3967 8.8748 15.4715 8.72792 15.4959 8.569C15.5588 8.15958 15.2779 7.77672 14.8685 7.71384L11.983 7.2707L10.6699 4.66338C10.5975 4.51978 10.481 4.40322 10.3374 4.33089C9.96742 4.14458 9.51648 4.29344 9.33017 4.66338L8.01705 7.2707L5.13157 7.71384C4.97265 7.73825 4.82577 7.81309 4.71261 7.92731C4.42109 8.22158 4.42332 8.69645 4.71759 8.98796L6.79152 11.0425L6.32131 13.9237C6.29541 14.0824 6.3212 14.2452 6.39486 14.3881C6.58464 14.7563 7.03696 14.9009 7.40514 14.7111L10 13.3736Z">
                                                    </path>
                                                </svg><svg width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M0 4C0 1.79086 1.79086 0 4 0H10V20H4C1.79086 20 0 18.2091 0 16V4Z">
                                                    </path>
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M20 4C20 1.79086 18.2091 0 16 0H10V20H16C18.2091 20 20 18.2091 20 16V4Z">
                                                    </path>
                                                    <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10 13.3736L12.5949 14.7111C12.7378 14.7848 12.9006 14.8106 13.0593 14.7847C13.4681 14.718 13.7454 14.3325 13.6787 13.9237L13.2085 11.0425L15.2824 8.98796C15.3967 8.8748 15.4715 8.72792 15.4959 8.569C15.5588 8.15958 15.2779 7.77672 14.8685 7.71384L11.983 7.2707L10.6699 4.66338C10.5975 4.51978 10.481 4.40322 10.3374 4.33089C9.96742 4.14458 9.51648 4.29344 9.33017 4.66338L8.01705 7.2707L5.13157 7.71384C4.97265 7.73825 4.82577 7.81309 4.71261 7.92731C4.42109 8.22158 4.42332 8.69645 4.71759 8.98796L6.79152 11.0425L6.32131 13.9237C6.29541 14.0824 6.3212 14.2452 6.39486 14.3881C6.58464 14.7563 7.03696 14.9009 7.40514 14.7111L10 13.3736Z">
                                                    </path>
                                                </svg><svg width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M0 4C0 1.79086 1.79086 0 4 0H10V20H4C1.79086 20 0 18.2091 0 16V4Z">
                                                    </path>
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M20 4C20 1.79086 18.2091 0 16 0H10V20H16C18.2091 20 20 18.2091 20 16V4Z">
                                                    </path>
                                                    <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10 13.3736L12.5949 14.7111C12.7378 14.7848 12.9006 14.8106 13.0593 14.7847C13.4681 14.718 13.7454 14.3325 13.6787 13.9237L13.2085 11.0425L15.2824 8.98796C15.3967 8.8748 15.4715 8.72792 15.4959 8.569C15.5588 8.15958 15.2779 7.77672 14.8685 7.71384L11.983 7.2707L10.6699 4.66338C10.5975 4.51978 10.481 4.40322 10.3374 4.33089C9.96742 4.14458 9.51648 4.29344 9.33017 4.66338L8.01705 7.2707L5.13157 7.71384C4.97265 7.73825 4.82577 7.81309 4.71261 7.92731C4.42109 8.22158 4.42332 8.69645 4.71759 8.98796L6.79152 11.0425L6.32131 13.9237C6.29541 14.0824 6.3212 14.2452 6.39486 14.3881C6.58464 14.7563 7.03696 14.9009 7.40514 14.7111L10 13.3736Z">
                                                    </path>
                                                </svg><svg width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M0 4C0 1.79086 1.79086 0 4 0H10V20H4C1.79086 20 0 18.2091 0 16V4Z">
                                                    </path>
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M20 4C20 1.79086 18.2091 0 16 0H10V20H16C18.2091 20 20 18.2091 20 16V4Z">
                                                    </path>
                                                    <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10 13.3736L12.5949 14.7111C12.7378 14.7848 12.9006 14.8106 13.0593 14.7847C13.4681 14.718 13.7454 14.3325 13.6787 13.9237L13.2085 11.0425L15.2824 8.98796C15.3967 8.8748 15.4715 8.72792 15.4959 8.569C15.5588 8.15958 15.2779 7.77672 14.8685 7.71384L11.983 7.2707L10.6699 4.66338C10.5975 4.51978 10.481 4.40322 10.3374 4.33089C9.96742 4.14458 9.51648 4.29344 9.33017 4.66338L8.01705 7.2707L5.13157 7.71384C4.97265 7.73825 4.82577 7.81309 4.71261 7.92731C4.42109 8.22158 4.42332 8.69645 4.71759 8.98796L6.79152 11.0425L6.32131 13.9237C6.29541 14.0824 6.3212 14.2452 6.39486 14.3881C6.58464 14.7563 7.03696 14.9009 7.40514 14.7111L10 13.3736Z">
                                                    </path>
                                                </svg><svg width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M0 4C0 1.79086 1.79086 0 4 0H10V20H4C1.79086 20 0 18.2091 0 16V4Z">
                                                    </path>
                                                    <path fill="rgba(255,100,61,1)" opacity="1"
                                                        d="M20 4C20 1.79086 18.2091 0 16 0H10V20H16C18.2091 20 20 18.2091 20 16V4Z">
                                                    </path>
                                                    <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10 13.3736L12.5949 14.7111C12.7378 14.7848 12.9006 14.8106 13.0593 14.7847C13.4681 14.718 13.7454 14.3325 13.6787 13.9237L13.2085 11.0425L15.2824 8.98796C15.3967 8.8748 15.4715 8.72792 15.4959 8.569C15.5588 8.15958 15.2779 7.77672 14.8685 7.71384L11.983 7.2707L10.6699 4.66338C10.5975 4.51978 10.481 4.40322 10.3374 4.33089C9.96742 4.14458 9.51648 4.29344 9.33017 4.66338L8.01705 7.2707L5.13157 7.71384C4.97265 7.73825 4.82577 7.81309 4.71261 7.92731C4.42109 8.22158 4.42332 8.69645 4.71759 8.98796L6.79152 11.0425L6.32131 13.9237C6.29541 14.0824 6.3212 14.2452 6.39486 14.3881C6.58464 14.7563 7.03696 14.9009 7.40514 14.7111L10 13.3736Z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                        <div class="content-review">
                                            <p> {!! $comment->content !!} </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <div id="information" class="box-container">
                <div class="  hot-box-wrap clearfix ">
                    <div class="box-wrap-content">
                        <div class="rs fs-30 fwb box-title fwb fc-black">
                            <div class="bd-bottom-center">
                                <h1 class="title-wc">{{ $post->title }}</h1>
                            </div>
                        </div>
                        <div class="info-box-wrapper content clearfix fs-18 lh-200">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </div>

            @if ($relates->count() > 0)
                <div class="box-container content-asides-offset" style="margin: 10px auto;">

                    <div class="section__item"><!---->
                        <h3 class="about-restaurant__title-section">{{ __('config_data.pages.menus.menu') }}:
                        </h3>
                        <ul class="wrapper_tags clear related_product ">
                            @foreach ($relates as $item)
                                <li data-id="9635" class="o_meal">
                                    <div class="item">
                                        <div class="restaurant-card">
                                            <div class="restaurant-content">
                                                <div class="restaurant-main-text">
                                                    @php
                                                        $address = explode(' ', trim($post->address));
                                                    @endphp

                                                    <figure><a href="{{ route('post', ['slug' => $item->slug]) }}"
                                                            title="{{ $item->title }}"> <img
                                                                src="{{ getImageThumb($item->thumbnail) }}"
                                                                loading="lazy" class="img-fluid"
                                                                alt="{{ $item->title }}"> </a>
                                                        {{ count($address) > 0 ? '<small>' . $address[count($address) - 1] . '</small>' : '' }}
                                                    </figure>
                                                    <div class="bus_adress">
                                                        <div style="display: flex; align-items: center;">
                                                            <h4 class="title-brand-sub"> <a
                                                                    href="{{ route('post', ['slug' => $item->slug]) }}"
                                                                    title="{{ $item->title }}">{{ $item->title }}</a>
                                                            </h4>
                                                        </div> <span
                                                            class="address">{{ str_replace(['Address', 'address'], '', $post->address) }}</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div id="footer-full" class="footer-full section clearfix">
        <div class="footer-t-le footer-t2 clearfix">
            <div class="container clearfix">
                <div class="footer-tcol footer-tl make-left margin-lf40">
                    <h3><span class="text-logo">{{ ucfirst($post->title) }}</span></h3>
                    <div class="content-footer">
                        <div> {!! $post->content_footer !!}</div>
                        <ul>
                            <li>{{ __('config_data.setting.address') }}:
                                {{ str_replace(['Address', 'address'], '', $post->address) }}
                            </li>
                            <li>{{ __('config_data.setting.phone') }}: {{ $post->phone }}</li>
                        </ul>
                    </div>

                </div>

                @if (!empty($post->iframe_map))
                    <div class="info-box-l-le-map make-right">
                        <div id="map_canvas" class="map make-right" style="max-height:280px;">
                            <iframe src="{{ getIframeSrcFromString($post->iframe_map) }}" width="100%"
                                height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                @endif

            </div>
            <div class="footer-tcol-full entry-head"><a href="{{ url('/') }}" title="Suggest an edit">
                    <svg width="40" height="40" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor" transform="rotate(0)"
                        stroke-width="0.00024000000000000003">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                            stroke="#CCCCCC" stroke-width="0.768"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z"
                                fill="currentColor"></path>
                        </g>
                    </svg>
                    <strong class="title-edit">{{ __('config_data.pages.post.title_footer_end') }}</strong>
                </a>
                <p class="footer-note">{{ __('config_data.pages.post.des_footer_end') }}</p>
            </div>
        </div>
    </div>

    <style>
        /* Tổng quan slick-dots */
        .slick-dots {
            position: absolute;
            bottom: 10px;
            /* Khoảng cách từ dưới lên, tuỳ chỉnh */
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 0;
            z-index: 10;
        }

        /* Từng chấm (dot) */
        .slick-dots li {
            margin: 0 5px;
            /* Khoảng cách giữa các chấm */
        }

        /* Hình dạng chấm */
        .slick-dots li button {
            border: none;
            background-color: #ccc;
            /* Màu mặc định */
            width: 10px;
            height: 10px;
            border-radius: 50%;
            /* Bo tròn thành hình tròn */
            cursor: pointer;
            padding: 0;
        }

        /* Trạng thái khi được chọn */
        .slick-dots li.slick-active button {
            background-color: #000;
            /* Màu chấm khi đang active */
        }

        .slick-dots li button:before {
            content: '' !important;
        }

        .slick-dots li.slick-active button:before {
            background: none !important;
        }
    </style>
    <script type="text/javascript" src="{{ asset('assets_2/js/app.js') }}"></script>
    <script>
        $('.banner_images').slick({
            slidesToShow: 3, // Hiển thị 3 hình trên 1 màn
            slidesToScroll: 3, // Lướt 3 hình mỗi lần
            infinite: true, // Vòng lặp (nếu muốn)
            dots: true, // Hiển thị dot (tuỳ chọn)
            arrows: true, // Hiển thị mũi tên điều hướng (tuỳ chọn)
            autoplay: false, // Tự động chạy (tuỳ chọn)
            speed: 500, // Tốc độ lướt (ms),

            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3, // Hiển thị 3 hình trên 1 màn
                        slidesToScroll: 3, // Lướt 3 hình mỗi lần 
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2, // Hiển thị 3 hình trên 1 màn
                        slidesToScroll: 2, // Lướt 3 hình mỗi lần 
                    }
                }
            ]
        });

        $(".variable , .slide-menu").slick({

            infinite: true,
            autoplay: true,
            dots: true,
            autoplaySpeed: 5000,
            slidesToScroll: 1,
            slidesToShow: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4, // Hiển thị 3 slide trên desktop
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        infinite: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        infinite: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
                // Bạn có thể thêm settings: "unslick" ở một breakpoint để tắt slick tại breakpoint đó
            ]
        });
        $(".related_product").slick({
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToScroll: 1,
            slidesToShow: 5,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5, // Hiển thị 3 slide trên desktop
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // Bạn có thể thêm settings: "unslick" ở một breakpoint để tắt slick tại breakpoint đó
            ]
        });
        document.addEventListener("DOMContentLoaded", function() {
            // Lấy ngày hiện tại (0 là Chủ nhật, 1 là Thứ Hai, ..., 6 là Thứ Bảy)
            const today = new Date().getDay();

            // Chuyển đổi để phù hợp với thứ tự trong bảng
            const dayMap = {
                0: 6, // Chủ nhật
                1: 0, // Thứ Hai
                2: 1, // Thứ Ba
                3: 2, // Thứ Tư
                4: 3, // Thứ Năm
                5: 4, // Thứ Sáu
                6: 5 // Thứ Bảy
            };

            // Xác định hàng cần kích hoạt
            const activeRowIndex = dayMap[today];

            // Lấy tất cả các hàng <tr> trong bảng
            const rows = document.querySelectorAll(".schedule-table tbody tr");
            $(".schedule-table tbody tr td").removeClass('current-day')
            // Thêm lớp "current-day" vào hàng tương ứng
            if (rows[activeRowIndex]) {
                const dayCell = rows[activeRowIndex].querySelectorAll("td");
                if (dayCell[0]) dayCell[0].classList.add("current-day"); // Thêm vào ô ngày
                if (dayCell[1]) dayCell[1].classList.add("current-day"); // Thêm vào ô giờ
            }
        });
    </script>
</body>

</html>
