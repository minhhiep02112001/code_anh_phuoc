@php
    $config_website = getValueSetting('config_website');
    $config_home = getValueSetting('config_home');
@endphp
@extends('theme_brand.theme._index')
@section('content')
    <style>
        body {
            background-color: #fff !important;
        }
    </style>
    <div class="container">
        <div id="banner" class="box-wrap-top hot-box-wrap clearfix">
            <ul class="rs feature-slides">
                <li>
                    <div class="item-slide">
                        <div class="item-banner">
                            <img class="img-item-slide" src="{{ getImageThumb($post->thumbnail) }}" alt="{{ $post->title }}"
                                width="100%">
                            <div class="content-banner">
                                <div class="item-content-banner">
                                    <h1>{{ $post->title }}</h1>
                                    <a href="{{ $post->link_redirect }}" target="{{ $post->target }}"
                                        class="btn btn--primary">
                                        {{ __('config_data.pages.brand.banner_button_view_menu') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        <div class="box-wrap hot-box-wrap clearfix pdt30" id="about">
            <div class="box-wrap-content">
                <div class="rs fs-30 fwb box-title fwb ta-c fc-black">
                    <div class="bd-bottom-center">
                        <h2 class="title-wc">
                            {{ __('config_data.pages.brand.about_welcome', ['name' => $post->title]) }}
                        </h2>
                    </div>
                </div>
                <div class="info-box-wrapper ta-c clearfix fs-18 lh-200">
                    {!! $post->content_about !!}
                </div>
            </div>
        </div>
        @if (!empty($comments) && $comments->count() > 0)
            <div class="title_review" id="reviews" style="text-align: center; margin-bottom:10px;">
                <h2 class="title-wc">{{ __('config_data.pages.brand.title_review') }}</h2>
            </div>
            <div class="testimonial mySwiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                <div class="testi-content feature-comment-slides" id="swiper-wrapper-194d5dd3a08b2c310"
                    style="cursor: grab;">
                    @foreach ($comments as $review)
                        <div class="" role="group">
                            <img src="{{ !empty($review->thumbnail) ? $review->thumbnail : '/images/boy.png' }}"
                                alt="{{ $review->fullname }}" class="image" style="margin:0 auto;">
                            <div class="details">
                                <span class="name text-center">{{ $review->fullname }}</span>
                                <div class="rating_review text-center">
                                    <div class="list-rate"><svg width="20" height="20" viewBox="0 0 20 20">
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
                            </div>
                            <p class="line-2 text-center">{!! $review->content !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="box-wrap clearfix" id="locations">
            <div class="rs fs-30 box-title tt-u fwb fc-black">
                <h2 class="title-wc">{{ __('config_data.pages.brand.location') }}</h2>
            </div>
            <div class="info-box-wrapper clearfix">
                <div class="box-map">
                    <div class="info-box-r-le make-left">
                        <div class="list-map ss-container" ss-container>
                            <ul class="rs small-list">
                                <li class="small-list-item record-restaurant">
                                    <div class="div-img make-left">
                                        {!! getThumbnailImg($post->favicon ?? ($config_website->favicon ?? ''), 150, 150) !!}
                                    </div>
                                    <div class="small-list-info make-left">
                                        <div class="big-list-item-tit tt-u fs-18 fc-white fwb">
                                            <a class="fs-18" target="_blank" rel="nofollow"
                                                href="{{ $post->link_map ?? '' }}" title="Map">
                                                {{ $post->address ?? '' }} </a>
                                        </div>
                                        <div class="big-list-date">
                                            <span class="fs-16 clearfix">
                                                {{ $post->address ?? '' }}
                                            </span>
                                            <span class="fs-16 clearfix">{{ __('config_data.config_home.hotline') }}:
                                                {{ $post->phone ?? '' }}
                                            </span>
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
                                {!! getIframeSrcFromString($post->iframe_map) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="box-wrap clearfix" id="information">
            <div class="info-box-wrapper clearfix">
                <div class="content-main">
                    {!! $post->content ?? '' !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <style>
        .feature-slides .item-slide {
            position: relative;
            width: 100%;
            height: 100vh;
            /* Fullscreen height */
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000;
            /* Default background in case image fails */
            overflow: hidden;
        }

        .feature-slides .item-banner {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .feature-slides .img-item-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Đảm bảo ảnh hiển thị đầy đủ, không bị méo */
            z-index: 1;
        }

        .feature-slides .content-banner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            /* Hiệu ứng làm mờ nền */
        }

        .feature-slides .item-content-banner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 3;
        }

        .feature-slides .content-banner h1 {
            font-size: 48px !important;
            margin-bottom: 20px;
            font-weight: bold;
            color: #fff !important;
            text-transform: uppercase;
        }

        .feature-slides .content-banner .des {
            font-size: 16px;
            margin-bottom: 20px;
            color: #ddd;
        }

        .feature-slides .content-banner .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            color: white;
            background: #e74c3c;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .feature-slides .content-banner .btn:hover {
            background: #c0392b;
            color: #fff;
        }


        /* Responsive cho màn hình mobile */
        @media (max-width: 768px) {

            .feature-slides .item-content-banner {
                width: 100%;
                padding: 15px;
            }

            .feature-slides .content-banner h1 {
                font-size: 28px !important;
                /* Giảm kích thước tiêu đề */
            }

            .feature-slides .content-banner .des {
                font-size: 14px !important;
                /* Giảm kích thước mô tả */
            }

            .feature-slides .content-banner .btn {
                padding: 8px 16px;
                /* Giảm kích thước nút */
                font-size: 14px;
            }
        }

        /* Responsive cho màn hình rất nhỏ (dưới 480px) */
        @media (max-width: 480px) {
            .feature-slides .content-banner h1 {
                font-size: 22px !important;
                /* Kích thước tiêu đề nhỏ hơn nữa */
            }

            .feature-slides .content-banner .des {
                font-size: 13px !important;
            }

            .feature-slides .content-banner .btn {
                font-size: 12px;
                padding: 6px 12px;
            }
        }
    </style>

    <script></script>
@endsection
