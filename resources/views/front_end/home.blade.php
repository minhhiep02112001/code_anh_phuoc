@php
    $config_banner = getValueSetting('config_banner');
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $cb = is_object($config_banner) ? $config_banner : (object) [];
    $siteName = preg_replace('/menujoys/i', 'MENUDY', $config_website->website ?? 'MENUDY');

    $bannerHeroChips = $bannerHeroChips ?? collect();
    $bannerValue = $bannerValue ?? collect();
    $bannerTrust = $bannerTrust ?? collect();
    $bannerGuide = $bannerGuide ?? collect();
    $bannerCity = $bannerCity ?? collect();
    $posts = collect($posts->get('data') ?? []);

    $trendingPosts = $posts->take(6);
    $recentPosts = $posts;
    $features = $bannerTrust->count() ? $bannerTrust : $bannerValue;
@endphp
@extends('front_end._index')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/home.css') }}?v={{ time() }}">
@endpush

@section('content')
    <div class="hp-page">
        <h1 class="visually-hidden">{{ $config_seo->meta_title ?? $siteName }}</h1>

        {{-- Hero --}}
        <section class="hp-hero" aria-labelledby="hpHeroTitle">
            <div class="hp-container">
                <div class="hp-hero__inner">
                    <h2 id="hpHeroTitle" class="hp-hero__title">
                        {!! data_get($cb, 'hero.title_html') ?:
                            'Discover the best menus from <em>top restaurants, bars, and cafés.</em>' !!}
                    </h2>
                    <p class="hp-hero__lede">
                        {{ data_get($cb, 'hero.lede', 'Find new meals, explore local favorites, and browse menus before you visit.') }}
                    </p>

                    <form class="hp-search" action="{{ url('/') }}" method="get" role="search"
                        aria-label="Search menus">
                        <div class="hp-search__field">
                            <i class="bi bi-geo-alt" aria-hidden="true"></i>
                            <input type="search" name="key" id="hpSearchInput"
                                placeholder="{{ data_get($cb, 'hero.placeholder_query', 'Search for your favorite menu') }}"
                                autocomplete="off" />
                        </div>
                        <button type="submit" class="hp-search__btn">
                            {{ data_get($cb, 'hero.btn_text', 'Search') }}
                        </button>
                    </form>

                    @if ($bannerHeroChips->count())
                        <div class="hp-tags" role="list" aria-label="Popular searches">
                            @foreach ($bannerHeroChips as $chip)
                                <button type="button" class="hp-tag" data-hp-q="{{ $chip->title ?? '' }}"
                                    role="listitem">
                                    {{ $chip->title ?? '' }}{{ !empty($chip->description) ? ' · ' . $chip->description : '' }}
                                </button>
                            @endforeach
                        </div>
                    @else
                        <div class="hp-tags" role="list" aria-label="Popular searches">
                            <button type="button" class="hp-tag" data-hp-q="Pizza" role="listitem">Pizza</button>
                            <button type="button" class="hp-tag" data-hp-q="Coffee" role="listitem">Coffee</button>
                            <button type="button" class="hp-tag" data-hp-q="Burgers" role="listitem">Burgers</button>
                            <button type="button" class="hp-tag" data-hp-q="Sushi" role="listitem">Sushi</button>
                            <button type="button" class="hp-tag" data-hp-q="Brunch" role="listitem">Brunch</button>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- Trending --}}
        @if ($trendingPosts->count())
            <section class="hp-section" aria-labelledby="hpTrendingTitle">
                <div class="hp-container">
                    <div class="hp-section__head">
                        <h2 id="hpTrendingTitle" class="hp-section__title">
                            {{ data_get($cb, 'featured.eyebrow', 'Trending menu items') }}
                        </h2>
                    </div>
                    <div class="hp-grid-3">
                        @foreach ($trendingPosts as $item)
                            <article class="hp-trend-card">
                                <a href="{{ route('post', ['slug' => $item->slug]) }}" class="hp-trend-card__img"
                                    title="{{ $item->title }}">
                                    <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title }}"
                                        loading="lazy">
                                    <span class="hp-trend-card__badge">Restaurant</span>
                                </a>
                                <div class="hp-trend-card__body">
                                    <h3 class="hp-trend-card__title">
                                        <a href="{{ route('post', ['slug' => $item->slug]) }}"
                                            title="{{ $item->title }}">{{ $item->title }}</a>
                                    </h3>
                                    @if (!empty($item->address))
                                        <p class="hp-trend-card__meta">
                                            <i class="bi bi-geo-alt" aria-hidden="true"></i>
                                            {{ $item->address }}
                                        </p>
                                    @endif
                                    <a href="{{ route('post', ['slug' => $item->slug]) }}" class="hp-trend-card__more"
                                        title="View {{ $item->title }}">View more</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Recently added --}}
        @if ($recentPosts->count())
            <section class="hp-section hp-section--soft" id="explore" aria-labelledby="hpRecentTitle">
                <div class="hp-container">
                    <div class="hp-section__head">
                        <h2 id="hpRecentTitle" class="hp-section__title">
                            {!! data_get($cb, 'featured.title_html') ?: 'Recently Added Menus &amp; Discoveries' !!}
                        </h2>
                        <a href="#explore" class="hp-section__link" title="View all menus">View all menus</a>
                    </div>
                    <div class="hp-grid-4">
                        @foreach ($recentPosts as $item)
                            <article class="hp-menu-card">
                                <a href="{{ route('post', ['slug' => $item->slug]) }}" class="hp-menu-card__img"
                                    title="{{ $item->title }}">
                                    <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title }}"
                                        loading="lazy">
                                    <span class="hp-menu-card__cat">Menu</span>
                                </a>
                                <div class="hp-menu-card__body">
                                    <h3 class="hp-menu-card__title">
                                        <a href="{{ route('post', ['slug' => $item->slug]) }}"
                                            title="{{ $item->title }}">{{ $item->title }}</a>
                                    </h3>
                                    <div class="hp-menu-card__rating" aria-label="Rating">
                                        @for ($s = 0; $s < 5; $s++)
                                            <i class="bi bi-star-fill" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    @if (!empty($item->description))
                                        <p class="hp-menu-card__desc">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 100) }}
                                        </p>
                                    @elseif (!empty($item->address))
                                        <p class="hp-menu-card__desc">{{ $item->address }}</p>
                                    @endif
                                    <a href="{{ route('post', ['slug' => $item->slug]) }}" class="hp-menu-card__btn"
                                        title="View menu {{ $item->title }}">View Menu &amp; Details</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Features --}}
        @if ($features->count())
            <section class="hp-section" aria-labelledby="hpFeaturesTitle">
                <div class="hp-container">
                    <div class="hp-section__head" style="justify-content:center;text-align:center;margin-bottom:2.5rem">
                        <h2 id="hpFeaturesTitle" class="hp-section__title">
                            {!! data_get($cb, 'trust.title_html') ?: 'Menus made easier to <em style="font-style:normal;color:#6d28d9">trust</em>.' !!}
                        </h2>
                    </div>
                    <div class="hp-features">
                        @foreach ($features->take(4) as $item)
                            <article class="hp-feature">
                                <div class="hp-feature__icon" aria-hidden="true">
                                    @if (!empty($item->thumbnail))
                                        <img src="{{ getImageThumb($item->thumbnail, 48, 48) }}" alt="">
                                    @else
                                        <i class="bi bi-check2-circle"></i>
                                    @endif
                                </div>
                                <h3 class="hp-feature__title">{{ $item->title ?? '' }}</h3>
                                <p class="hp-feature__text">{{ $item->description ?? '' }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Food stories --}}
        @if ($bannerGuide->count())
            <section class="hp-section hp-section--soft" aria-labelledby="hpStoriesTitle">
                <div class="hp-container">
                    <div class="hp-section__head">
                        <h2 id="hpStoriesTitle" class="hp-section__title">
                            {!! data_get($cb, 'guides.title_html') ?: 'Food Stories' !!}
                        </h2>
                        <a href="#" class="hp-section__link" title="Read all stories">Read all stories</a>
                    </div>
                    <div class="hp-grid-stories">
                        @foreach ($bannerGuide->take(3) as $item)
                            <article class="hp-story-card">
                                <a href="{{ $item->link_redirect ?: '#' }}" class="hp-story-card__img"
                                    title="{{ $item->title ?? '' }}">
                                    @if (!empty($item->thumbnail))
                                        <img src="{{ getImageThumb($item->thumbnail) }}"
                                            alt="{{ $item->title ?? '' }}" loading="lazy">
                                    @endif
                                </a>
                                <div class="hp-story-card__body">
                                    <span class="hp-story-card__cat">{{ $item->youtobe ?? 'Guide' }}</span>
                                    <h3 class="hp-story-card__title">
                                        <a href="{{ $item->link_redirect ?: '#' }}"
                                            title="{{ $item->title ?? '' }}">{{ $item->title ?? '' }}</a>
                                    </h3>
                                    @if (!empty($item->description))
                                        <p class="hp-story-card__meta">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 80) }}
                                        </p>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Top cities --}}
        @if ($bannerCity->count())
            <section class="hp-section" id="cities" aria-labelledby="hpCitiesTitle">
                <div class="hp-container">
                    <div class="hp-section__head">
                        <h2 id="hpCitiesTitle" class="hp-section__title">
                            {!! data_get($cb, 'cities.title_html') ?: 'Top Cities for Local Menus.' !!}
                        </h2>
                    </div>
                    <div class="hp-grid-cities">
                        @foreach ($bannerCity->take(8) as $item)
                            <a href="{{ $item->link_redirect ?: '#' }}" class="hp-city-card"
                                title="{{ $item->title ?? '' }}">
                                <div class="hp-city-card__img">
                                    @if (!empty($item->thumbnail))
                                        <img src="{{ getImageThumb($item->thumbnail) }}"
                                            alt="{{ $item->title ?? '' }}" loading="lazy">
                                    @endif
                                </div>
                                <div class="hp-city-card__overlay"></div>
                                <div class="hp-city-card__body">
                                    <h3 class="hp-city-card__name">{{ $item->title ?? '' }}</h3>
                                    @if (!empty($item->description))
                                        <p class="hp-city-card__count">{{ $item->description }}</p>
                                    @endif
                                    <span class="hp-city-card__link">Explore now</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- CTA --}}
        <section class="hp-cta" aria-labelledby="hpCtaTitle">
            <div class="hp-container">
                <div class="hp-cta__box">
                    <h2 id="hpCtaTitle" class="hp-cta__title">
                        {{ data_get($cb, 'owners.title', 'Bring your menu to more hungry customers') }}
                    </h2>
                    <a href="{{ data_get($cb, 'owners.btn1_url', url('/')) }}" class="hp-cta__btn"
                        title="{{ data_get($cb, 'owners.btn1_text', 'Get started now') }}">
                        {{ data_get($cb, 'owners.btn1_text', 'Get started now') }}
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('hpSearchInput');
            document.querySelectorAll('.hp-tag[data-hp-q]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    if (input) {
                        input.value = btn.getAttribute('data-hp-q') || '';
                        input.focus();
                    }
                });
            });
        });
    </script>
@endpush
