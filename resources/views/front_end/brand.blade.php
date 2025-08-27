@php
    $ver = 126;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo'); 
    $medias = $post->media->all();
    $_medias = collect($medias)->where('type', 'photo')->all();
    $menus = collect($medias)->where('type', 'menu')->all();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    @include('front_end.block.config_seo_header')
    <script>
        window.dataLayer = window.dataLayer || [];
    </script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/plugins/font-awesome/css/font-awesome.min.css') }}?v={{ $ver }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/page.css') }}?v={{ $ver }}">
</head>

<body>
    <div data-app="true" data-server-rendered="true" id="app" class="application theme--light">
        <div class="application--wrap">
            <div class="site">
                <div class="menu-page view">
                    <div class="nav-bar-wrapper"><!----></div><!---->
                    <div class="header-container">
                        <div class="header-overlay d-none d-md-block"
                            style="background:url('{{ convertPathImage('/default_hero_darkbg-ed573d72e69c3d5e1f74427cbada826e.svg') }}') #00a99d center center;">
                        </div>
                        <div class="sticky-header">
                            <div class="navigation sticky-header__wrapper max-width-container flow-fix"><!---->
                                <div class="navigation__list">
                                    <a href="#about"
                                        class="navigation__item">{{ __('config_data.pages.menus.about') }}</a>
                                    {{-- @if (!empty($menus)) --}}
                                    <a href="{{ route('menu', [$post->slug]) }}" class="navigation__item">
                                        {{ __('config_data.pages.menus.menu') }}
                                    </a>
                                    {{-- @endif --}}
                                    <a href="#photo" class="navigation__item">
                                        {{ __('config_data.pages.menus.photo') }}
                                    </a>
                                    <a href="#information" class="navigation__item">
                                        {{ __('config_data.pages.menus.infor') }}
                                    </a>
                                    <a href="#review" class="navigation__item">
                                        {{ __('config_data.pages.menus.review') }}
                                    </a>

                                </div>
                            </div>
                        </div>
                        <header class="header">
                            <div class="max-width-container">
                                <div class="header__wrapper">
                                    <div class="content-asides-offset">
                                        <div class="flow-fix">
                                            <div class="header__logo">
                                                <img width="132px"
                                                    src="{{ getImageThumb($post->thumbnail, 200, 200) }}"
                                                    alt="{{ $post->title }}">
                                            </div>
                                            <div class="header__info">
                                                <h1 class="header__restaurant-name">{{ $post->title }}</h1>

                                                @if (!empty($post->book_detail))
                                                    <div class="header__short-intro"><span
                                                            class="header__primary-cuisines">{{ $post->book_detail }}</span>
                                                    </div>
                                                @endif

                                                <div class="header__restaurant-address">
                                                    <a href="{{ $post->link_map }}" target="_blank"
                                                        rel="nofollow  noopener noreferrer">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        {{ str_replace(['Address', 'address'], '', $post->address) }}
                                                    </a>
                                                </div>

                                                @if (!empty($post->phone))
                                                    <div class="header__restaurant-phone">
                                                        <span class="restaurant-phone">
                                                            <a href="tel:+{{ $post->phone }}"
                                                                rel="nofollow  noopener noreferrer"><i
                                                                    class="fa fa-phone"></i> {{ $post->phone }}</a>
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="navigation header__navigation flow-fix">
                                            <div class="navigation__list">
                                                <a href="#about" data-id="about" {{-- navigation__item_active --}}
                                                    class="navigation__item ">
                                                    {{ __('config_data.pages.menus.about') }}
                                                </a>
                                                {{-- @if (!empty($menus)) --}}
                                                <a href="{{ route('menu', [$post->slug]) }}" data-id="about"
                                                    class="navigation__item ">
                                                    {{ __('config_data.pages.menus.menu') }}
                                                </a>
                                                {{-- @endif --}}

                                                <a href="#photo" data-id="about" class="navigation__item ">
                                                    {{ __('config_data.pages.menus.photo') }}
                                                </a>

                                                <a href="#information" data-id="content" class="navigation__item ">
                                                    {{ __('config_data.pages.menus.infor') }}
                                                </a>

                                                <a href="#review" data-id="about" class="navigation__item ">
                                                    {{ __('config_data.pages.menus.review') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                    </div>

                    <div id="about" class="max-width-container content-asides-offset" >
                        <div class="section__item" >
                            <h3 class="about-restaurant__title-section" >
                                {{ __('config_data.pages.menus.about') }} {{ $post->title }}
                            </h3>
                        </div>
                        <div class="section__item" ><!---->
                            <div class="about-restaurant d-flex" ><!---->
                                <div class="about-restaurant__contacts" >
                                    <ul class="about-restaurant__contacts-list" >
                                        @if (!empty($post->content_about))
                                            <li class="about-restaurant__contacts-item" >
                                                <div id="features">
                                                    {!! $post->content_about !!}
                                                </div>
                                            </li>
                                        @endif

                                        @if (!empty($post->time_open))
                                            <li class="about-restaurant__contacts-item" >
                                                <div id="time_open">
                                                    {!! $post->time_open !!}
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>




                    @if (!empty($_medias))
                        <div id="photo" class="max-width-container content-asides-offset" >
                            <div class="section__item" >
                                <h3 class="about-restaurant__title-section" >
                                    {{ __('config_data.pages.menus.photo') }} {{ $post->title }}
                                </h3>
                            </div>
                            <section class="img-gallery-magnific">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($_medias as $image)
                                    @php
                                        $i++;
                                        if ($i > 6) {
                                            break;
                                        }
                                    @endphp
                                    <div class="magnific-img">
                                        <a class="image-popup-vertical-fit"
                                            href="{{ getImageThumb($image->thumbnail) }}"
                                            title="{{ $post->title . ' ' . $i }}">
                                            {!! getThumbnail($image, 450, 300) !!}
                                        </a>
                                    </div>
                                @endforeach

                            </section>
                        </div>
                    @endif

                    <div id="information" class="max-width-container content-asides-offset flow-fix"><!---->
                        <div class="row no-gutters">
                            <div class="article-content">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>

                    @if ($comments->isNotEmpty())
                        <div id="review" class="box_comment max-width-container content-asides-offset">
                            <hr style="margin: 30px 0px;">
                            <div class="section__item" >
                                <h3 class="about-restaurant__title-section" >
                                    {{ __('config_data.pages.menus.review') }} {{ $post->title }}
                                </h3>
                            </div>
                            <div id="comments_container"
                                class="feature-comment-slides scroll-container clear wrapper_reviews">
                                @foreach ($comments as $comment)
                                    <div class="item-reviews">
                                        <div>
                                            <div class="avatar">
                                                <div class="user_image">
                                                    <span>{{ strtoupper(substr($comment->fullname, 0, 1)) }}</span>
                                                </div>
                                            </div>
                                            <div class="author-info">
                                                <div class="author-name"> <b>{{ $comment->fullname }}</b>
                                                </div>
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
                    @endif

                    <div class="box-wrap clearfix">
                        <div id="review" class="box_comment max-width-container content-asides-offset">
                            <div class="section__item" >
                                <h3 class="about-restaurant__title-section" >
                                    {{ __('config_data.pages.menus.location') }} {{ $post->title }}
                                </h3>
                            </div>
                            <div class="info-box-wrapper clearfix">
                                <div class="box-map">
                                    @if (!empty($post->iframe_map))
                                        <div class="info-box-l-le-map make-right">
                                            <div id="map_canvas" class="map make-right">
                                                {!! getIframeSrcFromString($post->iframe_map) !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($relates->count() > 0)
                        <div class="max-width-container content-asides-offset" style="margin: 10px auto;">
                            <div class="section__item"><!---->
                                <h3 class="about-restaurant__title-section">
                                    {{ __('config_data.pages.post.title_post_relate') }}
                                </h3>
                                <ul class="wrapper_tags clear related_product ">
                                    @foreach ($relates as $item)
                                        <li data-id="9635" class="o_meal">
                                            <div class="item">
                                                <div class="restaurant-card">
                                                    <div class="restaurant-content">
                                                        <div class="restaurant-main-text">
                                                            @php
                                                                $address = explode(' ', trim($post->location));
                                                            @endphp

                                                            <figure> <a
                                                                    href="{{ route('post', ['slug' => $item->slug]) }}"
                                                                    title="{{ $item->title }}"> <img
                                                                        src="{{ getImageThumb($item->thumbnail) }}"
                                                                        loading="lazy" class="img-fluid"
                                                                        alt="{{ $item->title }}"> </a>
                                                            </figure>
                                                            <div class="bus_adress">
                                                                <div style="display: flex; align-items: center;">
                                                                    <h2 class="title-brand-sub"> <a
                                                                            href="{{ route('post', ['slug' => $item->slug]) }}"
                                                                            title="{{ $item->title }}">{{ $item->title }}</a>
                                                                    </h2>
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

                    @include('front_end.layout.footer_page', ['post' => $post])

                </div><!---->
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}?v={{ $ver }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick/slick.css') }}?v={{ $ver }}" />
    <script src="{{ asset('assets/slick/slick/slick.js') }}?v={{ $ver }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('assets/page.js') }}?v={{ $ver }}" type="text/javascript" charset="utf-8"></script>

</body>

</html>
