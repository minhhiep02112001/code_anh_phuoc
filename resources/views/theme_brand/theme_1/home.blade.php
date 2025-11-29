@php
    $config_website = getValueSetting('config_website');
    $config_home = getValueSetting('config_home');
@endphp
@php
    $ver = 1368;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $config_home = getValueSetting('config_home');
    $menus = getMenuParent(0);
@endphp
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7"  lang="en" dir="ltr"><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"  lang="en" dir="ltr"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"  lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="lt-ie9"  lang="en" dir="ltr"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!-->
<html lang="{{ str_replace('_', '-', $language->lang ?? app()->getLocale()) }}" dir="ltr">
<!--<![endif]-->

<head>
    <meta name="uri-translation" content="on" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />


    <!-- Page hiding snippet (recommended)  -->
    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>

    @include('front_end.block.config_seo_header')
    <link rel="stylesheet" href="{{ asset('/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="/assets/css/theme_1.home.css?v={{ $ver }}"> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write(
            "<script src='/sites/all/modules/contrib/jquery_update/replace/jquery/1.10/jquery.min.js'>\x3C/script>")
        document.createElement("picture");
    </script>
    <script src="/js/file_1.js"></script>
    <script src="/js/file_2.js"></script>
    <script src="/js/file_3.js"></script>



    <style>
        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap
        }

        .no-gutters,
        .row {
            margin-right: 0;
            margin-left: 0
        }

        .no-gutters>.col,
        .no-gutters>[class*=col-] {
            padding-right: 0;
            padding-left: 0
        }

        .col,
        .col-1,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-10,
        .col-11,
        .col-12,
        .col-auto,
        .col-md,
        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md-auto,
        .col-sm,
        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%
        }

        .col-1 {
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%
        }

        .col-1,
        .col-2 {
            -webkit-box-flex: 0
        }

        .col-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .col-3,
        .col-4 {
            -webkit-box-flex: 0
        }

        .col-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .col-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%
        }

        .col-5,
        .col-6 {
            -webkit-box-flex: 0
        }

        .col-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .col-7 {
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%
        }

        .col-7,
        .col-8 {
            -webkit-box-flex: 0
        }

        .col-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%
        }

        .col-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%
        }

        .col-9,
        .col-10 {
            -webkit-box-flex: 0
        }

        .col-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%
        }

        .col-11 {
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%
        }

        .col-11,
        .col-12 {
            -webkit-box-flex: 0
        }

        .col-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

        @media (min-width: 576px) {
            .col-sm {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%
            }

            .col-sm-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%
            }

            .col-sm-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%
            }

            .col-sm-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }

            .col-sm-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%
            }

            .col-sm-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%
            }

            .col-sm-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .col-sm-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%
            }

            .col-sm-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }

            .col-sm-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%
            }

            .col-sm-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%
            }

            .col-sm-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%
            }

            .col-sm-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }
        }

        @media (min-width: 769px) {
            .col-md {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%
            }

            .col-md-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%
            }

            .col-md-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%
            }

            .col-md-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }

            .col-md-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%
            }

            .col-md-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%
            }

            .col-md-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .col-md-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%
            }

            .col-md-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }

            .col-md-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%
            }

            .col-md-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%
            }

            .col-md-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%
            }

            .col-md-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }
        }

        @media (min-width: 992px) {
            .col-lg-2 {
                flex: 0 0 auto;
                width: 16.66666667%;
            }
        }

        .d-none {
            display: none !important
        }

        .d-block {
            display: block !important
        }

        .d-flex {
            display: -ms-flexbox !important;
            display: flex !important
        }

        @media (min-width: 769px) {
            .d-md-none {
                display: none !important
            }

            .d-md-block {
                display: block !important
            }
        }

        .flex-nowrap {
            -ms-flex-wrap: nowrap !important;
            flex-wrap: nowrap !important
        }

        .justify-content-between {
            -ms-flex-pack: justify !important;
            justify-content: space-between !important
        }

        @media (min-width: 576px) {
            .flex-sm-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }
        }

        .align-items-center {
            -ms-flex-align: center !important;
            align-items: center !important
        }

        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important
        }

        .explore-block .image {
            position: relative;
            overflow: hidden;
            margin-bottom: 0;
        }

        .explore-block .inner-box {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
        }

        .explore-block .overlay-box {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
        }

        .explore-block {
            position: relative;
            margin-bottom: 30px;
        }

        .explore-block .overlay-box h3 {
            font-size: 18px;
            color: #fff;
            font-weight: 500;
            display: block;
            margin-bottom: 3px;
        }

        .explore-block .overlay-box .content {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 30px 30px 25px;
            z-index: 9;
        }

        .overlay-link {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            z-index: 9;
        }

        .explore-block .overlay-box:before {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255, 0)), to(#1b2032));
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0, #1b2032 100%);
            content: "";
        }

        .listing-block {
            position: relative;
            margin-bottom: 30px;
        }

        .listing-block .inner-box {
            position: relative;
            background-color: #e3e3e3;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 4px rgba(0, 0, 0, .09);
        }

        .listing-block .image-box {
            position: relative;
        }

        figure {
            margin: 0 0 1rem;
        }

        .listing-block .image img {
            width: 420px !important;
            height: 220px !important;
            object-fit: cover;
        }

        .image-box img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .listing-block .lower-content {
            min-height: 130px;
            position: relative;
            padding: 10px;
            z-index: 2;
        }

        .listing-block h3 {
            position: relative;
            font-size: 18px;
            line-height: 1.2em;
            color: #1b2032;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .listing-block .text {
            position: relative;
            margin-bottom: 10px;
        }

        .text {
            font-size: 16px;
            line-height: normal;
            color: #5c6770;
            font-weight: 400;
            margin: 0;
        }

        #footer .row {
            max-width: 1100px;
            margin: 20px auto 0px;
            width: calc(100% - (16px * 2));
        }

        footer .title {
            white-space: nowrap;
        }

        .FooterLinks_socialIcon__MdMqQ svg {
            transform: rotate(-45deg);
            width: 20px;
        }

        .FooterLinks_socialIcon__MdMqQ {
            block-size: 20px;
        }

        ul li.title p {
            font-weight: 600;
        }

        ul li a {
            color: #0d1619;
            text-decoration: none;
        }

        #footer p.font-default-body-s-regular {
            margin-bottom: 1rem;
            font-family: sans-serif;
        }

        .title-brand {
            font-size: 22px;
            text-decoration: none;
            color: black;
        }

        ._-wKyRQ.rfrdHQ {
            color: #0d1619;
        }

        #footer ul {
            padding-left: 2rem;
        }

        footer ul {
            list-style: none;
            color: #0d1619;
        }

        #footer {
            padding-top: 20px
        }

        @media (min-width: 992px) {
            .front .bg {
                padding: 2em 0 6em;
            }
        }

        #menu_mb {
            display: none !important;
            position: fixed;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 1000000;
            background: #333;
            right: 0px;
        }

        #menu_mb {
            position: fixed;

            z-index: 10000;
            pointer-events: none;
            /* ẩn thì không bắt sự kiện */
        }

        /* overlay mờ */
        #menu_mb::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            opacity: 0;
            transition: opacity .28s ease;
        }

        /* panel menu (chính là ul.menu hiện có) */
        #menu_mb .menu {
            position: relative;

            width: 100%;
            height: 100%;
            /* hoặc 85vw nếu muốn linh hoạt */

            padding-top: 40px;
            list-style: none;
            overflow-y: auto;
            background: #2c2e33;
        }

        /* khi mở */
        #menu_mb.show {
            pointer-events: auto;
        }

        #menu_mb.show::before {
            opacity: 1;
        }

        #menu_mb.show .menu {
            transform: translateX(0);
        }

        /* ========= Item & Link ========= */
        #menu_mb .menu__item {
            margin: 0;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        #menu_mb .menu__item:last-child {
            border-bottom: 0;
        }

        #menu_mb .menu__link {
            display: block;
            padding: 14px 16px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            line-height: 1.2;
        }

        #menu_mb .menu__link:hover {
            background: #b794940f;
        }

        /* trạng thái active */
        #menu_mb .menu__item.active>.menu__link,
        #menu_mb .is-active>.menu__link {
            color: #ffd166;
        }

        /* ========= Submenu (nếu có ul.menu lồng nhau) ========= */
        #menu_mb .menu .menu {
            position: static;
            width: auto;
            max-height: 0;
            overflow: hidden;
            margin: 0;
            background: #23252a;
            border-left: 3px solid rgba(255, 255, 255, .06);
            transition: max-height .25s ease;
        }

        #menu_mb .menu__item.open>.menu {
            max-height: 600px;
        }

        /* hoặc giá trị lớn hơn */

        /* ========= Nút đóng (nếu bạn thêm .menu_mb__close trong #menu_mb) ========= */
        #menu_mb .menu_mb__close {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2c2e33;
            color: #fff;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .3);
            cursor: pointer;
        }

        @media (max-width: 760px) {
            #menu_mb.show {
                display: block !important;
            }

            #menu_mb.hide {
                display: none !important;
            }
        }

        .block__title {
            font-size: 3.4rem;
        }
    </style>
