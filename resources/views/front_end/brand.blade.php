@php
    $ver = 126;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $medias = $post->media->all();
    $photos = collect($medias)->where('type', 'photo')->all();
    $banner = collect($medias)->where('type', 'banner')->all();
    $menus = collect($medias)->where('type', 'menu')->all();

@endphp

@extends('front_end._index')

@section('content')

    <section class="listing-banner box-brand">
        <div class="background-layer banner-brand"
            style="background-image: url('https://static.goto-where.com/199164-albums-1.jpg');"></div>
        <div class="auto-container info-brand">
            <div class="content-box">
                <div class="menu-item header-fixed">
                    <ul>
                        <li class="show"><a class="active" href="#overview" title="Overview">Overview</a></li>
                        <li class="show"><a href="#photos" title="Photos">Photos</a></li>
                        <li class="show"><a href="https://khao-sok-eagle.goto-where.com/menu" title="Menu">Menu</a></li>
                        <li class="show"><a href="#reviews" title="Reviews">Reviews</a></li>
                        <li class="show"><a href="#location" title="Location">Location</a></li>
                    </ul>
                </div>
                <div class="brand-info">
                    <h1>{{ $post->title }}</h1>
                    <div class="listing-block-two">
                        <div class="rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="avg-vote">5</span>
                            <span class="title">(148 reviews )</span>
                        </div>
                    </div>

                    <div class="address">
                        <span class="flaticon-pin"></span> <a href="#location" title="Location">{{ $post->address }}</a>
                    </div>
                    @if($post->phone)
                        <div class="phone"><span class="flaticon-phone-call"></span> {{ $post->phone }}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="sidebar-page-container bg_alice">
        <div class="auto-container">
            <div class="row">
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="listing-single">
                        <div class="description-widget ls-widget">
                            <div class="widget-content" id="overview">
                                {!! $post->content_about !!}
                            </div>
                        </div>
                        @if(!empty($abouts))
                        <div class="features-widget ls-widget" id="business">
                            <div class="widget-title">
                                <h2><span class="icon flaticon-list"></span> Amenities and More</h2>
                            </div>
                            <div class="widget-content">
                                <ul class="listing-features">
                                    @foreach (collect($abouts)->where('parent_id', 0) as $about)
                                        @if (!empty($about->title))
                                        <li> 
                                            <span class="title-amenites">{{ $about->title }}</span>
                                            <ul class="listing-child">
                                                @foreach (collect($abouts)->where('parent_id', $about->id) as $child)
                                                    <div>{!! $child->title !!}</div>
                                                    <li><span>{!! $child->title !!}</span></li>
                                                @endforeach
                                             
                                            </ul>
                                        </li>
                                        @endifÏ
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="gallery-widget ls-widget" id="photos">
                            <div class="widget-title">
                                <h2><span class="icon flaticon-gallery"></span> Photos</h2>
                            </div>
                            <div class="widget-content">
                                <ul class="listing-gallery listing-gallery-photos">
                                    @foreach ($photos as $k => $item)
                                        <li class="gallery-item photo-item--{{ $k + 1 }}">
                                            <div class="inner-box">
                                                <figure class="image"> <img class="" src="{{ getImageThumb($item->thumbnail) }}"
                                                        alt="{{ $post->title }} - {{ $k }}"
                                                        data-src="{{ getImageThumb($item->thumbnail) }}" lazy="loading">
                                                </figure>
                                                <div class="overlay"> <a href="{{getImageThumb($item->thumbnail)}}"
                                                        class="lightbox-image" data-fancybox="ls-gallery-photos"
                                                        title="{{ $post->title }} - {{ $k }}"><span
                                                            class="icon flaticon-magnifying-glass"></span></a> </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="comments-widget ls-widget" id="reviews">
                            <div class="widget-title">
                                <h2><span class="icon flaticon-consulting-message"></span> Reviews {{$post->title}}</h2>
                            </div>
                            <div class="widget-content">
                                @foreach ($comments as $item)
                                    <div class="comment">
                                        <div class="user-name"> {{ $item->fullname }}</div>
                                        <div class="comment-info listing-block-two">
                                            <ul class="rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </ul>
                                            <div class="comment-time">
                                                {{ format_date($item->created_at, 'd-m-Y') }}
                                            </div>
                                        </div>
                                        <div class="text">
                                            {!! $item->content ?? '' !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="comments-form-widget ls-widget">
                            <div class="widget-title">
                                <h4><span class="icon flaticon-consulting-message"></span> Add a Review</h4>
                            </div>
                            <div class="widget-content">
                                <div class="sub-ratings-container">
                                    
                                    <div class="add-sub-rating">
                                        <div class="sub-rating-title">Space</div>
                                        <div class="sub-rating-stars">
                                            <div class="clearfix"></div>
                                            <form class="leave-rating"> <input type="radio" name="rating" id="rating-31"
                                                    value="1"> <label for="rating-31" class="fa fa-star"></label> <input
                                                    type="radio" name="rating" id="rating-32" value="2"> <label
                                                    for="rating-32" class="fa fa-star"></label> <input type="radio"
                                                    name="rating" id="rating-33" value="3"> <label for="rating-33"
                                                    class="fa fa-star"></label> <input type="radio" name="rating"
                                                    id="rating-34" value="4"> <label for="rating-34"
                                                    class="fa fa-star"></label> <input type="radio" name="rating"
                                                    id="rating-35" value="5"> <label for="rating-35"
                                                    class="fa fa-star"></label> </form>
                                        </div>
                                    </div>

                                 
                                </div>
                                <div class="comment-form default-form">
                                    <form>
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group"> <input type="text"
                                                    name="username" placeholder="Name" required=""> </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group"> <input type="email"
                                                    name="email" placeholder="Email" required=""> </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group"> <textarea class="darma"
                                                    name="message" placeholder="Write Comment"></textarea> </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group"> <button
                                                    class="theme-btn btn-style-two" type="submit" name="submit-form"
                                                    disabled="">Submit Review</button> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-side col-lg-6 col-md-12 col-sm-12">
                    <aside class="sidebar">
                        <div class="timing-widget ls-widget" id="hours">
                            <div class="widget-title">
                                <h2><span class="icon flaticon-menu"></span>Opening Hours</h2> <span class="status"><strong
                                        class="time-status text-danger"
                                        data-time="10:00 AM - 11:00 PM">Closed</strong></span>
                            </div>
                            <div class="widget-content">
                                @if (!empty($post->time_open))
                                    <div id="time_open" class="timing-list">
                                        {!! $post->time_open !!}
                                    </div>
                                @endif

                            </div>
                        </div>
                    </aside>
                </div>
                <div class="sidebar-side col-lg-6 col-md-12 col-sm-12">
                    <div class="business-info-widget ls-widget" id="location">
                        <div class="widget-title">
                            <h2><span class="icon flaticon-menu"></span>Location</h2>
                        </div>
                        <div class="widget-content">
                            <div class="map-box">
                                {!! getIframeSrcFromString($post->iframe_map) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="listing-section-two appreciated-others">
        <div class="container-fluid">
            <div class="sec-title text-center">
                <h2>Appreciated by Others</h2>
            </div>
            <div class="carousel-outer">
                <div class="four-items-carousel owl-carousel owl-theme default-nav light no-dots owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-6377px, 0px, 0px); transition: 0.4s; width: 9110px;">
                            
                             @foreach($relates as $item)
                             <div class="listing-block-two">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image">
                                                <img class=""
                                                src="https://static.goto-where.com/199146-albums-1.jpg"
                                                    data-src="https://static.goto-where.com/199146-albums-1.jpg"
                                                    alt="Pizzeria Maria Luisa"></figure>
                                            <div class="content">
                                                <div class="rating"> <span class="fa fa-star"></span> <span
                                                        class="fa fa-star"></span> <span class="fa fa-star"></span> <span
                                                        class="fa fa-star"></span> <span class="fa fa-star no-start"></span>
                                                    <span class="title">(207 review)</span>
                                                </div>
                                                <div class="title-brand"><a
                                                        href="{{route('post', $item->slug)}}"
                                                        title="{{ $item->title }}">{{ $item->title }}</a></div>
                                                <ul class="info mt-3">
                                                    <li><span class="flaticon-pin"></span>{{ $item->address }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if(!empty($item->phone))
                                        <div class="bottom-box">
                                            <div class="places">
                                                <div class="place">Pizza Restaurant</div>
                                            </div>
                                            <div class="status"><span class="flaticon-phone-call"></span> {{ $item->phone }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection