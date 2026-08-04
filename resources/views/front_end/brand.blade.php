@php
    $ver = 126;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $medias = $medias ?? collect();
    $photos = collect($medias['photo'] ?? $medias->get('photo', []));
    $menus = collect($medias['menu'] ?? $medias->get('menu', []));
    $products = $products ?? collect();
    $relates = collect($relates ?? []);

    $header = json_decode($post->content_header ?? '', true);
    if (!is_array($header)) {
        $header = [];
    }

    $parseList = function ($value) {
        if (empty($value)) {
            return [];
        }
        if (is_array($value)) {
            return array_values(array_filter(array_map('trim', $value)));
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $value))));
    };

    $knownFor = $parseList($header['known_for'] ?? []);
    $goodFor = $parseList($header['good_for'] ?? []);
    $moments = $header['moments'] ?? [];
    $glanceFacts = $header['glance'] ?? [];

    $priceRange = $header['price_range'] ?? '';
    $dossierId = $header['dossier_id'] ?? '№ MJ-' . str_pad($post->id, 4, '0', STR_PAD_LEFT);
    $siteUrl =
        $header['site_url'] ?? ($post->website ?: parse_url(route('post', ['slug' => $post->slug]), PHP_URL_HOST));
    $siteUrl = str_replace(['https://', 'http://'], '', rtrim((string) $siteUrl, '/'));

    $menuUrl = !empty($post->website) ? rtrim($post->website, '/') . '/menu' : '#';
    $directionsUrl = $post->link_map ?: '#';
    $updatedAt = !empty($post->publish_at)
        ? \Carbon\Carbon::parse($post->publish_at)->format('F Y')
        : \Carbon\Carbon::parse($post->updated_at)->format('F Y');
    $timeSchedule = exportTimeOpen($post->time_open ?? '');
    $todayHours = $timeSchedule[0]['hours'] ?? '';
    $menuGallery = collect($menus)
        ->filter(function ($item) {
            return !empty($item->thumbnail);
        })
        ->sortBy('position')
        ->values();
    $photoGallery = collect($photos)
        ->filter(function ($item) {
            return !empty($item->thumbnail);
        })
        ->sortBy('position')
        ->values();
    $hasMenuGallery = $menuGallery->isNotEmpty();
    $hasPhotoGallery = $photoGallery->isNotEmpty();
    $photoCards = $photoGallery->take(8);
    $highlightCards = $hasMenuGallery ? $menuGallery->take(6) : collect();
    $menuCategories = $products->where('parent_id', 0)->sortBy('id')->values();
    $menuItemsByParent = $products->where('parent_id', '>', 0)->groupBy('parent_id');
    $menuSections = $menuCategories
        ->filter(function ($cat) use ($menuItemsByParent) {
            return ($menuItemsByParent->get($cat->id) ?? collect())->isNotEmpty();
        })
        ->values();
    $menuItems = $products->where('parent_id', '>', 0);
    if (!$hasMenuGallery) {
        $highlightCards = ($menuItems->isNotEmpty() ? $menuItems : $products)->take(6);
    }
    $highlights = $highlightCards;
    $viewMenuUrl = $hasMenuGallery ? null : ($menuSections->isNotEmpty() ? '#menu' : $menuUrl);
    $comments = collect($comments ?? []);
    $reviews = $comments->where('parent_id', 0)->values();
@endphp

@extends('front_end._index')