</head>

<body
    class="fyp-theme html front not-logged-in no-sidebars page-node page-node- page-node-2 node-type-page landing-page has-image no-image">

    <div id="page" class="page">

        <header class="header clearfix" id="header" role="banner">
            <div id="region-header" class="region-header clearfix">
                <div class="site-logo">
                    <a href="/" title="{{ $config_website->website ?? '' }}"
                        class="site-logo__link site-logo__link-english" rel="home">

                        <div class="element-invisible">{{ $config_website->website ?? '' }}</div>

                        <img id="image_logo" src="{{ convertPathImage($config_website->logo ?? '') }}"
                            alt="{{ $config_website->website ?? '' }}">
                    </a>
                </div>


                <button class="menu-toggle">
                    <span class="open"><span class="element-invisible">Open the </span>Menu</span>
                    <span class="close">Close<span class="element-invisible"> the Menu</span></span>
                </button>
                <section class="region-header--blocks">
                    <div id="block-menu-block-1"
                        class="block header-menu main-menu float-menu block__menu-block block__menu-block-1 menu-block first odd"
                        role="navigation">
                        <div class="menu-block-wrapper menu-block-1 menu-name-main-menu parent-mlid-0 menu-level-1">
                            <ul class="menu">
                                @foreach ($menus as $menu)
                                    <li class="menu__item is-leaf first leaf menu-mlid-18681">
                                        <a href="{{ $menu->link }}" title="{{ $menu->title }}"
                                            class="menu__link">{{ $menu->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
            </div>

        </header>

        <main id="main" class="clearfix">
            <div id="preface" class="region__preface region-preface preface clearfix"
                style="background-image: url('{{ convertPathImage($config_home->banner ?? '') }}')">
                <span class="preface-inner-wrap">
                    <span>
                        <div id="block-block-2" class="block block__block block__block-2 block first odd">
                            <h1>{!! $config_home->title_home ?? '' !!}</h1>
                        </div>
                        <div id="block-views-exp-your-parks-page-1"
                            class="block block__views block__views--exp-your-parks-page-1 views even">

                            <div>
                                <div class="views-exposed-form">
                                    <div class="views-exposed-widgets clearfix">
                                        <div id="edit-field-activities-1-wrapper"
                                            class="views-exposed-widget views-widget-filter-field_activities_1">
                                            <label for="edit-field-activities-1">
                                                Filter by Activity... </label>
                                            <div class="views-widget">
                                                <div class="form-item form-type-select form-item-field-activities-1">
                                                    <select id="edit-field-activities-1" name="field_activities_1"
                                                        class="form-select">
                                                        <option value="All" selected="selected">Choose an
                                                            activity...</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="views-exposed-widget views-submit-button">
                                            <input class="ctools-use-ajax ctools-auto-submit-click js-hide form-submit"
                                                type="submit" id="edit-submit-your-parks" value="Apply" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="block-block-8" class="block homepage-form-or block__block block__block-8 block odd">


                            <p>or</p>

                        </div>
                        <div id="block-views-exp-your-parks-page-5"
                            class="block block__views block__views--exp-your-parks-page-5 views even">

                            <div>
                                <div class="views-exposed-form">
                                    <div class="views-exposed-widgets clearfix">
                                        <div id="edit-field-state-1-wrapper"
                                            class="views-exposed-widget views-widget-filter-field_state_1">
                                            <label for="edit-field-state-1">
                                                Filter by State... </label>
                                            <div class="views-widget">
                                                <div class="form-item form-type-select form-item-field-state-1">
                                                    <select id="edit-field-state-1" name="field_state_1"
                                                        class="form-select">
                                                        <option value="All" selected="selected">Select a state
                                                            from the list...</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="block-views-exp-your-parks-page-2"
                            class="block zip-search block__views block__views--exp-your-parks-page-2 views odd">

                            <h2 class="block__title block__title block-title">Parks near me</h2>
                        </div>
                        <div id="block-block-3" class="block block__block block__block-3 block even">


                            <p><a href="Javascript:void(0)">Advanced search</a></p>

                        </div>
                        <div id="block-block-75" class="block block__block block__block-75 block last odd">
                            <p><a class="quiz-button" href="Javascript:void(0)">Find YOur Park With Our QUIz</a>
                            </p>
                        </div>
                    </span>
                </span>

            </div>


            <div id="content" class="column main-content" role="main" tabindex="-1">

                <a id="main-content"></a>
                <div id="block-bean-homepage-intro"
                    class="block bg bg__brown dots dots-bottom hiker block__bean block__bean-homepage-intro bean first odd">


                    <div about="/block/homepage-intro" typeof=""
                        class="ds-1col entity entity-bean bean-intro view-mode-default clearfix">


                        <div class="field field__intro field-intro ">
                            <p>{!! !empty($config_home?->content_title) ? $config_home?->content_title : '' !!}</p>
                        </div>
                    </div>
                </div>
                <div id="block-views-block-entity-queue-block"
                    class="block block__views block__views-block-entity-queue-block views even">


                    <div
                        class="view view--block-entity-queue view--id-block_entity_queue view--display-id-block view--dom-id-fd721394e847f2e768e506497928c753 view-block-entity-queue view-id-block_entity_queue view-display-id-block view-dom-id-fd721394e847f2e768e506497928c753">

                        <div class="view-content">
                            @foreach ($banners as $banner)
                                <div class="entity entity-bean bean-cta view-mode-text_left cta clearfix {{ $banner->class ?? '' }}"
                                    about="/block/homepage-cta-comfort-" typeof="">
                                    <div class="field field__image field-image ">
                                        <picture>
                                            <source
                                                srcset="{{ getImageThumb($banner->thumbnail, 2500 / 2, 1350 / 2) }} 1x, {{ getImageThumb($banner->thumbnail) }} 2x"
                                                media="(min-width: 0px)">
                                            <img src="{{ getImageThumb($banner->thumbnail) }}"
                                                alt="{{ $banner->title }}" width="2500" height="1350">
                                        </picture>
                                    </div>
                                    <div class="cta__content">
                                        <h2 class="field field__headline field-headline ">{{ $banner->title }}</h2>
                                        <div class="field field__description field-description ">
                                            <p>{{ $banner->description ?? '' }}</p>
                                        </div>
                                        <div class="field field__link-ext field-link-ext ">
                                            <a href="{{ $banner->link ?? '/' }}"
                                                title="{{ $banner->title }}">{{ $banner->button_text ?? 'Send Your Thanks' }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="block-block-1" class="block block-view__intro block__block block__block-1 block odd">

                    <h2 class="block__title block__title block-title">Explore City</h2>

                    <div class="row">
                        @if (!empty($categories) && $categories->count() > 0)
                            @foreach ($categories as $item)
                                <div class="explore-block col-md-3 col-6">
                                    <div class="inner-box">
                                        <figure class="image">
                                            {!! getThumbnail($item, 300, 400, 'css-fim7d8 e10gmdwn0') !!}
                                        </figure>
                                        <div class="overlay-box">
                                            <div class="content">
                                                <h3>{{ $item->title }}</h3><a href="#"
                                                    class="overlay-link"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                @if (!empty($posts) && $posts->count() > 0)
                    <div id="block-block-1" class="block block-view__intro block__block block__block-1 block odd">

                        <h3 class="block__title block__title block-title">Popular parks</h3>

                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="listing-block col-lg-3 col-md-4 col-sm-12">
                                    <a href="{{ route('post', $post->slug) }}" title="{{ $post->title }}">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    <img loading="lazy" alt="{{ $post->title }}" class=""
                                                        data-src="{{ $post->thumbnail }}"
                                                        src="{{ $post->thumbnail }}" width="600" height="400">
                                                </figure>
                                            </div>
                                            <div class="lower-content">
                                                <h4 class="title-brand"> <a href="{{ route('post', $post->slug) }}"
                                                        title="{{ $post->title }}">
                                                        {{ $post->title }}</a>
                                                </h4>
                                                @if (!empty($post->phone))
                                                    <div class="text" style="font-size:14px;margin-bottom:5px;">
                                                        <i class="fa fa-phone"></i> {{ $post->phone }}
                                                    </div>
                                                @endif
                                                <div class="text" style="font-size:13px;">
                                                    <i class="fa fa-map-marker"></i>
                                                    {{ $post->address }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>



            <div id="postscript" class="region region-postscript clearfix">
                <div id="block-bean-newsletter-signup"
                    class="block block__bean block__bean-newsletter-signup bean first odd">
                    <div class="entity entity-bean bean-ribbon view-mode-default cta clearfix"
                        about="/block/newsletter-signup" typeof="">
                        <div class="cta__content">
                            <div class="field field__headline field-headline ">Connect with
                                {{ $config_website->website ?? '' }}.
                            </div>
                            <div class="field field__description field-description ">
                                {!! $config_website->content_footer ?? '' !!}
                            </div>
                            <div class="field field__link-ext field-link-ext "><a href="#">Get the
                                    Newsletter</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <footer id="footer" class="page clearfix">
            <div class="css-jo2aaq elovojj0">
                <div class="FooterLinks_innerContent__8anC0 row">
                    <div class="col col-12 col-lg-2">
                        <a href="/"
                            class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX"
                            aria-label="{{ $config_website->website ?? '' }}">
                            <img alt="{{ $config_website->website ?? '' }}" style="max-height: 100px;"
                                src="{{ convertPathImage($config_website->logo_footer ?? '') }}" alt="">

                        </a>
                    </div>
                    <div class="col col-12 col-lg-2">
                        <ul
                            class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                            <li class="p_ehs5 title">
                                <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold"> About
                                    {{ $config_website->website ?? '' }}</p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                        href="{{ route('page', ['about-us']) }}"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        title="About Us" data-qa="footer-careers" id="footer-careers"
                                        target="_blank">About Us</a>
                                </p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                        href="{{ route('page', ['contact-us']) }}"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-customer-support" id="footer-customer-support"
                                        title="Contact Us " target="_blank">Contact Us</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-blog" id="footer-blog" target="_self">Blog</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="/sitemap.xml"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-sitemap" id="footer-sitemap">Sitemap</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col col-12 col-lg-2">
                        <ul
                            class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                            <li class="p_ehs5 title">
                                <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">For business</p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-partners" id="footer-partners" target="_self">For
                                        partners</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-pricing" id="footer-pricing" target="_self">Pricing</a>
                                </p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-partners-support" id="footer-partners-support"
                                        target="_blank">Support</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-status" id="footer-status" target="_blank">Status</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col col-12 col-lg-2">
                        <ul
                            class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                            <li class="p_ehs5 title">
                                <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">Legal</p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                        href="{{ route('page', ['terms-of-use']) }}"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-privacy-policy" id="footer-privacy-policy"
                                        target="_blank">Terms of Use </a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                        href="{{ route('page', ['privacy-policy']) }}"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-service-terms" id="footer-service-terms"
                                        target="_blank">Privacy Policy</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                        href="{{ route('page', ['terms-of-service']) }}"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-service-terms" id="footer-service-terms"
                                        target="_blank">Terms of
                                        service</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a
                                        href="{{ route('page', ['faq']) }}"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                        data-qa="footer-use-terms" id="footer-use-terms" target="_blank">FAQ</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col col-12 col-lg-2">
                        <ul
                            class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                            <li class="p_ehs5 title">
                                <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">Find us on social</p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                        target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                class="_-6pfzC I-8PaC" aria-hidden="true"><span class="rtl-icon"><svg
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span><span class="ltr-icon"><svg fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd"
                                                            d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span></span></span>Facebook</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                        target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                class="_-6pfzC I-8PaC" aria-hidden="true"><span class="rtl-icon"><svg
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span><span class="ltr-icon"><svg fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd"
                                                            d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span></span></span>Twitter</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                        target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                class="_-6pfzC I-8PaC" aria-hidden="true"><span class="rtl-icon"><svg
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span><span class="ltr-icon"><svg fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd"
                                                            d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span></span></span>Linkedin</a></p>
                            </li>
                            <li class="p_ehs5">
                                <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                        class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                        target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                class="_-6pfzC I-8PaC" aria-hidden="true"><span class="rtl-icon"><svg
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd"
                                                            d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span><span class="ltr-icon"><svg fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                        <path fill-rule="evenodd"
                                                            d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                            clip-rule="evenodd"></path>
                                                    </svg></span></span></span>Instagram</a></p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <div id="menu_mb">
            <ul class="menu">
                <li class="menu_mb__close">X</li>
                @foreach ($menus as $menu)
                    <li class="menu__item is-leaf first leaf menu-mlid-18681">
                        <a href="{{ $menu->link }}" title="{{ $menu->title }}"
                            class="menu__link">{{ $menu->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <script>
            (() => {
                const root = document.getElementById('menu_mb');
                const panel = root.querySelector('.menu');
                const btn = root.querySelector('.menu_mb__close');
                const btn_open = document.querySelector('.menu-toggle');
                const body = document.querySelector('body');

                const open = () => {
                    root.classList.add('show');
                    document.documentElement.classList.add('mb-lock');
                };
                const close = () => {
                    root.classList.remove('show');
                    document.documentElement.classList.remove('mb-lock');
                };

                // Nút X
                btn && btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    close();
                });

                btn_open.addEventListener('click', (e) => {
                    e.preventDefault();
                    open();
                });



                // Click ra ngoài panel (overlay) => đóng
                root.addEventListener('click', (e) => {
                    if (!panel.contains(e.target)) close();
                });
                // Chặn sự kiện nổi bọt khi click trong panel
                panel.addEventListener('click', (e) => e.stopPropagation());

                // Phím ESC
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && root.classList.contains('show')) close();
                });


                // Expose để mở/toggle từ icon hamburger
                window.menuMb = {
                    open,
                    close,
                    toggle: () => root.classList.toggle('show')
                };
            })();
        </script>

    </div>
</body>

</html>
