@php
    $ver = 126;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');

    $medias = $post->media->all(); 
    $menus = collect($medias)->where('type', 'menu')->all();

@endphp

<!DOCTYPE html>
<html lang="fr">

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
                        {{-- <div class="sticky-header">
                            <div class="navigation sticky-header__wrapper max-width-container flow-fix"><!---->
                                <div class="navigation__list">
                                    <a href="#about"
                                        class="navigation__item">{{ __('config_data.pages.menus.about') }}</a>
                                    <a href="#menu" class="navigation__item navigation__item_active">
                                        {{ __('config_data.pages.menus.menu') }}
                                    </a>
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
                        </div> --}}
                        <header class="header">
                            <div class="max-width-container">
                                <div class="header__wrapper">
                                    <div class="content-asides-offset">
                                        <div class="flow-fix">
                                            <div class="header__logo">
                                                <a href="{{ route('post', [$post->slug]) }}">
                                                    <img width="132px"
                                                        src="{{ getImageThumb($post->thumbnail, 200, 200) }}"
                                                        alt="Le Baratin Menu">
                                                </a>
                                            </div>
                                            <div class="header__info">
                                                <h1 class="header__restaurant-name">
                                                    {{ __('config_data.pages.menus.menu') }}
                                                    {{ $post->title }}</h1>

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

                                    </div>
                                </div>
                            </div>
                        </header>
                    </div>

                    @if (!empty($menus))
                        <div id="menu" class="max-width-container content-asides-offset" data-v-f6930fca style="margin-top: 40px; ">
                            <div class="section__item" data-v-f6930fca><!---->
                                <section class="img-gallery-magnific">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($menus as $image) 
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
                        </div>
                    @endif

                    <div id="information" class="max-width-container content-asides-offset flow-fix"><!---->
                        <div class="row no-gutters">
                            <div class="article-content">
                                {!! $post->content_menu !!}
                            </div>
                        </div>
                    </div>

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
