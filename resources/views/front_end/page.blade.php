@extends('front_end._index')
@section('content')
    <style>
        .article-content {
            font-family: Roboto, sans-serif;
            line-height: 1.5;
            color: #000;
        }

        .article-content h2 {
            font-size: 1.8rem;
            /* 26px */
            margin: 20px 0 10px;
            color: #333;
        }

        .article-content h3 {
            font-size: 1.5rem;
            /* 24px */
            margin: 15px 0;
            color: #333;
        }

        /* Khoảng cách giữa các đoạn */
        .article-content .article-content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Tăng không gian giữa các tiêu đề và nội dung */
        .article-content h2,
        .article-content h3 {
            margin: 10px 0px;
        }

        /* Đảm bảo đủ khoảng trống giữa các mục và tiêu đề */
        .article-content ul,
        .article-content li {
            padding: 5px 0;

        }

        .article-content p {
            margin-bottom: 10px;
            font-size: 16px; 
        }

        h1 {
            font-size: 45px;
            font-weight: bold;
        }

        /* Định dạng liên kết */
        .article-content a {
            color: #c0392b;
            text-decoration: underline;
        }

        /* Hình ảnh responsive */
        .article-content img {
            width: 100%;
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px auto;
        }

        /* Định dạng danh sách */
        .article-content ul {
            margin:  0;
            font-size: 16px;
            padding-left: 5px;
        }

       
        /* Căn giữa văn bản */
        .article-content p,
        .article-content li {
            text-align: justify;
        }

        /* Thiết lập kiểu chữ cho thiết bị di động */
        @media only screen and (max-width: 768px) {
            h1 {
    font-size: 30px;
    font-weight: bold;
}

            .article-content h2 {
                font-size: 1.6rem;
                /* 22px cho di động */
            }

            .article-content h3 {
                font-size: 1.3rem;
                /* 20px */
            }
 

            /* Căn chỉnh hình ảnh và văn bản */
            .article-content img {
                margin: 15px auto;
                width: 100%;
            }

            /* Định dạng nút và liên kết dễ nhấp cho màn hình nhỏ */
            .article-content a {
                font-size: 0.9rem;
            }
        }
    </style>
    <div id="html-section-product-template" class="html-section">
        <div class="wrapper">
            <section class="bread-crumb">

                <div class=" ">
                    @include('front_end.block.breadcrumb')
                </div>
            </section>
            <div class="article-wraper card py-2 border-0">
                <div class="wrap_background_aside padding-top-0 margin-bottom-40 ">
                    <div class="row">
                        <section class="right-content col-12 py-3 mx-auto">
                            <article class="article-main">
                                <div class="article-details">
                                    <h1 class="title-product">{{ $row->title }}</h1>
                                    <div class="media ">
                                        <div class="media-body ">
                                            <small class="text-muted font-weight-light">
                                                {{ timeAgo($row->created_at) }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="article-content">
                                        {!! $row->content !!}
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
            </div>
            </section>
        </div>
    @endsection
    @section('scripts')
        {{-- <script>
        $(document).ready(function() {
            if ($('.main-article-menu').length > 0) {
                var catalog = "";
                var count_h2 = 1;
                var count_h3 = 1;
                $('.article-content').find('h2, h3').each(function(i, v) {
                    $(this).attr('data-id', `catalog${i}`);
                    if ($(this)[0].localName == 'h2') {
                        catalog +=
                            `</div><div class="main-article-menu-data-parent" data-id="${$(this)[0].dataset.id}"><span style="display: none !important;">${count_h2}. </span><strong>${$(this)[0].innerText}</strong>`
                        count_h3 = 1;
                        count_h2++;
                    } else {
                        catalog +=
                            `<div class="main-article-menu-data-child" data-id="${$(this)[0].dataset.id}"><span style="display: none !important;">${count_h2 - 1}.${count_h3}. </span><strong>${$(this)[0].innerText}</strong></div>`
                        count_h3++;
                    }
                })
                if ($('.main-article-content').find('h2').length > 0) {
                    catalog = catalog.replace("</div>", "");
                }
                $('.main-article-menu .main-article-menu-data').append(catalog);
                /*setTimeout(function(){ $('.main-article-menu label span').trigger('click') }, 250)*/

                $('body').on('click', '.main-article-menu-data-parent strong, .main-article-menu-data-child strong',
                    function() {
                        var id = $(this).parent().attr('data-id');
                        $("html, body").stop().animate({
                            scrollTop: $('.article-content [data-id="' + id + '"]').offset().top - 150
                        }, 1000, 'swing');
                        $('body, html').removeClass('open-overplay open-article-menu');
                    })

                $('body').on('click', '.main-article-menu:not(.sidebar) label', function() {
                    $(this).find('span').toggleClass('active');
                    $(this).next().slideToggle(500, "swing");
                })

                $(window).on('scroll', function() {
                    if ($('.main-article-menu:not(.sidebar)').length === 0) return false;
                    if ($(this).scrollTop() > ($('.main-article-menu:not(.sidebar)').offset().top + $(
                            '.main-article-menu:not(.sidebar)').height() - 150)) {
                        $('.main-article-share-cta[data-type="main-article-share-menu"]').addClass(
                        'active');
                    } else {
                        $('.main-article-share-cta[data-type="main-article-share-menu"]').removeClass(
                            'active');
                    }
                })

                $('body').on('click', '.main-article-share-cta[data-type="main-article-share-menu"]', function() {
                    $(this).siblings().toggleClass('show');
                    $('body, html').toggleClass('open-overplay open-article-menu');
                })

                $('body').on('click', '.overplay-all, button[data-type="close-all-sidebar"]', function(e) {
                    e.preventDefault();
                    $('body, html').removeClass(
                        'open-overplay open-noscroll open-wishlist open-compare open-filter-mobile open-cart open-smart-search open-share open-article-menu open-menu-mobile open-modalContact'
                        );
                })
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            if ($('.main-article-menu').length > 0) {
                var catalog = "";
                var count_h2 = 1;
                var count_h3 = 1;
                $('.article-content').find('h2, h3').each(function(i, v) {
                    $(this).attr('data-id', `catalog${i}`);
                    if ($(this)[0].localName == 'h2') {
                        catalog +=
                            `</div><div class="main-article-menu-data-parent" data-id="${$(this)[0].dataset.id}"><span style="display: none !important;">${count_h2}. </span><strong>${$(this)[0].innerText}</strong>`
                        count_h3 = 1;
                        count_h2++;
                    } else {
                        catalog +=
                            `<div class="main-article-menu-data-child" data-id="${$(this)[0].dataset.id}"><span style="display: none !important;">${count_h2 - 1}.${count_h3}. </span><strong>${$(this)[0].innerText}</strong></div>`
                        count_h3++;
                    }
                })
                if ($('.main-article-content').find('h2').length > 0) {
                    catalog = catalog.replace("</div>", "");
                }
                $('.main-article-menu .main-article-menu-data').append(catalog);
                /*setTimeout(function(){ $('.main-article-menu label span').trigger('click') }, 250)*/

                $('body').on('click', '.main-article-menu-data-parent strong, .main-article-menu-data-child strong',
                    function() {
                        var id = $(this).parent().attr('data-id');
                        $("html, body").stop().animate({
                            scrollTop: $('.article-content [data-id="' + id + '"]').offset().top - 150
                        }, 1000, 'swing');
                        $('body, html').removeClass('open-overplay open-article-menu');
                    })

                $('body').on('click', '.main-article-menu:not(.sidebar) label', function() {
                    $(this).find('span').toggleClass('active');
                    $(this).next().slideToggle(500, "swing");
                })

                $(window).on('scroll', function() {
                    if ($('.main-article-menu:not(.sidebar)').length === 0) return false;
                    if ($(this).scrollTop() > ($('.main-article-menu:not(.sidebar)').offset().top + $(
                            '.main-article-menu:not(.sidebar)').height() - 150)) {
                        $('.main-article-share-cta[data-type="main-article-share-menu"]').addClass(
                        'active');
                    } else {
                        $('.main-article-share-cta[data-type="main-article-share-menu"]').removeClass(
                            'active');
                    }
                })

                $('body').on('click', '.main-article-share-cta[data-type="main-article-share-menu"]', function() {
                    $(this).siblings().toggleClass('show');
                    $('body, html').toggleClass('open-overplay open-article-menu');
                })

                $('body').on('click', '.overplay-all, button[data-type="close-all-sidebar"]', function(e) {
                    e.preventDefault();
                    $('body, html').removeClass(
                        'open-overplay open-noscroll open-wishlist open-compare open-filter-mobile open-cart open-smart-search open-share open-article-menu open-menu-mobile open-modalContact'
                        );
                })
            }
        });
    </script> --}}
    @endsection
