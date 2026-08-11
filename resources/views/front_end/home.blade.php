@php
    $config_banner = getValueSetting('config_banner');
    $config_seo = getValueSetting('config_seo');
    $cb = is_object($config_banner) ? $config_banner : (object) [];

    $bannerHeroChips = $bannerHeroChips ?? collect();
    $bannerHeroBoard = $bannerHeroBoard ?? collect();
    $bannerValue = $bannerValue ?? collect();
    $bannerMood = $bannerMood ?? collect();
    $bannerCountry = $bannerCountry ?? collect();
    $bannerCity = $bannerCity ?? collect();
    $bannerCuisine = $bannerCuisine ?? collect();
    $bannerTrust = $bannerTrust ?? collect();
    $bannerGuide = $bannerGuide ?? collect();
    $bannerPassport = $bannerPassport ?? collect();
    $posts = $posts ?? collect();
@endphp
@extends('front_end._index')
@section('content')

    <section class="mj-hero" data-type="hero" aria-labelledby="heroTitle">
        <div class="mj-hero-bg" aria-hidden="true">
            <div class="mj-hero-grain"></div>
            <div class="mj-hero-blob mj-hero-blob-1"></div>
            <div class="mj-hero-blob mj-hero-blob-2"></div>
        </div>
        <div class="container-xxl">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 mj-hero-copy">
                    <span class="mj-eyebrow">
                        <span class="mj-eyebrow-dot" aria-hidden="true"></span>
                        {{ data_get($cb, 'hero.eyebrow', 'Global Menu Atlas') }}
                    </span>
                    <h1 id="heroTitle" class="mj-hero-title">
                        {!! data_get($cb, 'hero.title_html') ?: 'Taste the world <span class="mj-h-script">before</span> you order.' !!}
                    </h1>
                    <p class="mj-hero-lede">
                        {{ data_get($cb, 'hero.lede', 'Menujoys turns everyday menus into a curated food atlas — helping diners explore local cafés, restaurants, bakeries, food trucks, and hidden gems across global cities.') }}
                    </p>
                    <form class="mj-search" id="mjSearchForm" role="search" onsubmit="return false;"
                        aria-label="Search menus and locations">
                        <div class="mj-search-row">
                            <div class="mj-field">
                                <label for="searchQuery"
                                    class="mj-field-label">{{ data_get($cb, 'hero.label_query', 'Food, restaurant, or dish') }}</label>
                                <div class="mj-field-input">
                                    <i class="bi bi-search" aria-hidden="true"></i>
                                    <input type="text" id="searchQuery" name="q"
                                        placeholder="{{ data_get($cb, 'hero.placeholder_query', 'Pizza, ramen, coffee, burgers...') }}"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="mj-field">
                                <label for="searchLocation"
                                    class="mj-field-label">{{ data_get($cb, 'hero.label_location', 'City or location') }}</label>
                                <div class="mj-field-input">
                                    <i class="bi bi-geo-alt" aria-hidden="true"></i>
                                    <input type="text" id="searchLocation" name="location"
                                        placeholder="{{ data_get($cb, 'hero.placeholder_location', 'New York, London, Toronto...') }}"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <button type="button" class="mj-btn mj-btn-primary mj-btn-lg mj-search-submit">
                                <span>{{ data_get($cb, 'hero.btn_text', 'Find Menus') }}</span>
                                <i class="bi bi-arrow-right" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>

                    {{-- data-type="banner_hero_chip" --}}
                    @if ($bannerHeroChips->count() > 0)
                        <div class="mj-chips" data-type="banner_hero_chip" role="list" aria-label="Popular searches">
                            @foreach ($bannerHeroChips as $chip)
                                <button type="button" class="mj-chip" data-q="{{ $chip->title ?? '' }}"
                                    data-loc="{{ $chip->description ?? '' }}" role="listitem">
                                    {{ $chip->title ?? '' }}{{ !empty($chip->description) ? ' in ' . $chip->description : '' }}
                                </button>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ data_get($cb, 'hero.link_url', url('#')) }}"
                        title="{{ data_get($cb, 'hero.link_text', 'Add Your Menu') }}" class="mj-link-arrow">
                        <span>{{ data_get($cb, 'hero.link_text', 'Add Your Menu') }}</span>
                        <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                    </a>
                </div>

                {{-- data-type="banner_hero_board" --}}
                <div class="col-lg-6 mj-hero-visual" aria-hidden="true">
                    <div class="mj-board" data-type="banner_hero_board">
                        <span class="mj-board-spark mj-board-spark-1">✦</span>
                        <span class="mj-board-spark mj-board-spark-2">✦</span>
                        <span class="mj-board-spark mj-board-spark-3">✦</span>
                        <div class="mj-ring mj-ring-a"></div>
                        <div class="mj-ring mj-ring-b"></div>

                        @if ($bannerHeroBoard->count())
                            @foreach ($bannerHeroBoard->take(5)->values() as $i => $card)
                                @if ($i === 0)
                                    <article class="mj-board-card mj-board-main">
                                        <div class="mj-board-main-art" {{ !empty($card->thumbnail) ? "style='background-image:url(" . getImageThumb($card->thumbnail) . ")'" : '' }} aria-hidden="true">
                                            <span class="mj-art-bun mj-art-bun-top"></span>
                                            <span class="mj-art-lettuce"></span>
                                            <span class="mj-art-tomato"></span>
                                            <span class="mj-art-patty"></span>
                                            <span class="mj-art-bun mj-art-bun-bottom"></span>
                                        </div>
                                        <div class="mj-board-main-meta">
                                            <span class="mj-tag mj-tag-pick"><i class="bi bi-stars" aria-hidden="true"></i>
                                                Editor's Joy Pick</span>
                                            <h3 class="mj-board-title">{{ $card->title ?? '' }}</h3>
                                            <p class="mj-board-sub">{{ $card->description ?? '' }}</p>
                                        </div>
                                    </article>
                                @else
                                    <article class="mj-board-card mj-board-float mj-board-float-{{ $i }}">
                                        <div class="mj-float-icon" aria-hidden="true"><i class="bi bi-stars"></i></div>
                                        <div>
                                            <h4 class="mj-float-title">{{ $card->title ?? '' }}</h4>
                                            <p class="mj-float-sub">{{ $card->description ?? '' }}</p>
                                        </div>
                                    </article>
                                @endif
                            @endforeach
                        @else
                            <article class="mj-board-card mj-board-main">
                                <div class="mj-board-main-art" aria-hidden="true">
                                    <span class="mj-art-bun mj-art-bun-top"></span>
                                    <span class="mj-art-lettuce"></span>
                                    <span class="mj-art-tomato"></span>
                                    <span class="mj-art-patty"></span>
                                    <span class="mj-art-bun mj-art-bun-bottom"></span>
                                    <span class="mj-art-sesame mj-art-sesame-1"></span>
                                    <span class="mj-art-sesame mj-art-sesame-2"></span>
                                    <span class="mj-art-sesame mj-art-sesame-3"></span>
                                </div>
                                <div class="mj-board-main-meta">
                                    <span class="mj-tag mj-tag-pick"><i class="bi bi-stars" aria-hidden="true"></i>
                                        Editor's Joy Pick</span>
                                    <h3 class="mj-board-title">Brooklyn Burger Table</h3>
                                    <p class="mj-board-sub">Signature Stack Burger</p>
                                    <div class="mj-board-footer">
                                        <span class="mj-board-price">$14.90</span>
                                        <span class="mj-board-rating"><i class="bi bi-star-fill" aria-hidden="true"></i>
                                            4.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mj-board-card mj-board-float mj-board-float-1">
                                <div class="mj-float-icon mj-float-icon-coffee" aria-hidden="true"><i
                                        class="bi bi-cup-hot"></i></div>
                                <div>
                                    <span class="mj-tag mj-tag-popular">Popular Today</span>
                                    <h4 class="mj-float-title">Iced Matcha Latte</h4>
                                    <p class="mj-float-sub">London café menus</p>
                                </div>
                            </article>
                            <article class="mj-board-card mj-board-float mj-board-float-2">
                                <div class="mj-float-icon mj-float-icon-vegan" aria-hidden="true"><i
                                        class="bi bi-flower1"></i></div>
                                <div>
                                    <span class="mj-tag mj-tag-vegan">Plant-Based</span>
                                    <h4 class="mj-float-title">Vegan Bento Bowl</h4>
                                    <p class="mj-float-sub">Toronto fresh finds</p>
                                </div>
                            </article>
                            <article class="mj-board-card mj-board-float mj-board-float-3">
                                <div class="mj-float-icon mj-float-icon-brunch" aria-hidden="true"><i
                                        class="bi bi-egg-fried"></i></div>
                                <div>
                                    <span class="mj-tag mj-tag-open">Open Now</span>
                                    <h4 class="mj-float-title">Harbour Brunch</h4>
                                    <p class="mj-float-sub">Sydney weekend menus</p>
                                </div>
                            </article>
                            <article class="mj-board-card mj-board-float mj-board-float-4">
                                <div class="mj-float-icon mj-float-icon-sweet" aria-hidden="true"><i
                                        class="bi bi-cake2"></i></div>
                                <div>
                                    <span class="mj-tag mj-tag-sweet">Sweet Spot</span>
                                    <h4 class="mj-float-title">Honey Olive Cake</h4>
                                    <p class="mj-float-sub">Melbourne bakeries</p>
                                </div>
                            </article>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== VALUE =====
         config_banner.value (text)
         data-type="banner_value"
    --}}
    @if ($bannerValue->count() > 0)
        <section class="mj-section mj-value" data-type="banner_value"
            aria-label="{{ data_get($cb, 'value.aria', 'Why Menujoys') }}">
            <div class="container-xxl">
                <div class="row g-4">
                    @foreach ($bannerValue as $item)
                        <div class="col-md-6 col-lg-3">
                            <article class="mj-value-card">
                                <span class="mj-value-icon mj-icon-cacao" aria-hidden="true">
                                    @if (!empty($item->thumbnail))
                                        <img src="{{ getImageThumb($item->thumbnail, 48, 48) }}" alt="">
                                    @else
                                        <i class="bi bi-journal-text"></i>
                                    @endif
                                </span>
                                <h3 class="mj-value-title">{{ $item->title ?? '' }}</h3>
                                <p class="mj-value-text">{{ $item->description ?? '' }}</p>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ===== MOODS =====
         config_banner.moods (text)
         data-type="banner_mood"
    --}}
    @if ($bannerMood->count() > 0)
        <section class="mj-section mj-moods" data-type="banner_mood" id="explore" aria-labelledby="moodsTitle">
            <div class="container-xxl">
                <div class="mj-section-head">
                    <span class="mj-eyebrow">{{ data_get($cb, 'moods.eyebrow', 'Food Moods') }}</span>
                    <h2 id="moodsTitle" class="mj-section-title">
                        {!! data_get($cb, 'moods.title_html') ?: 'Start with how you <span class="mj-h-script">feel.</span>' !!}
                    </h2>
                    <p class="mj-section-text">
                        {{ data_get($cb, 'moods.text', 'Menujoys helps people discover menus by emotion, moment, and craving — not only by restaurant name.') }}
                    </p>
                </div>
                <div class="row g-3 g-lg-4">
                    @foreach ($bannerMood as $item)
                        <div class="col-6 col-lg-3">
                            <a href="{{ $item->link_redirect ?: '#' }}" class="mj-mood-card"
                                title="{{ $item->title ?? '' }}">
                                <span class="mj-mood-icon" aria-hidden="true">
                                    @if (!empty($item->thumbnail))
                                        <img src="{{ getImageThumb($item->thumbnail, 40, 40) }}" alt="">
                                    @else
                                        <i class="bi bi-fire"></i>
                                    @endif
                                </span>
                                <h3 class="mj-mood-title">{{ $item->title ?? '' }}</h3>
                                <p class="mj-mood-text">{{ $item->description ?? '' }}</p>
                                <span class="mj-mood-arrow" aria-hidden="true"><i
                                        class="bi bi-arrow-up-right"></i></span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ===== COUNTRIES =====
         config_banner.countries (text)
         data-type="banner_country"
    --}}
    @if ($bannerCountry->count() > 0)
        <section class="mj-section mj-rollout" data-type="banner_country" id="countries" aria-labelledby="rolloutTitle">
            <div class="mj-rollout-noise" aria-hidden="true"></div>
            <div class="container-xxl">
                <div class="row align-items-end g-4 mb-5">
                    <div class="col-lg-7">
                        <span
                            class="mj-eyebrow mj-eyebrow-light">{{ data_get($cb, 'countries.eyebrow', 'English-first rollout') }}</span>
                        <h2 id="rolloutTitle" class="mj-section-title mj-section-title-light">
                            {!! data_get($cb, 'countries.title_html') ?:
                                'Explore food cities with an <span class="mj-h-gold">editorial lens.</span>' !!}
                        </h2>
                        <p class="mj-section-text mj-section-text-light">
                            {{ data_get($cb, 'countries.text', 'Menujoys begins with global English-speaking markets, city by city, menu by menu.') }}
                        </p>
                    </div>
                    <div class="col-lg-5 text-lg-end">
                        <a href="{{ data_get($cb, 'countries.btn_url', '#countries') }}" class="mj-btn mj-btn-gold">
                            <span>{{ data_get($cb, 'countries.btn_text', 'Browse Countries') }}</span>
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach ($bannerCountry as $i => $item)
                        <div class="col-md-6 col-lg-3">
                            <article class="mj-country-card">
                                <div class="mj-country-head">
                                    <span class="mj-country-step">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                    <h3 class="mj-country-name">{{ $item->title ?? '' }}</h3>
                                </div>
                                @if (!empty($item->description))
                                    <ul class="mj-country-cities">
                                        @foreach (preg_split('/\r\n|\r|\n|,/', $item->description) as $city)
                                            @if (trim($city) !== '')
                                                <li>{{ trim($city) }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                                <a href="{{ $item->link_redirect ?: '#' }}" class="mj-country-cta">
                                    {{ $item->youtobe ?: 'Explore Menus' }}
                                    <i class="bi bi-arrow-right" aria-hidden="true"></i>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
                @if (!empty(data_get($cb, 'countries.extras')))
                    <ul class="mj-country-extras" aria-label="More markets coming soon">
                        @foreach (preg_split('/\r\n|\r|\n|,/', data_get($cb, 'countries.extras')) as $extra)
                            @if (trim($extra) !== '')
                                <li><i class="bi bi-geo" aria-hidden="true"></i> {{ trim($extra) }}</li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    @endif
    {{-- ===== CITIES =====
         config_banner.cities (text)
         data-type="banner_city"
    --}}
    @if ($bannerCity->count() > 0)
        <section class="mj-section mj-cities" data-type="banner_city" id="cities" aria-labelledby="citiesTitle">
            <div class="container-xxl">
                <div class="mj-section-head">
                    <span class="mj-eyebrow">{{ data_get($cb, 'cities.eyebrow', 'City Atlas') }}</span>
                    <h2 id="citiesTitle" class="mj-section-title">
                        {!! data_get($cb, 'cities.title_html') ?: 'Top Cities for <span class="mj-h-script">Local Menus.</span>' !!}
                    </h2>
                    <p class="mj-section-text">
                        {{ data_get($cb, 'cities.text', 'Find cafés, restaurants, food trucks, and local favorites in popular food cities.') }}
                    </p>
                </div>
                <div class="row g-3 g-lg-4">
                    @foreach ($bannerCity as $i => $item)
                        <div class="col-sm-6 col-lg-3">
                            <a href="{{ $item->link_redirect ?: '#' }}"
                                class="mj-city-card mj-city-{{ ($i % 8) + 1 }}">
                                <div class="mj-city-art" aria-hidden="true">
                                    @if (!empty($item->thumbnail))
                                        <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title ?? '' }}">
                                    @endif
                                </div>
                                <div class="mj-city-body">
                                    <h3 class="mj-city-name">{{ $item->title ?? '' }}</h3>
                                    <p class="mj-city-country">{{ $item->youtobe ?? '' }}</p>
                                    <p class="mj-city-tags">{{ $item->description ?? '' }}</p>
                                    <span class="mj-city-cta">Explore city menus <i class="bi bi-arrow-right"
                                            aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ===== FEATURED =====
         config_banner.featured (text)
         data-type="posts" (brand)
    --}}
    <section class="mj-section mj-featured" data-type="featured" aria-labelledby="featuredTitle">
        <div class="container-xxl">
            <div class="mj-section-head">
                <span class="mj-eyebrow">{{ data_get($cb, 'featured.eyebrow', 'Featured Menus') }}</span>
                <h2 id="featuredTitle" class="mj-section-title">
                    {!! data_get($cb, 'featured.title_html') ?: 'Menus worth <span class="mj-h-script">bookmarking.</span>' !!}
                </h2>
                <p class="mj-section-text">
                    {{ data_get($cb, 'featured.text', 'Sample menu cards designed for future scalable restaurant subdomains and menu pages.') }}
                </p>
            </div>
            <div class="row g-4">
                @forelse ($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <article class="mj-menu-card">
                            <div class="mj-menu-cover mj-cover-bowl" aria-hidden="true">
                                <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{ $post->title }}">
                                    <img class="lazy" src="{{ asset('public/dot.jpg') }}"
                                        data-src="{{ getImageThumb($post->thumbnail) }}" alt="{{ $post->title }}" />
                                </a>
                            </div>
                            <div class="mj-menu-body">
                                <div class="mj-menu-head">
                                    <h3 class="mj-menu-name">
                                        <a href="{{ route('post', ['slug' => $post->slug]) }}"
                                            title="{{ $post->title }}">{{ $post->title }}</a>
                                    </h3>
                                </div>
                                @if (!empty($post->address))
                                    <p class="mj-menu-loc"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                                        {{ $post->address }}</p>
                                @endif
                                @if (!empty($post->description))
                                    <p class="mj-menu-pop">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->description), 120) }}
                                    </p>
                                @endif
                                <a href="{{ route('post', ['slug' => $post->slug]) }}" title="View Menu"
                                    class="mj-menu-cta">
                                    View Menu <i class="bi bi-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="mj-section-text">No featured menus yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== PASSPORT =====
         config_banner.passport (text)
         data-type="banner_passport" (ảnh)
    --}}
    @if ($bannerPassport->count() > 0)
        <section class="mj-section mj-passport" data-type="passport" aria-labelledby="passportTitle">
            <div class="container-xxl">
                <div class="row align-items-center g-5">
                    <div class="col-lg-5">
                        <span class="mj-eyebrow">{{ data_get($cb, 'passport.eyebrow', 'Brand Signature') }}</span>
                        <h2 id="passportTitle" class="mj-section-title">
                            {!! data_get($cb, 'passport.title_html') ?: 'Your Local <span class="mj-h-script">Food Passport.</span>' !!}
                        </h2>
                        <p class="mj-section-text">
                            {{ data_get($cb, 'passport.text', 'Travel through menus, flavors, and neighborhoods — even before you book a table or place an order.') }}
                        </p>
                        <ul class="mj-passport-list">
                            @php
                                $passportItems = preg_split(
                                    '/\r\n|\r|\n/',
                                    (string) data_get(
                                        $cb,
                                        'passport.items',
                                        "Collect city flavor stamps as you explore\nSave menus, dishes, and food joys to revisit\nBuild a personal global tasting list",
                                    ),
                                );
                            @endphp
                            @foreach ($passportItems as $li)
                                @if (trim($li) !== '')
                                    <li><i class="bi bi-check2-circle" aria-hidden="true"></i>
                                        {{ trim($li) }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <a href="{{ data_get($cb, 'passport.btn_url', '#explore') }}"
                            class="mj-btn mj-btn-primary mj-btn-lg">
                            <span>{{ data_get($cb, 'passport.btn_text', 'Start Exploring') }}</span>
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    {{-- data-type="banner_passport" --}}
                    <div class="col-lg-7">
                        @php
                            $passportImage = $bannerPassport->first(fn($item) => !empty($item->thumbnail));
                        @endphp
                        @if ($passportImage)
                            <div class="mj-passport-visual" data-type="banner_passport">
                                @if (!empty($passportImage->link_redirect))
                                    <a href="{{ $passportImage->link_redirect }}"
                                        title="{{ $passportImage->title ?? '' }}">
                                        <img src="{{ getImageThumb($passportImage->thumbnail) }}"
                                            alt="{{ $passportImage->title ?? '' }}" class="img-fluid w-100 rounded-4">
                                    </a>
                                @else
                                    <img src="{{ getImageThumb($passportImage->thumbnail) }}"
                                        alt="{{ $passportImage->title ?? '' }}" class="img-fluid w-100 rounded-4">
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- ===== CUISINES =====
         config_banner.cuisines (text)
         data-type="banner_cuisine"
    --}}
    @if ($bannerCuisine->count() > 0)
        <section class="mj-section mj-cuisines" data-type="banner_cuisine" id="cuisines"
            aria-labelledby="cuisinesTitle">
            <div class="container-xxl">
                <div class="mj-section-head">
                    <span class="mj-eyebrow">{{ data_get($cb, 'cuisines.eyebrow', 'Cuisine Index') }}</span>
                    <h2 id="cuisinesTitle" class="mj-section-title">
                        {!! data_get($cb, 'cuisines.title_html') ?: 'Browse by <span class="mj-h-script">craving.</span>' !!}
                    </h2>
                    <p class="mj-section-text">
                        {{ data_get($cb, 'cuisines.text', 'Build scalable cuisine pages from popular global search intent.') }}
                    </p>
                </div>
                <div class="row g-3">
                    @foreach ($bannerCuisine as $item)
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ $item->link_redirect ?: '#' }}" class="mj-cuisine-card"
                                title="{{ $item->title ?? '' }}">
                                <span class="mj-cuisine-icon" aria-hidden="true">
                                    @if (!empty($item->thumbnail))
                                        <img src="{{ getImageThumb($item->thumbnail, 40, 40) }}" alt="">
                                    @else
                                        <i class="bi bi-stars"></i>
                                    @endif
                                </span>
                                <div>
                                    <h3 class="mj-cuisine-name">{{ $item->title ?? '' }}</h3>
                                    <p class="mj-cuisine-text">{{ $item->description ?? '' }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ===== OWNERS =====
         config_banner.owners (text only)
    --}}
    <section class="mj-section mj-owners" data-type="owners" id="owners" aria-labelledby="ownersTitle">
        <div class="container-xxl">
            <div class="mj-owners-card">
                <div class="mj-owners-grain" aria-hidden="true"></div>
                <div class="row align-items-center g-5 position-relative">
                    <div class="col-lg-7">
                        <span
                            class="mj-eyebrow mj-eyebrow-light">{{ data_get($cb, 'owners.eyebrow', 'For Restaurants') }}</span>
                        <h2 id="ownersTitle" class="mj-section-title mj-section-title-light">
                            {{ data_get($cb, 'owners.title', 'Own a restaurant, café, or food spot?') }}
                        </h2>
                        <p class="mj-section-text mj-section-text-light">
                            {{ data_get($cb, 'owners.text', 'Bring your menu to more hungry customers with a joyful, searchable Menujoys page.') }}
                        </p>
                        <ul class="mj-owners-list">
                            @php
                                $ownerItems = preg_split(
                                    '/\r\n|\r|\n/',
                                    (string) data_get(
                                        $cb,
                                        'owners.items',
                                        "Add or update your menu\nShow prices and popular dishes\nHelp customers find you by city, cuisine, or craving\nClaim your local food page\nKeep opening hours and contact details accurate",
                                    ),
                                );
                            @endphp
                            @foreach ($ownerItems as $li)
                                @if (trim($li) !== '')
                                    <li><i class="bi bi-check2" aria-hidden="true"></i> {{ trim($li) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="mj-owners-actions">
                            <a href="{{ data_get($cb, 'owners.btn1_url', '#') }}" class="mj-btn mj-btn-gold mj-btn-lg">
                                <i class="bi bi-plus-circle" aria-hidden="true"></i>
                                <span>{{ data_get($cb, 'owners.btn1_text', 'Add Your Menu') }}</span>
                            </a>
                            <a href="{{ data_get($cb, 'owners.btn2_url', '#') }}"
                                class="mj-btn mj-btn-ghost-light mj-btn-lg">
                                <i class="bi bi-shield-check" aria-hidden="true"></i>
                                <span>{{ data_get($cb, 'owners.btn2_text', 'Claim Listing') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="mj-owners-mock" aria-hidden="true">
                            <div class="mj-mock-window">
                                <span class="mj-mock-dot"></span><span class="mj-mock-dot"></span><span
                                    class="mj-mock-dot"></span>
                                <span class="mj-mock-url">menujoys.com / your-restaurant</span>
                            </div>
                            <div class="mj-mock-content">
                                <div class="mj-mock-line mj-mock-line-1"></div>
                                <div class="mj-mock-line mj-mock-line-2"></div>
                                <div class="mj-mock-line mj-mock-line-3"></div>
                                <div class="mj-mock-grid"><span></span><span></span><span></span><span></span>
                                </div>
                                <div class="mj-mock-cta">View Menu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== TRUST =====
         config_banner.trust (text)
         data-type="banner_trust"
    --}}
    @if ($bannerTrust->count() > 0)
        <section class="mj-section mj-trust" data-type="banner_trust" aria-labelledby="trustTitle">
            <div class="container-xxl">
                <div class="mj-section-head">
                    <span class="mj-eyebrow">{{ data_get($cb, 'trust.eyebrow', 'Trusted Discovery') }}</span>
                    <h2 id="trustTitle" class="mj-section-title">
                        {!! data_get($cb, 'trust.title_html') ?: 'Menus made easier to <span class="mj-h-script">trust.</span>' !!}
                    </h2>
                    <p class="mj-section-text">
                        {{ data_get($cb, 'trust.text', 'Menujoys helps diners make better choices with clear, useful, and regularly updated menu information.') }}
                    </p>
                </div>
                <div class="row g-3 g-lg-4">
                    @foreach ($bannerTrust as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="mj-trust-item">
                                <span class="mj-trust-icon" aria-hidden="true"><i class="bi bi-check2-circle"></i></span>
                                <div>
                                    <h3 class="mj-trust-title">{{ $item->title ?? '' }}</h3>
                                    <p class="mj-trust-text">{{ $item->description ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ===== GUIDES =====
         config_banner.guides (text)
         data-type="banner_guide"
    --}}
    @if ($bannerGuide->count() > 0)
        <section class="mj-section mj-guides" data-type="banner_guide" aria-labelledby="guidesTitle">
            <div class="container-xxl">
                <div class="mj-section-head">
                    <span class="mj-eyebrow">{{ data_get($cb, 'guides.eyebrow', 'Field Notes') }}</span>
                    <h2 id="guidesTitle" class="mj-section-title">
                        {!! data_get($cb, 'guides.title_html') ?: 'Field Notes from the <span class="mj-h-script">Food Atlas.</span>' !!}
                    </h2>
                    <p class="mj-section-text">
                        {{ data_get($cb, 'guides.text', 'Explore local food trends, city guides, and menu inspiration.') }}
                    </p>
                </div>
                <div class="row g-4">
                    @foreach ($bannerGuide as $i => $item)
                        <div class="col-md-6 col-lg-4">
                            <article class="mj-guide-card">
                                <div class="mj-guide-cover mj-guide-cover-{{ ($i % 3) + 1 }}" aria-hidden="true"
                                    @if (!empty($item->thumbnail)) style="background-image:url('{{ getImageThumb($item->thumbnail) }}')" @endif>
                                    <span class="mj-guide-issue">Issue
                                        №{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="mj-guide-body">
                                    <span class="mj-guide-cat">{{ $item->youtobe ?? 'Guide' }}</span>
                                    <h3 class="mj-guide-title">{{ $item->title ?? '' }}</h3>
                                    <p class="mj-guide-excerpt">{{ $item->description ?? '' }}</p>
                                    <a href="{{ $item->link_redirect ?: '#' }}" title="Read Guide"
                                        class="mj-guide-cta">
                                        Read Guide <i class="bi bi-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- ===== FINAL CTA =====
         config_banner.final (text only)
    --}}

    <section class="mj-section mj-final-cta" data-type="final" aria-labelledby="finalTitle">
        <div class="container-xxl">
            <div class="mj-final-card">
                <div class="mj-final-deco" aria-hidden="true">
                    <span class="mj-final-spark mj-final-spark-1">✦</span>
                    <span class="mj-final-spark mj-final-spark-2">✦</span>
                </div>
                <h2 id="finalTitle" class="mj-final-title">
                    {!! data_get($cb, 'final.title_html') ?: 'Ready to find your next <span class="mj-h-script">joyful menu?</span>' !!}
                </h2>
                <p class="mj-final-text">
                    {{ data_get($cb, 'final.text', 'Search local menus, discover new dishes, and explore food spots around the world with Menujoys.') }}
                </p>
                <div class="mj-final-actions">
                    <a href="{{ data_get($cb, 'final.btn1_url', '#explore') }}" class="mj-btn mj-btn-primary mj-btn-lg">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <span>{{ data_get($cb, 'final.btn1_text', 'Explore Menus') }}</span>
                    </a>
                    <a href="{{ data_get($cb, 'final.btn2_url', url('#')) }}" class="mj-btn mj-btn-outline mj-btn-lg">
                        <i class="bi bi-plus-circle" aria-hidden="true"></i>
                        <span>{{ data_get($cb, 'final.btn2_text', 'Add Your Menu') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
