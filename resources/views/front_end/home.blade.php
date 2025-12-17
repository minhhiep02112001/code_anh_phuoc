@php
    $config_home = getValueSetting('config_home');

@endphp

@extends('front_end._index')
@section('content')
    <section class="banner-section style-two">
        <div class="background-layer" style="background-image: url({{ convertPathImage($banner->thumbnail) }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <div class="upper-heading">
                    <h3> {{ $banner->title ?? '' }} </h3>
                    <p>{{ $banner->description ?? '' }}</p>
                </div>
                <div class="listing-search-tabs tabs-box">

                    <div class="listing-search-form">
                        <form method="post" action="#">
                            @csrf()
                            <div class="row">
                                <div class="form-group col-lg-10 col-md-6 col-sm-12"> <input type="text"
                                        name="listing-search" placeholder="What are you looking for?">
                                </div>

                                <div class="form-group col-lg-2 col-md-6 col-sm-12 text-right">
                                    <button type="submit" onclick="return" class="theme-btn btn-style-two">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- <section class="listing-section-two">
        <div class="container-fluid">
            <div class="carousel-outer">
                <div class="four-items-carousel owl-carousel owl-theme default-nav light no-dots">
                    <div class="listing-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="https://static.goto-where.com/199063-albums-1.jpg"
                                        alt="La Pour Meru" lazy="loading"></figure>
                                <div class="tags"> <span>Featured</span> </div>
                                <div class="content">
                                    <div class="rating"> <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span
                                            class="fa fa-star no-start"></span>
                                        <span class="title">(710 review)</span>
                                    </div>
                                    <div class="title-brand"><a href="https://la-pour-meru.goto-where.com"
                                            title="La Pour Meru">La Pour Meru</a>
                                    </div>
                                    <ul class="info mt-3">
                                        <li><span class="flaticon-pin"></span>38a, Jln
                                            Meru Bestari A4/1, 31200
                                            Ipoh, Perak, Malaysia</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bottom-box">
                                <div class="places">
                                    <div class="place">Restaurant</div>
                                </div>
                                <div class="status"><span class="flaticon-phone-call"></span>
                                    +60 17-516 7360</div>
                            </div>
                        </div>
                    </div>

                    <div class="listing-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="https://static.goto-where.com/198177-albums-1.jpg"
                                        alt="Auberge De Daniel" lazy="loading"></figure>
                                <div class="tags"> <span>Featured</span> </div>
                                <div class="content">
                                    <div class="rating"> <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span
                                            class="fa fa-star no-start"></span>
                                        <span class="title">(422 review)</span>
                                    </div>
                                    <div class="title-brand"><a href="https://auberge-de-daniel.goto-where.com"
                                            title="Auberge De Daniel">Auberge De
                                            Daniel</a></div>
                                    <ul class="info mt-3">
                                        <li><span class="flaticon-pin"></span>3 Pl. du
                                            Jeu D'Arc, 60660 Mello,
                                            France</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bottom-box">
                                <div class="places">
                                    <div class="place">Restaurant</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="listing-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="https://static.goto-where.com/198118-albums-1.jpg"
                                        alt="Restaurante Atrapallada" lazy="loading">
                                </figure>
                                <div class="tags"> <span>Featured</span> </div>
                                <div class="content">
                                    <div class="rating"> <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span
                                            class="fa fa-star no-start"></span>
                                        <span class="title">(4123 review)</span>
                                    </div>
                                    <div class="title-brand"><a href="https://restaurante-atrapallada.goto-where.com"
                                            title="Restaurante Atrapallada">Restaurante
                                            Atrapallada</a></div>
                                    <ul class="info mt-3">
                                        <li><span class="flaticon-pin"></span>P.º de las
                                            Acacias, 12, Arganzuela,
                                            28005 Madrid, Spain</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bottom-box">
                                <div class="places">
                                    <div class="place">Restaurant</div>
                                </div>
                                <div class="status"><span class="flaticon-phone-call"></span>
                                    +34 915 39 08 92</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="explore-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Popular Categories</h2> <span class="divider"></span>
                <div class="text">Explore some of the best tips from around the city from our partners and
                    friends.
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="explore-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ getImageThumb($category->thumbnail, 300, 400) }}"
                                    alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>{{ $category->title }}</h5>
                                    {{-- <span class="locations">{{ $category->total_location ?? 0 }} Locations</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="listing-section home-list-brands">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Explore Places</h2> <span class="divider"></span>
                <div class="text">Explore some of the best tips from around the city from our partners and
                    friends.
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $item)
                    <div class="listing-block col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('post', $item->slug) }}" title="{{ $item->title }}">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title }}"
                                            lazy="loading">
                                    </figure>
                                    {{-- <div class="tags"><span>฿100–200</span> --}}
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star no-start"></span>
                                    <span class="title">({{ $item->google_review }} review)</span>
                                </div>
                                <h3 class="title-brand">
                                    <a href="{{ route('post', $item->slug) }}"
                                        title="{{ $item->title }}">{{ $item->title }}</a>
                                </h3>
                                <div class="text">
                                    {{ $item->address }}
                                </div>
                            </div>
                            @if (!empty($item->phone))
                                <div class="bottom-box">
                                    <div class="places">
                                        <div class="place">Restaurant</div>
                                    </div>
                                    <div class="status"><span class="flaticon-phone-call"></span>
                                        {{ $item->phone }}</div>
                                </div>
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if (!empty($exploreMore))
        <section class="call-to-action" style="background-image: url({{ convertPathImage($exploreMore->thumbnail) }});">
            <div class="auto-container">
                <div class="content">
                    <h3>{{ $exploreMore->title }}</h3>
                    <div class="text">{!! $exploreMore->description !!}</div>
                    <div class="btn-box">
                        <a href="{{ $exploreMore->link_redirect ?? '#' }}" class="theme-btn btn-style-three">Start
                            Exploring <span class="flaticon-right"></span></a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (!empty($bannerReview) && $bannerReview->count() > 0)
        <section class="testimonial-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>What People Love About Goto Where</h2> <span class="divider"></span>
                    <div class="text">See how users explore and discover great local spots with Goto Where.</div>
                </div>
                <div class="testimonial-outer">
                    <div class="client-thumb-outer">
                        <div class="client-thumbs-carousel owl-carousel owl-theme">
                            @foreach ($bannerReview as $banner)
                                <div class="thumb-item">
                                    <figure class="thumb-box"><img src="{{ getImageThumb($banner->thumbnail, 200, 200) }}"
                                            alt="">
                                    </figure>
                                    <div class="author-info">
                                        <div class="author-name">{{ $banner->title }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="client-testimonial-carousel owl-carousel owl-theme">
                        @foreach ($bannerReview as $banner)
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="text">{!! $banner->description !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