@section('content')
    <main id="main" class="52d67487a9ae3a088d95" aria="Rjhc831193">
        <nav class="mj-breadcrumb" aria-label="Breadcrumb">
            <div class="container-xxl">
                <ol class="mj-crumb-list">
                    <li class="mj-crumb"><a href="{{ url('/') }}"
                            title="{{ $config_website->website ?? 'Menujoys' }}">{{ $config_website->website ?? 'Menujoys' }}</a>
                    </li>
                    <li class="mj-crumb mj-crumb-current">{{ $post->title }}</li>
                </ol>
            </div>
        </nav>
        <section class="mj-page-hero mj-brand-hero" id="overview" aria-labelledby="brandTitle">
            <div class="mj-hero-bg">
                <div class="mj-hero-grain"></div>
                <div class="mj-hero-blob mj-hero-blob-1"></div>
                <div class="mj-hero-blob mj-hero-blob-2"></div>
            </div>
            <div class="container-xxl">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7 mj-page-hero-copy">
                        <h1 id="brandTitle" class="mj-page-title">{{ $post->title }}</h1>
                        @if (!empty($post->description))
                            <p class="mj-page-lede">{{ $post->description }}</p>
                        @endif
                        <ul class="mj-info-chips" aria-label="Restaurant facts">
                            @if (!empty($post->address))
                                <li><i class="bi bi-geo-alt-fill"></i> {{ $post->address }}</li>
                            @endif
                            <li><i class="bi bi-pencil-square"></i> Updated {{ $updatedAt }}</li>
                        </ul>
                        <div class="mj-page-actions">
                            @if ($hasMenuGallery)
                                <button type="button" title="View Menu"
                                    class="mj-btn mj-btn-primary mj-btn-lg js-open-menu-gallery">
                                    <i class="bi bi-journal-richtext"></i>
                                    <span>View Menu</span>
                                </button>
                            @elseif ($viewMenuUrl !== '#')
                                <a href="{{ $viewMenuUrl }}" title="View Menu" class="mj-btn mj-btn-primary mj-btn-lg">
                                    <i class="bi bi-journal-richtext"></i>
                                    <span>View Menu</span>
                                </a>
                            @endif
                            @if ($directionsUrl !== '#')
                                <a href="{{ $directionsUrl }}" target="_blank" rel="noopener"
                                    class="mj-btn mj-btn-outline mj-btn-lg gbmm">
                                    <i class="bi bi-signpost-2"></i>
                                    <span>Get Directions</span>
                                </a>
                            @endif
                            <a href="#" class="mj-btn mj-btn-ghost mj-btn-lg">
                                <i class="bi bi-pencil"></i>
                                <span>Suggest Update</span>
                            </a>
                        </div>
                    </div>
                    {{-- thumbnail: ảnh đại diện post --}}
                    <div class="col-lg-5 mj-brand-hero-visual">
                        @if (!empty($post->thumbnail))
                            <div class="mj-brand-hero-thumb">
                                <img src="{{ getImageThumb($post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="img-fluid w-100 rounded-4">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        @php
            $defaultGlance = array_values(
                array_filter([
                    !empty($post->address)
                        ? ['icon' => 'bi-geo-alt', 'title' => 'Location', 'text' => $post->address]
                        : null,
                    !empty($post->phone)
                        ? ['icon' => 'bi-telephone', 'title' => 'Contact', 'text' => $post->phone]
                        : null,
                    !empty($post->time_open)
                        ? ['icon' => 'bi-clock', 'title' => 'Opening Hours', 'text' => strip_tags($post->time_open)]
                        : null,
                    !empty($priceRange)
                        ? ['icon' => 'bi-cash-stack', 'title' => 'Price Range', 'text' => $priceRange]
                        : null,
                    !empty($post->review_google)
                        ? ['icon' => 'bi-star-half', 'title' => 'Rating', 'text' => $post->review_google]
                        : null,
                ]),
            );
            $glanceItems = !empty($glanceFacts) ? $glanceFacts : $defaultGlance;
        @endphp
        @if (!empty($glanceItems))
            <section class="mj-section mj-glance" aria-labelledby="glanceTitle">
                <div class="container-xxl">
                    <div class="mj-section-head mj-section-head-row">
                        <div>
                            <span class="mj-eyebrow">Quick Facts</span>
                            <h2 id="glanceTitle" class="mj-section-title" data-h-script="Glance.">At a Glance.</h2>
                            <p class="mj-section-text">Six quick facts to help you decide before you visit.</p>
                        </div>
                    </div>
                    <div class="row g-3 g-lg-4">
                        @foreach ($glanceItems as $fact)
                            <div class="col-sm-6 col-lg-4">
                                <article class="mj-fact-card">
                                    <span class="mj-fact-icon mj-icon-cacao"><i
                                            class="bi {{ $fact['icon'] ?? 'bi-info-circle' }}"></i></span>
                                    <h3 class="mj-fact-title">{{ $fact['title'] ?? '' }}</h3>
                                    <p class="mj-fact-text">{{ $fact['text'] ?? '' }}</p>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        @if ($highlightCards->count() > 0)
            <section class="mj-section mj-highlights" id="highlights" aria-labelledby="highlightsTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <span class="mj-eyebrow">Featured Items</span>
                        <h2 id="highlightsTitle" class="mj-section-title" data-h-script="Highlights.">Menu Highlights.</h2>
                        <p class="mj-section-text">A quick look at popular items and menu categories before you open the
                            full menu.@if ($hasMenuGallery && $menuGallery->count() > 6)
                                <span class="d-block mt-1">Showing 6 of {{ $menuGallery->count() }} menu pages — open the
                                    gallery to browse all.</span>
                            @endif
                        </p>
                    </div>
                    <div class="row g-4 justify-content-center">
                        @foreach ($highlightCards as $i => $item)
                            @php
                                $galleryIndex = $hasMenuGallery ? $i : 0;
                                $highlightTitle =
                                    $item->title ?? $post->title . ' Menu ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                                $highlightImage = convertPathImage($item->thumbnail ?? '');
                            @endphp
                            <div class="col-md-6 col-lg-4">
                                <article
                                    class="mj-highlight-card mj-highlight-card-simple{{ $hasMenuGallery ? ' mj-highlight-card--gallery mj-highlight-card--full-hover' : '' }}"
                                    @if ($hasMenuGallery) role="button" tabindex="0" data-menu-lightbox="{{ $galleryIndex }}"
                                    aria-label="View menu page {{ $i + 1 }} of {{ $menuGallery->count() }}" @endif>
                                    <div class="mj-highlight-art mj-highlight-art--photo">
                                        @if ($hasMenuGallery)
                                            <img class="mj-photo-img mj-highlight-img-full" src="{{ $highlightImage }}"
                                                alt="{{ $highlightTitle }}" width="600" height="600" loading="lazy" />
                                            <div class="mj-highlight-caption">
                                                <h3 class="mj-highlight-name">{{ $highlightTitle }}</h3>
                                            </div>
                                        @else
                                            <img class="lazy mj-photo-img mj-highlight-img-full"
                                                src="{{ asset('public/dot.jpg') }}" data-src="{{ $highlightImage }}"
                                                alt="{{ $highlightTitle }}" width="600" height="600" loading="lazy" />
                                        @endif
                                    </div>
                                    @unless ($hasMenuGallery)
                                        <div class="mj-highlight-body">
                                            <h3 class="mj-highlight-name">{{ $highlightTitle }}</h3>
                                        </div>
                                    @endunless
                                </article>
                            </div>
                        @endforeach
                    </div>
                    @if ($hasMenuGallery && $menuGallery->count() > 6)
                        <div class="mj-highlights-cta">
                            <button type="button" title="View all menu pages"
                                class="mj-btn mj-btn-primary mj-btn-lg js-open-menu-gallery">
                                <i class="bi bi-images"></i>
                                <span>View all {{ $menuGallery->count() }} menu pages</span>
                            </button>
                        </div>
                    @endif
                </div>
            </section>
        @endif
        @if ($hasPhotoGallery)
            <section class="mj-section mj-album" id="photos" aria-labelledby="albumTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <span class="mj-eyebrow"><span class="mj-eyebrow-dot"></span> Photos</span>
                        <h2 id="albumTitle" class="mj-section-title" data-h-script="the restaurant.">A look at
                            {{ $post->title }}.</h2>
                        <p class="mj-section-text">Tap any photo to zoom in. Use ← / → or swipe to browse the album.
                            @if ($photoGallery->count() > 6)
                                <span class="d-block mt-1">Showing 6 of {{ $photoGallery->count() }} photos — open the
                                    album to browse all.</span>
                            @endif
                        </p>
                    </div>
                    <div class="mj-album-grid" id="mjAlbum">
                        @foreach ($photoCards as $i => $photo)
                            @php
                                $photoAlt = $post->title . ' Photo ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                                $photoSrc = convertPathImage($photo->thumbnail);
                            @endphp
                            <button type="button" class="mj-album-tile" data-photo-lightbox="{{ $i }}"
                                aria-label="Open photo: {{ $photoAlt }}">
                                <img src="{{ $photoSrc }}" alt="{{ $photoAlt }}" loading="lazy" width="600"
                                    height="600" data-caption="{{ $photoAlt }}">
                            </button>
                        @endforeach
                    </div>
                    @if ($photoGallery->count() > 6)
                        <div class="text-center mt-4">
                            <button type="button" title="View all photos"
                                class="mj-btn mj-btn-primary mj-btn-lg js-open-photo-gallery">
                                <i class="bi bi-images"></i>
                                <span>View all {{ $photoGallery->count() }} photos</span>
                            </button>
                        </div>
                    @endif
                </div>
            </section>
        @endif
        @if ($menuSections->isNotEmpty())
            <nav class="mj-cat-index" id="catIndex" aria-label="Menu categories">
                <div class="container-xxl">
                    <div class="mj-cat-index-inner">
                        <span class="mj-cat-index-label">
                            <i class="bi bi-list-ul"></i>
                            Sections
                        </span>
                        <div class="mj-cat-pills" role="tablist">
                            @foreach ($menuSections as $i => $category)
                                @php
                                    $sectionId = 'sec-' . \Illuminate\Support\Str::slug($category->title);
                                @endphp
                                <a class="mj-cat-pill {{ $i === 0 ? 'is-active' : '' }}" href="#{{ $sectionId }}"
                                    data-target="{{ $sectionId }}">{{ $category->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </nav>
            <section class="mj-section mj-menu-sections" id="menu" aria-labelledby="menuSectionsTitle">
                <div class="container-xxl">
                    <h2 id="menuSectionsTitle" class="visually-hidden">Full Menu</h2>
                    @foreach ($menuSections as $i => $category)
                        @php
                            $sectionId = 'sec-' . \Illuminate\Support\Str::slug($category->title);
                            $items = ($menuItemsByParent->get($category->id) ?? collect())->sortBy('id')->values();
                        @endphp
                        <article class="mj-menu-section" id="{{ $sectionId }}">
                            <div class="mj-menu-section-head">
                                <span class="mj-menu-section-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <div>
                                    <h3 class="mj-menu-section-title">{{ $category->title }}</h3>
                                </div>
                                <span class="mj-menu-section-count">{{ $items->count() }}
                                    {{ $items->count() === 1 ? 'item' : 'items' }}</span>
                            </div>
                            <ul class="mj-menu-rows">
                                @foreach ($items as $item)
                                    <li class="mj-menu-row">
                                        <div class="mj-menu-row-main">
                                            <h4 class="mj-menu-row-name">{{ $item->title }}</h4>
                                            @if (!empty($item->description))
                                                <p class="mj-menu-row-desc">{!! nl2br(e(strip_tags($item->description))) !!}</p>
                                            @endif
                                        </div>
                                        @if (!empty($item->price))
                                            <div class="mj-menu-row-price">{{ $item->price }}</div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif
        @if (!empty($post->content) || !empty($post->content_about) || !empty($post->content_footer))
            <section class="mj-section mj-about" aria-labelledby="aboutTitle">
                <div class="container-xxl">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-7">
                            <span class="mj-eyebrow">About</span>
                            <h2 id="aboutTitle" class="mj-section-title" data-h-script="{{ $post->title }}.">About
                                {{ $post->title }}.</h2>
                            @if (!empty($post->content))
                                <div>{!! $post->content !!}</div>
                            @elseif (!empty($post->content_about))
                                <div>{!! $post->content_about !!}</div>
                            @endif
                        </div>
                        @if (!empty($post->content_footer))
                            <div class="col-lg-5">
                                <figure class="mj-quote-card">
                                    <span class="mj-quote-mark">"</span>
                                    <blockquote>
                                        <div>{!! $post->content_footer !!}</div>
                                    </blockquote>
                                </figure>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
        @if (!empty($moments))
            <section class="mj-section mj-moments" aria-labelledby="momentsTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <span class="mj-eyebrow">Food Moments</span>
                        <h2 id="momentsTitle" class="mj-section-title" data-h-script="food moments.">Best for these food
                            moments.</h2>
                        @if (!empty($header['moments_text']))
                            <p class="mj-section-text">{{ $header['moments_text'] }}</p>
                        @endif
                    </div>
                    <div class="row g-3 g-lg-4">
                        @foreach ($moments as $moment)
                            <div class="col-6 col-lg-3">
                                <article class="mj-moment-card">
                                    <span class="mj-moment-icon"><i
                                            class="bi {{ $moment['icon'] ?? 'bi-stars' }}"></i></span>
                                    <h3 class="mj-moment-title">{{ $moment['title'] ?? '' }}</h3>
                                    <p class="mj-moment-text">{{ $moment['text'] ?? '' }}</p>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        @if (!empty($post->address) || !empty($post->time_open) || !empty($post->iframe_map))
            <section class="mj-section mj-location" id="location" aria-labelledby="locationTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <span class="mj-eyebrow">Find &amp; Visit</span>
                        <h2 id="locationTitle" class="mj-section-title" data-h-script="Opening Hours.">Location &amp;
                            Opening Hours.</h2>
                        <p class="mj-section-text">Address, contact, and weekly opening times at a glance.</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <article class="mj-location-card">
                                <div class="mj-location-card-head">
                                    <span class="mj-location-icon"><i class="bi bi-pin-map-fill"></i></span>
                                    <h3 class="mj-location-card-title">Address &amp; Contact</h3>
                                </div>
                                @if (!empty($post->iframe_map))
                                    <div class="mj-map-embed">
                                        {!! $post->iframe_map !!}
                                    </div>
                                @endif
                                <dl class="mj-location-list">
                                    @if (!empty($post->address))
                                        <div>
                                            <dt>Address</dt>
                                            <dd>{{ $post->address }}</dd>
                                        </div>
                                    @endif
                                    @if (!empty($post->phone))
                                        <div>
                                            <dt>Phone</dt>
                                            <dd><a
                                                    href="tel:{{ preg_replace('/\s+/', '', $post->phone) }}">{{ $post->phone }}</a>
                                            </dd>
                                        </div>
                                    @endif
                                </dl>
                                @if ($directionsUrl !== '#')
                                    <a href="{{ $directionsUrl }}" target="_blank" rel="noopener"
                                        class="mj-btn mj-btn-primary gbmm">
                                        <i class="bi bi-signpost-2"></i>
                                        <span>Get Directions</span>
                                    </a>
                                @endif
                            </article>
                        </div>
                        @if (!empty($timeSchedule))
                            <div class="col-lg-6">
                                <article class="mj-location-card">
                                    <div class="mj-location-card-head">
                                        <span class="mj-location-icon"><i class="bi bi-clock-fill"></i></span>
                                        <h3 class="mj-location-card-title">Opening Hours</h3>
                                        @if (!empty($todayHours))
                                            <span class="mj-location-status time-status"
                                                data-time="{{ $todayHours }}"></span>
                                        @endif
                                    </div>
                                    <ul class="mj-hours-table" aria-label="Weekly opening hours">
                                        @foreach ($timeSchedule as $row)
                                            <li>
                                                <span class="mj-hours-day">{{ $row['day'] ?? '' }}</span>
                                                <span class="mj-hours-time"><span>{{ $row['hours'] ?? '' }}</span></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p class="mj-hours-note">
                                        <i class="bi bi-info-circle"></i> Opening hours may vary.
                                        <a href="#update">Suggest an update</a> if this information has changed.
                                    </p>
                                </article>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if ($reviews->count() > 0 || !empty($post->review_google))
            <style>
                .mj-reviews .comment {
                    display: flex;
                }

                .mj-reviews .mj-testimonial {
                    width: 100%;
                    min-height: 260px;
                    height: 100%;
                }

                .mj-reviews .mj-testimonial blockquote {
                    flex: 1 1 auto;
                    display: -webkit-box;
                    -webkit-line-clamp: 6;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    word-break: break-word;
                }
            </style>
            <section class="mj-section mj-reviews" id="reviews" aria-labelledby="reviewsTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <span class="mj-eyebrow">Guest Reviews</span>
                        <h2 id="reviewsTitle" class="mj-section-title" data-h-script="say.">What diners say.</h2>
                        @php
                            $reviewSummary = !empty($post->review_google)
                                ? trim(
                                    $post->review_google .
                                        ($reviews->count() > 0 ? ' · ' . $reviews->count() . ' recent reviews' : ''),
                                )
                                : 'Recent guest feedback for ' . $post->title . '.';
                        @endphp
                        <p class="mj-section-text">{{ $reviewSummary }}</p>
                    </div>

                    @if ($reviews->count() > 0)
                        <div class="listReview row g-4">
                            @foreach ($reviews as $i => $review)
                                <div class="col-md-6 col-lg-4 comment h-100 {{ $i >= 6 ? 'hide' : 'show' }}">
                                    <article class="mj-testimonial h-100">
                                        <blockquote>{{ $review->content }}</blockquote>
                                        <div class="mj-testimonial-by">
                                            @if (!empty($review->thumbnail))
                                                <img class="mj-testimonial-avatar"
                                                    src="{{ getImageThumb($review->thumbnail, 44, 44) }}"
                                                    alt="{{ $review->fullname ?? 'Guest' }}" loading="lazy"
                                                    width="44" height="44" />
                                            @endif
                                            <div>
                                                @if (!empty($review->fullname))
                                                    <strong>{{ $review->fullname }}</strong>
                                                @endif
                                                @if (!empty($review->title))
                                                    <span>{{ $review->title }}</span>
                                                @endif
                                                @if (!empty($review->created_at))
                                                    <span>{{ timeAgo($review->created_at) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        @if ($reviews->count() > 6)
                            <div class="text-center mt-4">
                                <button type="button" class="mj-btn mj-btn-outline mj-btn-lg loadmoreReview">
                                    <span>Load more reviews</span>
                                    <i class="bi bi-arrow-down" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
            </section>
        @endif

        @if ($relates->count() > 0)
            <section class="mj-section mj-related" id="similar" aria-labelledby="similarTitle">
                <div class="container-xxl">
                    <div class="mj-section-head mj-section-head-row">
                        <div>
                            <span class="mj-eyebrow">Discover Nearby</span>
                            <h2 id="similarTitle" class="mj-section-title" data-h-script="nearby.">Similar local food
                                nearby.</h2>
                            <p class="mj-section-text">Keep exploring with brands that match this craving.</p>
                        </div>
                    </div>
                    <div class="mj-brand-slider-wrap">
                        <button type="button" class="mj-slider-btn mj-slider-btn-edge mj-slider-btn-prev" data-slide-prev
                            aria-label="Previous brands">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <div class="mj-brand-slider" data-brand-slider role="region"
                            aria-label="Nearby brands carousel">
                            @foreach ($relates as $relate)
                                @php
                                    $relateUrl = !empty($relate->website)
                                        ? rtrim($relate->website, '/')
                                        : route('post', ['slug' => $relate->slug]);
                                @endphp
                                <article class="mj-brand-card">
                                    <a href="{{ $relateUrl }}" title="{{ $relate->title }}"
                                        class="mj-brand-card-link">
                                        <div class="mj-brand-card-photo">
                                            <img class="lazy" src="{{ asset('public/dot.jpg') }}"
                                                data-src="{{ getImageThumb($relate->thumbnail) }}"
                                                alt="{{ $relate->title }}" />
                                        </div>
                                        <span class="mj-brand-card-body">
                                            <h3 class="mj-brand-card-name">{{ $relate->title }}</h3>
                                            @if (!empty($relate->address))
                                                <p class="mj-brand-card-meta">
                                                    <i class="bi bi-geo-alt-fill"></i> {{ $relate->address }}
                                                </p>
                                            @endif
                                            @if (!empty($relate->review_google))
                                                <span class="mj-brand-card-foot">
                                                    <span class="mj-brand-card-rating">
                                                        <i class="bi bi-star-fill"></i> {{ $relate->review_google }}
                                                    </span>
                                                </span>
                                            @endif
                                        </span>
                                    </a>
                                </article>
                            @endforeach
                        </div>
                        <button type="button" class="mj-slider-btn mj-slider-btn-edge mj-slider-btn-next" data-slide-next
                            aria-label="Next brands">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </section>
        @endif
        <section class="mj-section mj-final-cta" id="update" aria-labelledby="finalTitle">
            <div class="container-xxl">
                <div class="mj-final-card">
                    <div class="mj-final-deco">
                        <span class="mj-final-spark mj-final-spark-1">✦</span>
                        <span class="mj-final-spark mj-final-spark-2">✦</span>
                    </div>
                    <span class="mj-eyebrow">Next Step</span>
                    <h2 id="finalTitle" class="mj-final-title" data-h-script="menu?">Ready to explore the menu?</h2>
                    <p class="mj-final-text">View dishes, prices, popular picks, and menu categories for
                        {{ $post->title }}.</p>
                    <div class="mj-final-actions">
                        @if ($hasMenuGallery)
                            <button type="button" title="View Full Menu"
                                class="mj-btn mj-btn-primary mj-btn-lg js-open-menu-gallery">
                                <i class="bi bi-journal-richtext"></i>
                                <span>View Full Menu</span>
                            </button>
                        @elseif ($viewMenuUrl !== '#')
                            <a href="{{ $viewMenuUrl }}" title="View Full Menu"
                                class="mj-btn mj-btn-primary mj-btn-lg">
                                <i class="bi bi-journal-richtext"></i>
                                <span>View Full Menu</span>
                            </a>
                        @endif
                        <a href="{{ url('#l') }}" title="Suggest Update" class="mj-btn mj-btn-outline mj-btn-lg">
                            <i class="bi bi-pencil"></i>
                            <span>Suggest Update</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @if ($hasMenuGallery)
        <script type="application/json" id="mjMenuGalleryData">
            {!! json_encode(
                $menuGallery->map(function ($image, $i) use ($post) {
                    return [
                        'src' => convertPathImage($image->thumbnail),
                        'alt' => $post->title . ' Menu ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                    ];
                })->values(),
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
            ) !!}
        </script>
        <div class="mj-lightbox" id="mjLightbox" role="dialog" aria-modal="true" aria-hidden="true"
            aria-label="Menu photo viewer">
            <button type="button" class="mj-lightbox-prev" aria-label="Previous menu photo">
                <i class="bi bi-arrow-left"></i>
            </button>
            <div class="mj-lightbox-stage">
                <img class="mj-lightbox-img" src="" alt="" />
                <span class="mj-lightbox-counter" id="mjLightboxCounter" aria-live="polite"></span>
                <button type="button" class="mj-lightbox-close" aria-label="Close menu viewer">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <button type="button" class="mj-lightbox-next" aria-label="Next menu photo">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    @endif

    @if ($hasPhotoGallery)
        <script type="application/json" id="mjPhotoGalleryData">
            {!! json_encode(
                $photoGallery->map(function ($image, $i) use ($post) {
                    return [
                        'src' => convertPathImage($image->thumbnail),
                        'alt' => $post->title . ' Photo ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                    ];
                })->values(),
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
            ) !!}
        </script>
        <div class="mj-lightbox" id="mjPhotoLightbox" role="dialog" aria-modal="true" aria-hidden="true"
            aria-label="Photo viewer">
            <button type="button" class="mj-lightbox-prev" aria-label="Previous photo">
                <i class="bi bi-arrow-left"></i>
            </button>
            <div class="mj-lightbox-stage">
                <img class="mj-lightbox-img" src="" alt="" />
                <span class="mj-lightbox-counter" id="mjPhotoLightboxCounter" aria-live="polite"></span>
                <button type="button" class="mj-lightbox-close" aria-label="Close photo viewer">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <button type="button" class="mj-lightbox-next" aria-label="Next photo">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    @endif
@endsection

@push('scripts')
    <style>
        .mj-highlight-card--gallery {
            cursor: pointer;
        }

        .mj-highlight-card--gallery:focus-visible {
            outline: 2px solid var(--mj-cacao, #3e2723);
            outline-offset: 4px;
        }

        .mj-highlight-card--full-hover {
            overflow: hidden;
        }

        .mj-highlight-card--full-hover .mj-highlight-art--photo {
            position: relative;
            height: clamp(220px, 28vw, 320px);
            padding: 0;
            overflow: hidden;
            background: var(--mj-paper-3, #f6efe5);
        }

        .mj-highlight-card--full-hover .mj-highlight-img-full {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            min-height: 0;
            object-fit: cover;
            object-position: center;
            display: block;
            transition: transform .45s ease;
        }

        .mj-highlight-card--full-hover:hover .mj-highlight-img-full,
        .mj-highlight-card--full-hover:focus-visible .mj-highlight-img-full {
            transform: scale(1.03);
        }

        .mj-highlight-card--full-hover .mj-highlight-caption {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
            padding: 18px 20px 20px;
            background: linear-gradient(180deg, rgba(28, 14, 10, 0) 0%, rgba(28, 14, 10, 0.78) 45%, rgba(28, 14, 10, 0.92) 100%);
            transform: translateY(100%);
            transition: transform .35s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .mj-highlight-card--full-hover:hover .mj-highlight-caption,
        .mj-highlight-card--full-hover:focus-visible .mj-highlight-caption {
            transform: translateY(0);
        }

        .mj-highlight-card--full-hover .mj-highlight-caption .mj-highlight-name {
            margin: 0;
            color: #fff;
            font-size: clamp(18px, 1.6vw, 22px);
            text-align: center;
        }

        .mj-highlight-card-simple .mj-highlight-art--photo {
            overflow: hidden;
            background: var(--mj-paper-3, #f6efe5);
        }

        .mj-highlight-art--photo .mj-highlight-img-full {
            width: 100%;
            height: 100%;
            min-height: 200px;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .mj-lightbox-counter {
            position: absolute;
            bottom: 1.25rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            padding: 0.35rem 0.85rem;
            border-radius: 999px;
            background: rgba(0, 0, 0, 0.55);
            color: #fff;
            font-size: 0.875rem;
            letter-spacing: 0.04em;
            pointer-events: none;
        }

        .mj-lightbox>.mj-lightbox-prev,
        .mj-lightbox>.mj-lightbox-next {
            position: fixed;
            top: 50%;
            z-index: 1082;
            transform: translateY(-50%);
        }

        .mj-lightbox>.mj-lightbox-prev {
            left: clamp(16px, 4vw, 48px);
            right: auto;
        }

        .mj-lightbox>.mj-lightbox-next {
            right: clamp(16px, 4vw, 48px);
            left: auto;
        }

        .mj-lightbox>.mj-lightbox-prev:hover {
            transform: translateY(-50%) translateX(-3px);
        }

        .mj-lightbox>.mj-lightbox-next:hover {
            transform: translateY(-50%) translateX(3px);
        }

        @media (max-width: 575.98px) {
            .mj-lightbox>.mj-lightbox-prev {
                left: 12px;
            }

            .mj-lightbox>.mj-lightbox-next {
                right: 12px;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function initMjGalleryLightbox(config) {
                const lightbox = document.getElementById(config.lightboxId);
                const dataEl = document.getElementById(config.dataId);
                if (!lightbox || !dataEl) return;

                let album = [];
                try {
                    album = JSON.parse(dataEl.textContent || "[]");
                } catch (e) {
                    return;
                }
                if (!album.length) return;

                const imgEl = lightbox.querySelector(".mj-lightbox-img");
                const btnClose = lightbox.querySelector(".mj-lightbox-close");
                const btnPrev = lightbox.querySelector(".mj-lightbox-prev");
                const btnNext = lightbox.querySelector(".mj-lightbox-next");
                const counterEl = config.counterId ? document.getElementById(config.counterId) : null;
                if (!imgEl) return;

                let current = 0;
                let lastFocus = null;

                function updateCounter() {
                    if (!counterEl) return;
                    counterEl.textContent = (current + 1) + " / " + album.length;
                }

                function show(index) {
                    current = (index + album.length) % album.length;
                    const item = album[current];
                    imgEl.style.animation = "none";
                    imgEl.offsetWidth;
                    imgEl.style.animation = "";
                    imgEl.src = item.src;
                    imgEl.alt = item.alt || "";
                    updateCounter();
                }

                function open(index) {
                    lastFocus = document.activeElement;
                    show(index);
                    lightbox.classList.add("is-open");
                    lightbox.setAttribute("aria-hidden", "false");
                    document.body.classList.add("mj-lightbox-open");
                    if (btnClose) btnClose.focus();
                }

                function close() {
                    lightbox.classList.remove("is-open");
                    lightbox.setAttribute("aria-hidden", "true");
                    document.body.classList.remove("mj-lightbox-open");
                    imgEl.src = "";
                    if (lastFocus && lastFocus.focus) lastFocus.focus();
                }

                if (config.globalOpenName) {
                    window[config.globalOpenName] = open;
                }

                (config.openButtons || []).forEach(function(selector) {
                    document.querySelectorAll(selector).forEach(function(btn) {
                        btn.addEventListener("click", function(e) {
                            e.preventDefault();
                            open(0);
                        });
                    });
                });

                if (config.itemSelector) {
                    document.querySelectorAll(config.itemSelector).forEach(function(el) {
                        const index = parseInt(el.getAttribute(config.itemAttr), 10) || 0;
                        el.addEventListener("click", function(e) {
                            if (el.tagName === "BUTTON") e.preventDefault();
                            open(index);
                        });
                        if (config.itemSelector === "[data-menu-lightbox]") {
                            el.addEventListener("keydown", function(e) {
                                if (e.key === "Enter" || e.key === " ") {
                                    e.preventDefault();
                                    open(index);
                                }
                            });
                        }
                    });
                }

                if (btnClose) btnClose.addEventListener("click", close);
                if (btnPrev) btnPrev.addEventListener("click", function() {
                    show(current - 1);
                });
                if (btnNext) btnNext.addEventListener("click", function() {
                    show(current + 1);
                });

                lightbox.addEventListener("click", function(e) {
                    if (e.target === lightbox) close();
                });

                document.addEventListener("keydown", function(e) {
                    if (!lightbox.classList.contains("is-open")) return;
                    if (e.key === "Escape") {
                        e.preventDefault();
                        close();
                    } else if (e.key === "ArrowLeft") {
                        e.preventDefault();
                        show(current - 1);
                    } else if (e.key === "ArrowRight") {
                        e.preventDefault();
                        show(current + 1);
                    }
                });

                let touchStartX = 0;
                lightbox.addEventListener("touchstart", function(e) {
                    if (e.touches.length === 1) touchStartX = e.touches[0].clientX;
                }, {
                    passive: true
                });
                lightbox.addEventListener("touchend", function(e) {
                    const diff = e.changedTouches[0].clientX - touchStartX;
                    if (Math.abs(diff) > 40) show(diff < 0 ? current + 1 : current - 1);
                }, {
                    passive: true
                });
            }

            initMjGalleryLightbox({
                lightboxId: "mjLightbox",
                dataId: "mjMenuGalleryData",
                counterId: "mjLightboxCounter",
                globalOpenName: "openMenuGallery",
                openButtons: [".js-open-menu-gallery"],
                itemSelector: "[data-menu-lightbox]",
                itemAttr: "data-menu-lightbox",
            });

            initMjGalleryLightbox({
                lightboxId: "mjPhotoLightbox",
                dataId: "mjPhotoGalleryData",
                counterId: "mjPhotoLightboxCounter",
                openButtons: [".js-open-photo-gallery"],
                itemSelector: "[data-photo-lightbox]",
                itemAttr: "data-photo-lightbox",
            });

            const btn = document.querySelector(".loadmoreReview");
            const comments = document.querySelectorAll(".listReview .comment");
            const STEP = 5;

            if (btn && comments.length > 0) {
                btn.addEventListener("click", function() {
                    let shown = 0;
                    for (let comment of comments) {
                        if (comment.classList.contains("hide")) {
                            comment.classList.remove("hide");
                            comment.classList.add("show");
                            shown++;
                            if (shown === STEP) break;
                        }
                    }

                    const stillHidden = document.querySelectorAll(".listReview .comment.hide").length;
                    if (stillHidden === 0) btn.style.display = "none";
                });
            }
        });
    </script>
@endpush
