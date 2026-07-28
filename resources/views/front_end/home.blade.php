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
    $posts = $posts ?? collect();
@endphp

@extends('front_end._index')
@section('content')
    {{-- ===== HERO (config_banner.hero + banner_hero_chip / banner_hero_board) ===== --}}
    <section class="mj-hero" aria-labelledby="heroTitle">
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
                    <form class="mj-search" id="mjSearchForm" role="search" aria-label="Search menus and locations">
                        <div class="mj-search-row">
                            <div class="mj-field">
                                <label for="searchQuery" class="mj-field-label">{{ data_get($cb, 'hero.label_query', 'Food, restaurant, or dish') }}</label>
                                <div class="mj-field-input">
                                    <i class="bi bi-search" aria-hidden="true"></i>
                                    <input type="text" id="searchQuery" name="q"
                                        placeholder="{{ data_get($cb, 'hero.placeholder_query', 'Pizza, ramen, coffee, burgers...') }}"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="mj-field">
                                <label for="searchLocation" class="mj-field-label">{{ data_get($cb, 'hero.label_location', 'City or location') }}</label>
                                <div class="mj-field-input">
                                    <i class="bi bi-geo-alt" aria-hidden="true"></i>
                                    <input type="text" id="searchLocation" name="location"
                                        placeholder="{{ data_get($cb, 'hero.placeholder_location', 'New York, London, Toronto...') }}"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <button type="submit" class="mj-btn mj-btn-primary mj-btn-lg mj-search-submit">
                                <span>{{ data_get($cb, 'hero.btn_text', 'Find Menus') }}</span>
                                <i class="bi bi-arrow-right" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>

                    <div class="mj-chips" role="list" aria-label="Popular searches">
                        @forelse ($bannerHeroChips as $chip)
                            <button type="button" class="mj-chip" data-q="{{ $chip->title ?? '' }}"
                                data-loc="{{ $chip->description ?? '' }}" role="listitem">
                                {{ $chip->title ?? '' }}{{ !empty($chip->description) ? ' in ' . $chip->description : '' }}
                            </button>
                        @empty
                            <button type="button" class="mj-chip" data-q="pizza" data-loc="New York" role="listitem">Pizza in New York</button>
                            <button type="button" class="mj-chip" data-q="coffee" data-loc="London" role="listitem">Coffee in London</button>
                            <button type="button" class="mj-chip" data-q="sushi" data-loc="Toronto" role="listitem">Sushi in Toronto</button>
                            <button type="button" class="mj-chip" data-q="brunch" data-loc="Sydney" role="listitem">Brunch in Sydney</button>
                            <button type="button" class="mj-chip" data-q="vegan" data-loc="" role="listitem">Vegan near me</button>
                        @endforelse
                    </div>

                    <a href="{{ data_get($cb, 'hero.link_url', url('/add-your-menu')) }}"
                        title="{{ data_get($cb, 'hero.link_text', 'Add Your Menu') }}" class="mj-link-arrow">
                        <span>{{ data_get($cb, 'hero.link_text', 'Add Your Menu') }}</span>
                        <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="col-lg-6 mj-hero-visual" aria-hidden="true">
                    <div class="mj-board">
                        <span class="mj-board-spark mj-board-spark-1">✦</span>
                        <span class="mj-board-spark mj-board-spark-2">✦</span>
                        <span class="mj-board-spark mj-board-spark-3">✦</span>
                        <div class="mj-ring mj-ring-a"></div>
                        <div class="mj-ring mj-ring-b"></div>

                        @if ($bannerHeroBoard->count())
                            @foreach ($bannerHeroBoard->take(5) as $i => $card)
                                @if ($i === 0)
                                    <article class="mj-board-card mj-board-main">
                                        <div class="mj-board-main-art" aria-hidden="true">
                                            @if (!empty($card->thumbnail))
                                                <img src="{{ getImageThumb($card->thumbnail) }}" alt="{{ $card->title ?? '' }}" style="width:100%;height:100%;object-fit:cover;border-radius:inherit;">
                                            @else
                                                <span class="mj-art-bun mj-art-bun-top"></span>
                                                <span class="mj-art-lettuce"></span>
                                                <span class="mj-art-tomato"></span>
                                                <span class="mj-art-patty"></span>
                                                <span class="mj-art-bun mj-art-bun-bottom"></span>
                                            @endif
                                        </div>
                                        <div class="mj-board-main-meta">
                                            <span class="mj-tag mj-tag-pick"><i class="bi bi-stars" aria-hidden="true"></i> Editor's Joy Pick</span>
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
                                    <span class="mj-tag mj-tag-pick"><i class="bi bi-stars" aria-hidden="true"></i> Editor's Joy Pick</span>
                                    <h3 class="mj-board-title">Brooklyn Burger Table</h3>
                                    <p class="mj-board-sub">Signature Stack Burger</p>
                                    <div class="mj-board-footer">
                                        <span class="mj-board-price">$14.90</span>
                                        <span class="mj-board-rating"><i class="bi bi-star-fill" aria-hidden="true"></i> 4.8</span>
                                    </div>
                                </div>
                            </article>
                            <article class="mj-board-card mj-board-float mj-board-float-1">
                                <div class="mj-float-icon mj-float-icon-coffee" aria-hidden="true"><i class="bi bi-cup-hot"></i></div>
                                <div>
                                    <span class="mj-tag mj-tag-popular">Popular Today</span>
                                    <h4 class="mj-float-title">Iced Matcha Latte</h4>
                                    <p class="mj-float-sub">London café menus</p>
                                </div>
                            </article>
                            <article class="mj-board-card mj-board-float mj-board-float-2">
                                <div class="mj-float-icon mj-float-icon-vegan" aria-hidden="true"><i class="bi bi-flower1"></i></div>
                                <div>
                                    <span class="mj-tag mj-tag-vegan">Plant-Based</span>
                                    <h4 class="mj-float-title">Vegan Bento Bowl</h4>
                                    <p class="mj-float-sub">Toronto fresh finds</p>
                                </div>
                            </article>
                            <article class="mj-board-card mj-board-float mj-board-float-3">
                                <div class="mj-float-icon mj-float-icon-brunch" aria-hidden="true"><i class="bi bi-egg-fried"></i></div>
                                <div>
                                    <span class="mj-tag mj-tag-open">Open Now</span>
                                    <h4 class="mj-float-title">Harbour Brunch</h4>
                                    <p class="mj-float-sub">Sydney weekend menus</p>
                                </div>
                            </article>
                            <article class="mj-board-card mj-board-float mj-board-float-4">
                                <div class="mj-float-icon mj-float-icon-sweet" aria-hidden="true"><i class="bi bi-cake2"></i></div>
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

    {{-- ===== VALUE (banner_value) ===== --}}
    <section class="mj-section mj-value" aria-label="{{ data_get($cb, 'value.aria', 'Why Menujoys') }}">
        <div class="container-xxl">
            <div class="row g-4">
                @forelse ($bannerValue as $item)
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
                @empty
                    <div class="col-md-6 col-lg-3">
                        <article class="mj-value-card">
                            <span class="mj-value-icon mj-icon-cacao" aria-hidden="true"><i class="bi bi-journal-text"></i></span>
                            <h3 class="mj-value-title">Menus, not noise</h3>
                            <p class="mj-value-text">Clear menu highlights, prices when available, and helpful dining details.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <article class="mj-value-card">
                            <span class="mj-value-icon mj-icon-red" aria-hidden="true"><i class="bi bi-globe2"></i></span>
                            <h3 class="mj-value-title">Global, local-first</h3>
                            <p class="mj-value-text">Start with English-speaking food cities, then explore flavors worldwide.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <article class="mj-value-card">
                            <span class="mj-value-icon mj-icon-olive" aria-hidden="true"><i class="bi bi-compass"></i></span>
                            <h3 class="mj-value-title">Craving-led discovery</h3>
                            <p class="mj-value-text">Search by dish, cuisine, city, food mood, or local dining moment.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <article class="mj-value-card">
                            <span class="mj-value-icon mj-icon-gold" aria-hidden="true"><i class="bi bi-bookmark-heart"></i></span>
                            <h3 class="mj-value-title">Useful by design</h3>
                            <p class="mj-value-text">Addresses, opening hours, dietary notes, and update signals in one place.</p>
                        </article>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== MOODS (config_banner.moods + banner_mood) ===== --}}
    <section class="mj-section mj-moods" id="explore" aria-labelledby="moodsTitle">
        <div class="container-xxl">
            <div class="mj-section-head">
                <span class="mj-eyebrow">{{ data_get($cb, 'moods.eyebrow', 'Food Moods') }}</span>
                <h2 id="moodsTitle" class="mj-section-title">
                    {!! data_get($cb, 'moods.title_html') ?: 'Start with how you <span class="mj-h-script">feel.</span>' !!}
                </h2>
                <p class="mj-section-text">{{ data_get($cb, 'moods.text', 'Menujoys helps people discover menus by emotion, moment, and craving — not only by restaurant name.') }}</p>
            </div>
            <div class="row g-3 g-lg-4">
                @forelse ($bannerMood as $item)
                    <div class="col-6 col-lg-3">
                        <a href="{{ $item->link_redirect ?: '#' }}" class="mj-mood-card" title="{{ $item->title ?? '' }}">
                            <span class="mj-mood-icon" aria-hidden="true">
                                @if (!empty($item->thumbnail))
                                    <img src="{{ getImageThumb($item->thumbnail, 40, 40) }}" alt="">
                                @else
                                    <i class="bi bi-fire"></i>
                                @endif
                            </span>
                            <h3 class="mj-mood-title">{{ $item->title ?? '' }}</h3>
                            <p class="mj-mood-text">{{ $item->description ?? '' }}</p>
                            <span class="mj-mood-arrow" aria-hidden="true"><i class="bi bi-arrow-up-right"></i></span>
                        </a>
                    </div>
                @empty
                    @php
                        $fallbackMoods = [
                            ['Comfort Food', 'Cozy classics, warm bowls, noodles, pies, and feel-good plates.', 'bi-fire'],
                            ['Fresh & Healthy', 'Bowls, salads, smoothies, lighter bites, and clean menu choices.', 'bi-flower1'],
                            ['Sweet Joys', 'Desserts, bakeries, waffles, pastries, cakes, and treat menus.', 'bi-cake2'],
                            ['Quick Bites', 'Fast casual, grab-and-go lunches, food trucks, and easy meals.', 'bi-lightning-charge'],
                            ['Date Night', 'Romantic spots, sharing plates, tasting menus, and memorable meals.', 'bi-suit-heart'],
                            ['Family Friendly', 'Menus that work for kids, groups, and everyone around the table.', 'bi-people'],
                            ['Coffee Break', 'Cafés, espresso bars, matcha, pastries, brunch, and quiet corners.', 'bi-cup-hot'],
                            ['Late Night', 'Menus for after-dark cravings, quick comfort, and night bites.', 'bi-moon-stars'],
                        ];
                    @endphp
                    @foreach ($fallbackMoods as $m)
                        <div class="col-6 col-lg-3">
                            <a href="#" class="mj-mood-card">
                                <span class="mj-mood-icon" aria-hidden="true"><i class="bi {{ $m[2] }}"></i></span>
                                <h3 class="mj-mood-title">{{ $m[0] }}</h3>
                                <p class="mj-mood-text">{{ $m[1] }}</p>
                                <span class="mj-mood-arrow" aria-hidden="true"><i class="bi bi-arrow-up-right"></i></span>
                            </a>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== COUNTRIES (config_banner.countries + banner_country) ===== --}}
    <section class="mj-section mj-rollout" id="countries" aria-labelledby="rolloutTitle">
        <div class="mj-rollout-noise" aria-hidden="true"></div>
        <div class="container-xxl">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-7">
                    <span class="mj-eyebrow mj-eyebrow-light">{{ data_get($cb, 'countries.eyebrow', 'English-first rollout') }}</span>
                    <h2 id="rolloutTitle" class="mj-section-title mj-section-title-light">
                        {!! data_get($cb, 'countries.title_html') ?: 'Explore food cities with an <span class="mj-h-gold">editorial lens.</span>' !!}
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
                @forelse ($bannerCountry as $i => $item)
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
                @empty
                    @php
                        $fallbackCountries = [
                            ['United States', ['New York', 'Los Angeles', 'Chicago', 'Austin'], 'Explore US Menus'],
                            ['United Kingdom', ['London', 'Manchester', 'Edinburgh', 'Bristol'], 'Explore UK Menus'],
                            ['Canada', ['Toronto', 'Vancouver', 'Montreal', 'Calgary'], 'Explore Canada'],
                            ['Australia', ['Sydney', 'Melbourne', 'Brisbane', 'Perth'], 'Explore Australia'],
                        ];
                    @endphp
                    @foreach ($fallbackCountries as $i => $c)
                        <div class="col-md-6 col-lg-3">
                            <article class="mj-country-card">
                                <div class="mj-country-head">
                                    <span class="mj-country-step">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                    <h3 class="mj-country-name">{{ $c[0] }}</h3>
                                </div>
                                <ul class="mj-country-cities">
                                    @foreach ($c[1] as $city)
                                        <li>{{ $city }}</li>
                                    @endforeach
                                </ul>
                                <a href="#" class="mj-country-cta">{{ $c[2] }} <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </article>
                        </div>
                    @endforeach
                @endforelse
            </div>
            @if (!empty(data_get($cb, 'countries.extras')))
                <ul class="mj-country-extras" aria-label="More markets coming soon">
                    @foreach (preg_split('/\r\n|\r|\n|,/', data_get($cb, 'countries.extras')) as $extra)
                        @if (trim($extra) !== '')
                            <li><i class="bi bi-geo" aria-hidden="true"></i> {{ trim($extra) }}</li>
                        @endif
                    @endforeach
                </ul>
            @else
                <ul class="mj-country-extras" aria-label="More markets coming soon">
                    <li><i class="bi bi-geo" aria-hidden="true"></i> New Zealand</li>
                    <li><i class="bi bi-geo" aria-hidden="true"></i> Ireland</li>
                    <li><i class="bi bi-geo" aria-hidden="true"></i> Singapore</li>
                    <li><i class="bi bi-geo" aria-hidden="true"></i> South Africa</li>
                </ul>
            @endif
        </div>
    </section>

    {{-- ===== CITIES (config_banner.cities + banner_city) ===== --}}
    <section class="mj-section mj-cities" id="cities" aria-labelledby="citiesTitle">
        <div class="container-xxl">
            <div class="mj-section-head">
                <span class="mj-eyebrow">{{ data_get($cb, 'cities.eyebrow', 'City Atlas') }}</span>
                <h2 id="citiesTitle" class="mj-section-title">
                    {!! data_get($cb, 'cities.title_html') ?: 'Top Cities for <span class="mj-h-script">Local Menus.</span>' !!}
                </h2>
                <p class="mj-section-text">{{ data_get($cb, 'cities.text', 'Find cafés, restaurants, food trucks, and local favorites in popular food cities.') }}</p>
            </div>
            <div class="row g-3 g-lg-4">
                @forelse ($bannerCity as $i => $item)
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ $item->link_redirect ?: '#' }}" class="mj-city-card mj-city-{{ ($i % 8) + 1 }}">
                            <div class="mj-city-art" aria-hidden="true">
                                @if (!empty($item->thumbnail))
                                    <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title ?? '' }}">
                                @else
                                    <span class="mj-city-skyline"></span>
                                @endif
                            </div>
                            <div class="mj-city-body">
                                <h3 class="mj-city-name">{{ $item->title ?? '' }}</h3>
                                <p class="mj-city-country">{{ $item->youtobe ?? '' }}</p>
                                <p class="mj-city-tags">{{ $item->description ?? '' }}</p>
                                <span class="mj-city-cta">Explore city menus <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </a>
                    </div>
                @empty
                    @php
                        $fallbackCities = [
                            ['New York', 'United States', 'Pizza · Coffee · Brunch · Burgers'],
                            ['London', 'United Kingdom', 'Coffee · Pubs · Curry · Bakery'],
                            ['Toronto', 'Canada', 'Sushi · Brunch · Bowls · Bakery'],
                            ['Sydney', 'Australia', 'Brunch · Coffee · Seafood · Thai'],
                            ['Los Angeles', 'United States', 'Tacos · Vegan · Brunch · Korean'],
                            ['Melbourne', 'Australia', 'Coffee · Brunch · Italian · Wine'],
                            ['Chicago', 'United States', 'Pizza · BBQ · Steak · Breakfast'],
                            ['Singapore', 'Singapore', 'Hawker · Laksa · Chili Crab · Kaya'],
                        ];
                    @endphp
                    @foreach ($fallbackCities as $i => $c)
                        <div class="col-sm-6 col-lg-3">
                            <a href="#" class="mj-city-card mj-city-{{ $i + 1 }}">
                                <div class="mj-city-art" aria-hidden="true"><span class="mj-city-skyline"></span></div>
                                <div class="mj-city-body">
                                    <h3 class="mj-city-name">{{ $c[0] }}</h3>
                                    <p class="mj-city-country">{{ $c[1] }}</p>
                                    <p class="mj-city-tags">{{ $c[2] }}</p>
                                    <span class="mj-city-cta">Explore city menus <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== FEATURED (posts) ===== --}}
    <section class="mj-section mj-featured" aria-labelledby="featuredTitle">
        <div class="container-xxl">
            <div class="mj-section-head">
                <span class="mj-eyebrow">{{ data_get($cb, 'featured.eyebrow', 'Featured Menus') }}</span>
                <h2 id="featuredTitle" class="mj-section-title">
                    {!! data_get($cb, 'featured.title_html') ?: 'Menus worth <span class="mj-h-script">bookmarking.</span>' !!}
                </h2>
                <p class="mj-section-text">{{ data_get($cb, 'featured.text', 'Sample menu cards designed for future scalable restaurant subdomains and menu pages.') }}</p>
            </div>
            <div class="row g-4">
                @forelse ($posts->take(6) as $post)
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
                                        <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{ $post->title }}">{{ $post->title }}</a>
                                    </h3>
                                </div>
                                @if (!empty($post->address))
                                    <p class="mj-menu-loc"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> {{ $post->address }}</p>
                                @endif
                                @if (!empty($post->description))
                                    <p class="mj-menu-pop">{{ \Illuminate\Support\Str::limit(strip_tags($post->description), 120) }}</p>
                                @endif
                                <a href="{{ route('post', ['slug' => $post->slug]) }}" title="View Menu" class="mj-menu-cta">
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

    {{-- ===== PASSPORT (config_banner.passport) ===== --}}
    <section class="mj-section mj-passport" aria-labelledby="passportTitle">
        <div class="container-xxl">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <span class="mj-eyebrow">{{ data_get($cb, 'passport.eyebrow', 'Brand Signature') }}</span>
                    <h2 id="passportTitle" class="mj-section-title">
                        {!! data_get($cb, 'passport.title_html') ?: 'Your Local <span class="mj-h-script">Food Passport.</span>' !!}
                    </h2>
                    <p class="mj-section-text">{{ data_get($cb, 'passport.text', 'Travel through menus, flavors, and neighborhoods — even before you book a table or place an order.') }}</p>
                    <ul class="mj-passport-list">
                        @php
                            $passportItems = preg_split('/\r\n|\r|\n/', (string) data_get($cb, 'passport.items', "Collect city flavor stamps as you explore\nSave menus, dishes, and food joys to revisit\nBuild a personal global tasting list"));
                        @endphp
                        @foreach ($passportItems as $li)
                            @if (trim($li) !== '')
                                <li><i class="bi bi-check2-circle" aria-hidden="true"></i> {{ trim($li) }}</li>
                            @endif
                        @endforeach
                    </ul>
                    <a href="{{ data_get($cb, 'passport.btn_url', '#explore') }}" class="mj-btn mj-btn-primary mj-btn-lg">
                        <span>{{ data_get($cb, 'passport.btn_text', 'Start Exploring') }}</span>
                        <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-lg-7">
                    <div class="mj-passport-book" aria-hidden="true">
                        <div class="mj-passport-spine"></div>
                        <div class="mj-passport-page">
                            <div class="mj-passport-page-head">
                                <div>
                                    <span class="mj-passport-eyebrow">Menujoys · Food Passport</span>
                                    <p class="mj-passport-id">№ MJ · 2026 · 0001</p>
                                </div>
                                <span class="mj-passport-seal"><i class="bi bi-stars" aria-hidden="true"></i></span>
                            </div>
                            <div class="mj-passport-stamps">
                                <span class="mj-stamp mj-stamp-1"><span class="mj-stamp-inner"><span class="mj-stamp-city">New York</span><span class="mj-stamp-cuisine">Pizza</span><span class="mj-stamp-date">2026</span></span></span>
                                <span class="mj-stamp mj-stamp-2"><span class="mj-stamp-inner"><span class="mj-stamp-city">London</span><span class="mj-stamp-cuisine">Coffee</span><span class="mj-stamp-date">2026</span></span></span>
                                <span class="mj-stamp mj-stamp-3"><span class="mj-stamp-inner"><span class="mj-stamp-city">Toronto</span><span class="mj-stamp-cuisine">Sushi</span><span class="mj-stamp-date">2026</span></span></span>
                                <span class="mj-stamp mj-stamp-4"><span class="mj-stamp-inner"><span class="mj-stamp-city">Sydney</span><span class="mj-stamp-cuisine">Brunch</span><span class="mj-stamp-date">2026</span></span></span>
                            </div>
                            <footer class="mj-passport-footer">
                                <span>Issued by Menujoys</span>
                                <span>Menus That Spark Joy</span>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CUISINES (config_banner.cuisines + banner_cuisine) ===== --}}
    <section class="mj-section mj-cuisines" id="cuisines" aria-labelledby="cuisinesTitle">
        <div class="container-xxl">
            <div class="mj-section-head">
                <span class="mj-eyebrow">{{ data_get($cb, 'cuisines.eyebrow', 'Cuisine Index') }}</span>
                <h2 id="cuisinesTitle" class="mj-section-title">
                    {!! data_get($cb, 'cuisines.title_html') ?: 'Browse by <span class="mj-h-script">craving.</span>' !!}
                </h2>
                <p class="mj-section-text">{{ data_get($cb, 'cuisines.text', 'Build scalable cuisine pages from popular global search intent.') }}</p>
            </div>
            <div class="row g-3">
                @forelse ($bannerCuisine as $item)
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="{{ $item->link_redirect ?: '#' }}" class="mj-cuisine-card" title="{{ $item->title ?? '' }}">
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
                @empty
                    @php
                        $fallbackCuisines = [
                            ['Pizza', 'Slices & pies', 'bi-pie-chart-fill'],
                            ['Burgers', 'Stacks & fries', 'bi-circle-fill'],
                            ['Coffee', 'Cafés & brunch', 'bi-cup-hot-fill'],
                            ['Sushi', 'Rolls & bento', 'bi-droplet-fill'],
                            ['Ramen', 'Bowls & broth', 'bi-egg-fried'],
                            ['Tacos', 'Street favorites', 'bi-triangle-fill'],
                            ['Indian', 'Curries & naan', 'bi-fire'],
                            ['Thai', 'Noodles & spice', 'bi-asterisk'],
                            ['Vegan', 'Plant-forward', 'bi-flower1'],
                            ['Desserts', 'Sweet joys', 'bi-cake2'],
                            ['Brunch', 'Weekend menus', 'bi-sun'],
                            ['Bakery', 'Bread & pastry', 'bi-basket'],
                        ];
                    @endphp
                    @foreach ($fallbackCuisines as $c)
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="#" class="mj-cuisine-card">
                                <span class="mj-cuisine-icon" aria-hidden="true"><i class="bi {{ $c[2] }}"></i></span>
                                <div>
                                    <h3 class="mj-cuisine-name">{{ $c[0] }}</h3>
                                    <p class="mj-cuisine-text">{{ $c[1] }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== RECENT (posts) ===== --}}
    <section class="mj-section mj-recent" aria-labelledby="recentTitle">
        <div class="container-xxl">
            <div class="mj-section-head mj-section-head-row">
                <div>
                    <span class="mj-eyebrow">{{ data_get($cb, 'recent.eyebrow', 'Fresh Adds') }}</span>
                    <h2 id="recentTitle" class="mj-section-title">{{ data_get($cb, 'recent.title', 'Recently Added Menus') }}</h2>
                    <p class="mj-section-text">{{ data_get($cb, 'recent.text', 'Fresh menu pages added to Menujoys.') }}</p>
                </div>
                <a href="{{ data_get($cb, 'recent.link_url', '#') }}" class="mj-link-arrow d-none d-md-inline-flex">
                    <span>{{ data_get($cb, 'recent.link_text', 'See all updates') }}</span>
                    <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                </a>
            </div>
            <div class="mj-recent-table" role="table" aria-label="Recently added menus">
                <div class="mj-recent-thead" role="row">
                    <span role="columnheader">Restaurant</span>
                    <span role="columnheader">City</span>
                    <span role="columnheader">Cuisine</span>
                    <span role="columnheader">Updated</span>
                    <span role="columnheader" class="mj-recent-action">Action</span>
                </div>
                @forelse ($posts->take(5) as $post)
                    <div class="mj-recent-row" role="row">
                        <span role="cell" data-label="Restaurant" class="mj-recent-name">
                            <span class="mj-recent-dot" aria-hidden="true"></span> {{ $post->title }}
                        </span>
                        <span role="cell" data-label="City">{{ $post->address ?? '—' }}</span>
                        <span role="cell" data-label="Cuisine">Menu</span>
                        <span role="cell" data-label="Updated">{{ !empty($post->publish_at) ? \Carbon\Carbon::parse($post->publish_at)->format('M Y') : '—' }}</span>
                        <span role="cell" class="mj-recent-action">
                            <a href="{{ route('post', ['slug' => $post->slug]) }}" class="mj-recent-cta">
                                View <i class="bi bi-arrow-right" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                @empty
                    <div class="mj-recent-row" role="row">
                        <span role="cell" class="mj-recent-name">No recent menus yet.</span>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== OWNERS (config_banner.owners) ===== --}}
    <section class="mj-section mj-owners" id="owners" aria-labelledby="ownersTitle">
        <div class="container-xxl">
            <div class="mj-owners-card">
                <div class="mj-owners-grain" aria-hidden="true"></div>
                <div class="row align-items-center g-5 position-relative">
                    <div class="col-lg-7">
                        <span class="mj-eyebrow mj-eyebrow-light">{{ data_get($cb, 'owners.eyebrow', 'For Restaurants') }}</span>
                        <h2 id="ownersTitle" class="mj-section-title mj-section-title-light">
                            {{ data_get($cb, 'owners.title', 'Own a restaurant, café, or food spot?') }}
                        </h2>
                        <p class="mj-section-text mj-section-text-light">
                            {{ data_get($cb, 'owners.text', 'Bring your menu to more hungry customers with a joyful, searchable Menujoys page.') }}
                        </p>
                        <ul class="mj-owners-list">
                            @php
                                $ownerItems = preg_split('/\r\n|\r|\n/', (string) data_get($cb, 'owners.items', "Add or update your menu\nShow prices and popular dishes\nHelp customers find you by city, cuisine, or craving\nClaim your local food page\nKeep opening hours and contact details accurate"));
                            @endphp
                            @foreach ($ownerItems as $li)
                                @if (trim($li) !== '')
                                    <li><i class="bi bi-check2" aria-hidden="true"></i> {{ trim($li) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="mj-owners-actions">
                            <a href="{{ data_get($cb, 'owners.btn1_url', url('/add-your-menu')) }}" class="mj-btn mj-btn-gold mj-btn-lg">
                                <i class="bi bi-plus-circle" aria-hidden="true"></i>
                                <span>{{ data_get($cb, 'owners.btn1_text', 'Add Your Menu') }}</span>
                            </a>
                            <a href="{{ data_get($cb, 'owners.btn2_url', url('/for-restaurants#claim-form')) }}" class="mj-btn mj-btn-ghost-light mj-btn-lg">
                                <i class="bi bi-shield-check" aria-hidden="true"></i>
                                <span>{{ data_get($cb, 'owners.btn2_text', 'Claim Listing') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="mj-owners-mock" aria-hidden="true">
                            <div class="mj-mock-window">
                                <span class="mj-mock-dot"></span><span class="mj-mock-dot"></span><span class="mj-mock-dot"></span>
                                <span class="mj-mock-url">menujoys.com / your-restaurant</span>
                            </div>
                            <div class="mj-mock-content">
                                <div class="mj-mock-line mj-mock-line-1"></div>
                                <div class="mj-mock-line mj-mock-line-2"></div>
                                <div class="mj-mock-line mj-mock-line-3"></div>
                                <div class="mj-mock-grid"><span></span><span></span><span></span><span></span></div>
                                <div class="mj-mock-cta">View Menu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== TRUST (config_banner.trust + banner_trust) ===== --}}
    <section class="mj-section mj-trust" aria-labelledby="trustTitle">
        <div class="container-xxl">
            <div class="mj-section-head">
                <span class="mj-eyebrow">{{ data_get($cb, 'trust.eyebrow', 'Trusted Discovery') }}</span>
                <h2 id="trustTitle" class="mj-section-title">
                    {!! data_get($cb, 'trust.title_html') ?: 'Menus made easier to <span class="mj-h-script">trust.</span>' !!}
                </h2>
                <p class="mj-section-text">{{ data_get($cb, 'trust.text', 'Menujoys helps diners make better choices with clear, useful, and regularly updated menu information.') }}</p>
            </div>
            <div class="row g-3 g-lg-4">
                @forelse ($bannerTrust as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="mj-trust-item">
                            <span class="mj-trust-icon" aria-hidden="true"><i class="bi bi-check2-circle"></i></span>
                            <div>
                                <h3 class="mj-trust-title">{{ $item->title ?? '' }}</h3>
                                <p class="mj-trust-text">{{ $item->description ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    @php
                        $fallbackTrust = [
                            ['Clear menu categories', 'Easy-to-scan sections from starters to sweets.'],
                            ['Prices when available', 'We surface prices we can confirm and label them clearly.'],
                            ['Opening hours and address', 'Find when to visit and how to get there in one glance.'],
                            ['Dietary labels', 'Vegan, vegetarian, gluten-friendly notes when available.'],
                            ['Last updated dates', 'We aim to keep menu pages refreshed and clearly stamped.'],
                            ['Suggest an update', 'Anyone can flag a menu change so the listing stays useful.'],
                        ];
                    @endphp
                    @foreach ($fallbackTrust as $t)
                        <div class="col-md-6 col-lg-4">
                            <div class="mj-trust-item">
                                <span class="mj-trust-icon" aria-hidden="true"><i class="bi bi-check2-circle"></i></span>
                                <div>
                                    <h3 class="mj-trust-title">{{ $t[0] }}</h3>
                                    <p class="mj-trust-text">{{ $t[1] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== GUIDES (config_banner.guides + banner_guide) ===== --}}
    <section class="mj-section mj-guides" aria-labelledby="guidesTitle">
        <div class="container-xxl">
            <div class="mj-section-head">
                <span class="mj-eyebrow">{{ data_get($cb, 'guides.eyebrow', 'Field Notes') }}</span>
                <h2 id="guidesTitle" class="mj-section-title">
                    {!! data_get($cb, 'guides.title_html') ?: 'Field Notes from the <span class="mj-h-script">Food Atlas.</span>' !!}
                </h2>
                <p class="mj-section-text">{{ data_get($cb, 'guides.text', 'Explore local food trends, city guides, and menu inspiration.') }}</p>
            </div>
            <div class="row g-4">
                @forelse ($bannerGuide as $i => $item)
                    <div class="col-md-6 col-lg-4">
                        <article class="mj-guide-card">
                            <div class="mj-guide-cover mj-guide-cover-{{ ($i % 3) + 1 }}" aria-hidden="true"
                                @if (!empty($item->thumbnail)) style="background-image:url('{{ getImageThumb($item->thumbnail) }}')" @endif>
                                <span class="mj-guide-issue">Issue №{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="mj-guide-body">
                                <span class="mj-guide-cat">{{ $item->youtobe ?? 'Guide' }}</span>
                                <h3 class="mj-guide-title">{{ $item->title ?? '' }}</h3>
                                <p class="mj-guide-excerpt">{{ $item->description ?? '' }}</p>
                                <a href="{{ $item->link_redirect ?: '#' }}" title="Read Guide" class="mj-guide-cta">
                                    Read Guide <i class="bi bi-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-md-6 col-lg-4">
                        <article class="mj-guide-card">
                            <div class="mj-guide-cover mj-guide-cover-1" aria-hidden="true"><span class="mj-guide-issue">Issue №01</span></div>
                            <div class="mj-guide-body">
                                <span class="mj-guide-cat">City Guide · London</span>
                                <h3 class="mj-guide-title">Best Coffee Menus to Explore in London</h3>
                                <p class="mj-guide-excerpt">From flat white pioneers to specialty matcha bars, here are the menus shaping London's morning ritual.</p>
                                <a href="#" class="mj-guide-cta">Read Guide <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <article class="mj-guide-card">
                            <div class="mj-guide-cover mj-guide-cover-2" aria-hidden="true"><span class="mj-guide-issue">Issue №02</span></div>
                            <div class="mj-guide-body">
                                <span class="mj-guide-cat">How To · Dining</span>
                                <h3 class="mj-guide-title">How to Read a Restaurant Menu Before You Visit</h3>
                                <p class="mj-guide-excerpt">A short editorial guide to spotting price clues, signature dishes, and dietary signals before booking a table.</p>
                                <a href="#" class="mj-guide-cta">Read Guide <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <article class="mj-guide-card">
                            <div class="mj-guide-cover mj-guide-cover-3" aria-hidden="true"><span class="mj-guide-issue">Issue №03</span></div>
                            <div class="mj-guide-body">
                                <span class="mj-guide-cat">Food Mood · Comfort</span>
                                <h3 class="mj-guide-title">Top Comfort Food Ideas for a Cozy Night</h3>
                                <p class="mj-guide-excerpt">Slow-cooked stews, ramen bowls, and warm pies — the menus we save for evenings that need a hug.</p>
                                <a href="#" class="mj-guide-cta">Read Guide <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </article>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===== FINAL CTA (config_banner.final) ===== --}}
    <section class="mj-section mj-final-cta" aria-labelledby="finalTitle">
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
                    <a href="{{ data_get($cb, 'final.btn2_url', url('/add-your-menu')) }}" class="mj-btn mj-btn-outline mj-btn-lg">
                        <i class="bi bi-plus-circle" aria-hidden="true"></i>
                        <span>{{ data_get($cb, 'final.btn2_text', 'Add Your Menu') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
