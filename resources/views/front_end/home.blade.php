@php
    $config_home = getValueSetting('config_home');
    $config_seo = getValueSetting('config_seo');
    $config_website = getValueSetting('config_website');
    $siteName = $config_website->website ?? config('app.name');
@endphp

@extends('front_end._index')

@section('body_class', 'vn-page vn-home')

@section('content')
    <h1 class="visually-hidden">{{ $config_seo->meta_title ?? $siteName }}</h1>

    @if (!empty($banner))
        <section class="vn-hero">
            <div class="vn-hero__bg" style="background-image:url('{{ convertPathImage($banner->thumbnail) }}')"></div>
            <div class="vn-container">
                <div class="vn-hero__inner">
                    <h2 class="vn-hero__title">{{ $banner->title ?? 'Discover local dining' }}</h2>
                    @if (!empty($banner->description))
                        <p class="vn-hero__text">{{ $banner->description }}</p>
                    @endif
                    <form class="vn-search" action="{{ url('/') }}" method="get">
                        <input type="search" name="key" placeholder="Search restaurants, cities, cuisines…"
                            aria-label="Search restaurants">
                        <button type="submit" class="vn-btn">Search</button>
                    </form>
                </div>
            </div>
        </section>
    @endif

    @if (!empty($bannerAbout) && $bannerAbout->count() > 0)
        <section class="vn-section vn-section--white">
            <div class="vn-container">
                <div class="vn-section__head">
                    <span class="vn-eyebrow">Why us</span>
                    <h2 class="vn-title">Find the right place, faster</h2>
                    <p class="vn-lead">{{ $siteName }} helps you explore menus, photos, and reviews before you visit.</p>
                </div>
                <div class="vn-grid vn-grid--3">
                    @foreach ($bannerAbout as $item)
                        <article class="vn-card">
                            <div class="vn-card__img">
                                <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title ?? '' }}"
                                    loading="lazy">
                            </div>
                            <div class="vn-card__body">
                                <h3 class="vn-card__name">{{ $item->title ?? '' }}</h3>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (!empty($bannerCondi) && $bannerCondi->count() > 0)
        <section class="vn-section">
            <div class="vn-container">
                <div class="vn-section__head">
                    <span class="vn-eyebrow">Features</span>
                    <h2 class="vn-title">Why choose {{ $siteName }}?</h2>
                </div>
                <div class="vn-grid vn-grid--2">
                    @foreach ($bannerCondi as $item)
                        <article class="vn-feature">
                            @if (!empty($item->thumbnail))
                                <div class="vn-feature__img">
                                    <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title }}"
                                        loading="lazy">
                                </div>
                            @endif
                            <div>
                                <h3 class="vn-feature__title">{{ $item->title }}</h3>
                                <div class="vn-lead">{!! $item->description !!}</div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (!empty($categories) && count($categories) > 0)
        <section class="vn-section vn-section--white">
            <div class="vn-container">
                <div class="vn-section__head">
                    <span class="vn-eyebrow">Explore</span>
                    <h2 class="vn-title">Popular by city</h2>
                    <p class="vn-lead">Browse curated collections from different destinations.</p>
                </div>
                <div class="vn-grid vn-grid--4">
                    @foreach ($categories as $category)
                        <article class="vn-city">
                            <img src="{{ getImageThumb($category->thumbnail, 300, 400) }}" alt="{{ $category->title }}"
                                loading="lazy">
                            <span class="vn-city__label">{{ $category->title }}</span>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (!empty($posts) && count($posts) > 0)
        <section class="vn-section">
            <div class="vn-container">
                <div class="vn-section__head">
                    <span class="vn-eyebrow">Trending</span>
                    <h2 class="vn-title">Featured restaurants</h2>
                    <p class="vn-lead">Hand-picked spots worth a visit this week.</p>
                </div>
                <div class="vn-grid vn-grid--3">
                    @foreach ($posts as $item)
                        <article class="vn-card">
                            <a href="{{ route('post', $item->slug) }}" class="vn-card__link" title="{{ $item->title }}">
                                <div class="vn-card__img">
                                    <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title }}"
                                        loading="lazy">
                                </div>
                                <div class="vn-card__body">
                                    @if (!empty($item->google_review))
                                        <div class="vn-rating">★ {{ $item->google_review }}</div>
                                    @endif
                                    <h3 class="vn-card__name">{{ $item->title }}</h3>
                                    @if (!empty($item->address))
                                        <p class="vn-card__meta">{{ $item->address }}</p>
                                    @endif
                                    @if (!empty($item->phone))
                                        <p class="vn-card__meta">{{ $item->phone }}</p>
                                    @endif
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (!empty($exploreMore))
        <section class="vn-section">
            <div class="vn-cta" style="background-image:url('{{ convertPathImage($exploreMore->thumbnail) }}')">
                <div class="vn-cta__inner">
                    <h2 class="vn-title">{{ $exploreMore->title }}</h2>
                    <div class="vn-lead">{!! $exploreMore->description !!}</div>
                    @if (!empty($exploreMore->link_redirect))
                        <a href="{{ $exploreMore->link_redirect }}" class="vn-btn">Start exploring</a>
                    @endif
                </div>
            </div>
        </section>
    @endif

    @if (!empty($bannerReview) && $bannerReview->count() > 0)
        <section class="vn-section vn-section--white">
            <div class="vn-container">
                <div class="vn-section__head">
                    <span class="vn-eyebrow">Community</span>
                    <h2 class="vn-title">What people say about {{ $siteName }}</h2>
                </div>
                <div class="vn-grid vn-grid--3">
                    @foreach ($bannerReview as $item)
                        <blockquote class="vn-quote">
                            <p class="vn-quote__text">{!! $item->description !!}</p>
                            <footer class="vn-quote__author">{{ $item->title }}</footer>
                        </blockquote>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
