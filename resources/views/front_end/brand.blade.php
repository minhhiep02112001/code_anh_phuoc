@php
    $ver = 127;
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

    $highlights = $highlightCards;
    $viewMenuUrl = $hasMenuGallery ? null : ($menuSections->isNotEmpty() ? '#menu' : $menuUrl);
    $comments = collect($comments ?? []);
    $reviews = $comments->where('parent_id', 0)->values();
    $hasMenuSection = $highlightCards->count() > 0 || $menuSections->isNotEmpty();
    $menuNavHref = $highlightCards->count() > 0 ? '#highlights' : '#menu';
    $menuNavSections = array_values(
        array_filter([$highlightCards->count() > 0 ? 'highlights' : null, $menuSections->isNotEmpty() ? 'menu' : null]),
    );
    $hasReviewsSection = $reviews->count() > 0 || !empty($post->review_google);
    $hasLocationSection = !empty($post->address) || !empty($post->time_open) || !empty($post->iframe_map);

    $abouts = collect($abouts ?? []);
    $aboutParents = $abouts->where('parent_id', 0)->values();
    $aboutChildrenByParent = $abouts->where('parent_id', '>', 0)->groupBy('parent_id');
    $aboutGroupsWithItems = $aboutParents
        ->map(function ($parent) use ($aboutChildrenByParent) {
            $items = ($aboutChildrenByParent->get($parent->id) ?? collect())->values();

            return [
                'parent' => $parent,
                'items' => $items,
                'sectionId' => 'about-' . \Illuminate\Support\Str::slug($parent->title),
            ];
        })
        ->filter(function ($group) {
            return $group['items']->isNotEmpty();
        })
        ->values();

    $pageNavItems = array_values(
        array_filter([
            ['label' => 'About', 'href' => '#about', 'sections' => ['about']],
            $aboutGroupsWithItems->isNotEmpty()
                ? ['label' => 'Services', 'href' => '#service', 'sections' => ['service']]
                : null,
            $hasPhotoGallery ? ['label' => 'Photos', 'href' => '#photo', 'sections' => ['photos']] : null,
            $hasMenuSection ? ['label' => 'Menu', 'href' => $menuNavHref, 'sections' => $menuNavSections] : null,
            $hasReviewsSection ? ['label' => 'Reviews', 'href' => '#review', 'sections' => ['reviews']] : null,
            $hasLocationSection ? ['label' => 'Location', 'href' => '#location', 'sections' => ['location']] : null,
        ]),
    );
@endphp

@extends('front_end._index')
@section('menu_brand')
    @foreach ($pageNavItems as $navItem)
        <li class="nav-item">
            <a class="mj-nav-link" href="{{ $navItem['href'] }}">{{ $navItem['label'] }}</a>
        </li>
    @endforeach
@endsection
@section('content')
    <main id="main" class="52d67487a9ae3a088d95" aria="Rjhc831193">
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
                        <div class="mj-brand-trust-rating mb-4" aria-label="5 out of 5 trusted rating">
                            @for ($s = 1; $s <= 5; $s++)
                                <i class="bi bi-star-fill" aria-hidden="true"></i>
                            @endfor
                        </div>
                        @if (!empty($post->description))
                            <p class="mj-page-lede">{{ $post->description }}</p>
                        @endif
                        <ul class="mj-info-chips" aria-label="Restaurant facts">
                            @if (!empty($post->address))
                                <li><i class="bi bi-geo-alt-fill"></i> {{ $post->address }}</li>
                            @endif
                            @if (!empty($post->phone))
                                <li><i class="bi bi-telephone-fill"></i> {{ $post->phone }}</li>
                            @endif
                        </ul>
                        @if (!empty($pageNavItems))
                            <nav class="mj-section-nav" aria-label="Page sections">
                                <div class="mj-section-nav-inner">
                                    @foreach ($pageNavItems as $navItem)
                                        <a href="{{ $navItem['href'] }}"
                                            class="mj-section-nav-pill{{ $loop->first ? ' is-active' : '' }}"
                                            data-sections="{{ implode(',', $navItem['sections']) }}">{{ $navItem['label'] }}</a>
                                    @endforeach
                                </div>
                            </nav>
                        @endif
                        <div class="mj-page-actions mj-hero-actions">
                            <a href="#menu" class="mj-btn mj-btn-primary" rel="noopener">
                                <i class="bi bi-journal-richtext" aria-hidden="true"></i>
                                <span>VIEW MENU</span>
                            </a>

                            @php
                                $orderUrl = !empty($post->redirect_order) ? $post->redirect_order : '#';
                                $reserveUrl = !empty($post->redirect_reserve_table)
                                    ? $post->redirect_reserve_table
                                    : '#';
                            @endphp

                            <a href="{{ $orderUrl }}" class="mj-btn mj-btn-outline"
                                @if ($orderUrl !== '#') target="_blank" rel="noopener" @endif>
                                <i class="bi bi-bag-check" aria-hidden="true"></i>
                                <span>ORDER ONLINE</span>
                            </a>

                            <a href="{{ $reserveUrl }}" class="mj-btn mj-btn-outline"
                                @if ($reserveUrl !== '#') target="_blank" rel="noopener" @endif>
                                <i class="bi bi-calendar2-check" aria-hidden="true"></i>
                                <span>RESERVE TABLE</span>
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


        <section id="about">
            @if (!empty($post->content))
                <section class="mj-section mj-about" aria-labelledby="aboutTitle">
                    <div class="container-xxl">
                        <div class="mj-section-head">
                            <h2 id="aboutTitle" class="mj-section-title" data-h-script="{{ $post->title }}.">
                                {{ __('config_data.menus.about') }} {{ $post->title }}.
                            </h2>
                        </div>
                        <div class="row align-items-center g-5">
                            <div class="col-lg-12">
                                <div>{!! $post->content !!}</div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @if ($aboutGroupsWithItems->isNotEmpty())
                <section class="mj-section mj-about-panel pt-0" id="service" aria-labelledby="aboutGlanceTitle">
                    <nav class="mj-cat-index mj-about-cat-index" id="aboutCatIndex" aria-label="About categories"
                        aria-hidden="true">
                        <div class="container-xxl">
                            <div class="mj-cat-index-inner">
                                <div class="mj-cat-pills mj-about-cat-pills" role="tablist">
                                    @foreach ($aboutGroupsWithItems as $i => $aboutGroup)
                                        <a class="mj-cat-pill mj-about-cat-pill {{ $i === 0 ? 'is-active' : '' }}"
                                            href="#{{ $aboutGroup['sectionId'] }}"
                                            data-target="{{ $aboutGroup['sectionId'] }}">{{ $aboutGroup['parent']->title }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="container-xxl">
                        <div class="mj-section-head">
                            <h2 id="highlightsTitle" class="mj-section-title" data-h-script="{{ $post->title }}.">
                                Services of {{ $post->title }}.
                            </h2>
                        </div>
                        <div class="mj-about-panel-body" id="aboutPanelBody">
                            @foreach ($aboutGroupsWithItems as $aboutGroup)
                                <article class="mj-about-block" id="{{ $aboutGroup['sectionId'] }}">
                                    <h3 class="mj-about-block-title">{{ $aboutGroup['parent']->title }}</h3>
                                    <ul class="mj-about-checklist">
                                        @foreach ($aboutGroup['items'] as $aboutItem)
                                            <li>
                                                <i class="bi bi-check-lg" aria-hidden="true"></i>
                                                <span>{{ $aboutItem->title }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </section>
        @if ($hasPhotoGallery)
            <section class="mj-section mj-album" id="photo" aria-labelledby="albumTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <h2 id="albumTitle" class="mj-section-title" data-h-script="{{ $post->title }}.">
                            {{ __('config_data.menus.photo') }} {{ $post->title }}.</h2>
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
        @if ($highlightCards->count() > 0)
            <section class="mj-section mj-highlights" id="highlights" aria-labelledby="highlightsTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <h2 id="highlightsTitle" class="mj-section-title" data-h-script="{{ $post->title }}.">
                            {{ __('config_data.menus.menu') }} {{ $post->title }}.
                        </h2>
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
                                                alt="{{ $highlightTitle }}" width="600" height="600"
                                                loading="lazy" />
                                            <div class="mj-highlight-caption">
                                                <h3 class="mj-highlight-name">{{ $highlightTitle }}</h3>
                                            </div>
                                        @else
                                            <img class="lazy mj-photo-img mj-highlight-img-full"
                                                src="{{ asset('public/dot.jpg') }}" data-src="{{ $highlightImage }}"
                                                alt="{{ $highlightTitle }}" width="600" height="600"
                                                loading="lazy" />
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

        @if ($menuSections->isNotEmpty())
            <nav class="mj-cat-index" id="catIndex" aria-label="Menu categories">
                <div class="container-xxl">
                    <div class="mj-cat-index-inner">
                        <span class="mj-cat-index-label">
                            <i class="bi bi-list-ul"></i>
                            {{ __('config_data.menus.menu') }}
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
        @if (!empty($post->address) || !empty($post->time_open) || !empty($post->iframe_map))
            <section class="mj-section mj-location" id="location" aria-labelledby="locationTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <h2 id="locationTitle" class="mj-section-title"
                            data-h-script="{{ !empty($timeSchedule) ? 'Opening Hours.' : __('config_data.menus.location') }}">
                            {{ __('config_data.menus.location') }}
                            {!! !empty($timeSchedule) ? ' &amp; Opening Hours.' : '' !!}</h2>
                    </div>
                    <div class="row g-4">
                        <div class="{{ !empty($timeSchedule) ? 'col-lg-6' : 'col-lg-12' }}">
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
                                        <a href="#">Suggest an update</a> if this information has changed.
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
                .mj-reviews .listReview {
                    align-items: stretch;
                }

                .mj-reviews .comment {
                    display: flex;
                }

                .mj-reviews .comment.hide {
                    display: none !important;
                }

                .mj-reviews .mj-testimonial {
                    width: 100%;
                    flex: 1 1 auto;
                    display: flex;
                    flex-direction: column;
                    min-height: 0;
                }

                .mj-reviews .mj-testimonial blockquote {
                    flex: 0 0 auto;
                    display: -webkit-box;
                    -webkit-line-clamp: 5;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    word-break: break-word;
                    height: calc(1.5em * 5);
                    min-height: calc(1.5em * 5);
                    max-height: calc(1.5em * 5);
                }

                .mj-reviews .mj-testimonial-by {
                    margin-top: auto;
                }
            </style>
            <section class="mj-section mj-reviews" id="review" aria-labelledby="reviewsTitle">
                <div class="container-xxl">
                    <div class="mj-section-head">
                        <h2 id="reviewsTitle" class="mj-section-title" data-h-script="{{ $post->title }}.">
                            {{ __('config_data.menus.review') }} {{ $post->title }}.</h2>
                    </div>

                    @if ($reviews->count() > 0)
                        <div class="listReview row g-4">
                            @foreach ($reviews as $i => $review)
                                <div class="col-md-6 col-lg-4 comment {{ $i >= 6 ? 'hide' : 'show' }}">
                                    <article class="mj-testimonial">
                                        <blockquote>{{ $review->content }}</blockquote>
                                        <div class="mj-testimonial-by">
                                            @php
                                                $reviewName = trim($review->fullname ?? '') ?: 'Guest';
                                                $reviewInitial = mb_strtoupper(mb_substr($reviewName, 0, 1));
                                            @endphp
                                            <span class="mj-testimonial-avatar"
                                                aria-hidden="true">{{ $reviewInitial }}</span>
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
        .mj-brand-trust-rating {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin: 0 0 18px;
            color: #e6a317;
            font-size: 18px;
            line-height: 1;
        }

        .mj-brand-trust-rating .bi {
            color: #e6a317;
        }

        .mj-brand-trust-label {
            margin-left: 6px;
            font-family: var(--mj-font-display, Georgia, "Times New Roman", serif);
            font-size: 15px;
            font-weight: 600;
            color: var(--mj-cacao, #3e2723);
            letter-spacing: -0.01em;
        }

        .mj-hero-actions {
            margin-top: 1.25rem;
            gap: 10px;
        }

        .mj-btn-text {
            background: transparent;
            border-color: transparent;
            color: var(--mj-cacao, #3e2723);
            padding-left: 10px;
            padding-right: 10px;
            box-shadow: none;
        }

        .mj-btn-text:hover,
        .mj-btn-text:focus-visible {
            background: transparent;
            border-color: transparent;
            color: var(--mj-cacao-2, #5d4037);
            transform: none;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        @media (max-width: 991.98px) {
            .mj-hero-actions {
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 90;
                margin: 0;
                padding: 10px 12px calc(10px + env(safe-area-inset-bottom, 0px));
                display: flex;
                flex-wrap: nowrap;
                gap: 8px;
                background: linear-gradient(
                    180deg,
                    rgba(246, 239, 229, 0) 0%,
                    rgba(246, 239, 229, 0.88) 35%,
                    rgba(246, 239, 229, 0.98) 100%
                );
            }

            .mj-hero-actions .mj-btn {
                flex: 1 1 0;
                width: auto;
                min-width: 0;
                padding: 11px 8px;
                font-size: 11px;
                gap: 4px;
                box-shadow: 0 8px 22px rgba(28, 14, 10, 0.12);
            }

            .mj-hero-actions .mj-btn span {
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .mj-brand-hero .mj-page-title {
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
                max-width: 100%;
            }

            .mj-brand-hero .mj-info-chips {
                width: 100%;
            }

            .mj-brand-hero .mj-info-chips li {
                max-width: 100%;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }

            main#main {
                padding-bottom: calc(84px + env(safe-area-inset-bottom, 0px));
            }
        }

        .mj-brand-card-photo--logo {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, var(--mj-paper-2, #f3ebe0) 0%, var(--mj-cream, #efe4d4) 55%, #e6d7c4 100%);
        }

        .mj-brand-card-photo--logo::after {
            display: none;
        }

        .mj-brand-card-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            border-radius: 50%;
            border: 1px solid rgba(62, 39, 35, 0.12);
            background: rgba(255, 255, 255, 0.55);
            font-family: var(--mj-font-display, Georgia, "Times New Roman", serif);
            font-size: 34px;
            font-weight: 500;
            font-style: italic;
            line-height: 1;
            color: var(--mj-cacao, #3e2723);
            letter-spacing: -0.02em;
        }

        .mj-about-panel-body {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 16px;
            overflow: hidden;
        }

        .mj-about-cat-index {
            position: fixed;
            left: 0;
            right: 0;
            top: 78px;
            z-index: 50;
            opacity: 0;
            display: none;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(-6px);
            transition: opacity 0.25s ease, visibility 0.25s ease, transform 0.25s ease;
        }

        .mj-about-cat-index.is-visible {
            opacity: 1;
            display: block;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0);
        }

        .mj-about-cat-pills {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .mj-about-cat-pills::-webkit-scrollbar {
            display: none;
        }

        .mj-about-cat-index .mj-cat-index-inner {
            position: relative;
        }

        .mj-about-cat-index .mj-cat-index-inner::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 56px;
            background: linear-gradient(90deg, rgba(246, 239, 229, 0) 0%, rgba(246, 239, 229, 0.95) 78%);
            pointer-events: none;
        }

        .mj-about-block {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #eee;
            scroll-margin-top: 180px;
        }

        .mj-about-block:last-child {
            border-bottom: 0;
        }

        .mj-about-block-title {
            margin: 0 0 0.85rem;
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.35;
            color: #1f2937;
        }

        .mj-about-checklist {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.65rem 1.25rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .mj-about-checklist li {
            display: flex;
            align-items: flex-start;
            gap: 0.45rem;
            font-size: 0.9375rem;
            line-height: 1.45;
            color: #374151;
        }

        .mj-about-checklist li i {
            flex: 0 0 auto;
            margin-top: 0.1rem;
            font-size: 0.95rem;
            font-weight: 700;
            color: #111827;
        }

        @media (max-width: 575.98px) {
            .mj-about-block {
                padding: 1.1rem 1rem;
            }

            .mj-about-checklist {
                gap: 0.55rem 0.85rem;
            }
        }

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

        .mj-section-nav {
            margin-top: 1.75rem;
        }

        .mj-section-nav-inner {
            display: inline-flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 999px;
            background: #fff;
            box-shadow: 0 4px 18px rgba(28, 14, 10, 0.06);
        }

        .mj-section-nav-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.55rem 1.15rem;
            border-radius: 999px;
            background: #f3f4f6;
            color: #1f2937;
            font-size: 0.9375rem;
            font-weight: 600;
            line-height: 1.2;
            text-decoration: none;
            white-space: nowrap;
            transition: background-color .2s ease, color .2s ease, box-shadow .2s ease;
        }

        .mj-section-nav-pill:hover,
        .mj-section-nav-pill:focus-visible {
            color: #111827;
            background: #e5e7eb;
        }

        .mj-section-nav-pill.is-active {
            background: #22c55e;
            color: #fff;
            box-shadow: 0 2px 8px rgba(34, 197, 94, 0.35);
        }

        .mj-section-nav-pill.is-active:hover,
        .mj-section-nav-pill.is-active:focus-visible {
            color: #fff;
            background: #16a34a;
        }

        @media (max-width: 991.98px) {
            .mj-section-nav-inner {
                display: flex;
                width: 100%;
                justify-content: flex-start;
                overflow-x: auto;
                flex-wrap: nowrap;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
            }

            .mj-section-nav-inner::-webkit-scrollbar {
                display: none;
            }
        }

        span.mj-testimonial-avatar {
            display: block;
            justify-content: center;
            text-align: center;
            align-content: center;
            font-size: 20px;
            font-weight: 700;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sectionNav = document.querySelector(".mj-section-nav");
            if (sectionNav) {
                const navLinks = Array.from(sectionNav.querySelectorAll(".mj-section-nav-pill"));
                const navEntries = navLinks.map(function(link) {
                    const sectionIds = (link.getAttribute("data-sections") || "")
                        .split(",")
                        .map(function(id) {
                            return id.trim();
                        })
                        .filter(Boolean);
                    const elements = sectionIds
                        .map(function(id) {
                            return document.getElementById(id);
                        })
                        .filter(Boolean);

                    link.addEventListener("click", function(e) {
                        const target = elements[0];
                        if (!target) return;
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                        });
                        navLinks.forEach(function(item) {
                            item.classList.remove("is-active");
                        });
                        link.classList.add("is-active");
                    });

                    return {
                        link: link,
                        elements: elements,
                    };
                }).filter(function(entry) {
                    return entry.elements.length > 0;
                });

                const setActiveNav = function() {
                    const offset = window.innerHeight * 0.35;
                    let activeEntry = navEntries[0] || null;

                    navEntries.forEach(function(entry) {
                        entry.elements.forEach(function(section) {
                            const top = section.getBoundingClientRect().top;
                            if (top - offset <= 0) {
                                activeEntry = entry;
                            }
                        });
                    });

                    if (!activeEntry) return;
                    navLinks.forEach(function(item) {
                        item.classList.toggle("is-active", item === activeEntry.link);
                    });
                };

                window.addEventListener("scroll", setActiveNav, {
                    passive: true,
                });
                setActiveNav();
            }

            function initAboutCatIndex() {
                const aboutSection = document.getElementById("about");
                const panelBody = document.getElementById("aboutPanelBody");
                const nav = document.getElementById("aboutCatIndex");
                const pillsWrap = nav ? nav.querySelector(".mj-about-cat-pills") : null;
                const pills = nav ? Array.from(nav.querySelectorAll(".mj-about-cat-pill")) : [];
                const pairs = [];

                if (!aboutSection || !panelBody || !nav || !pills.length) return;

                function getHeaderBottom() {
                    const header = document.getElementById("mjHeader");
                    return header ? header.getBoundingClientRect().bottom : 78;
                }

                function syncNavTop() {
                    const header = document.getElementById("mjHeader");
                    if (header) {
                        nav.style.top = header.offsetHeight + "px";
                    }
                }

                function updateAboutNavVisibility() {
                    const headerBottom = getHeaderBottom();
                    const panelTop = panelBody.getBoundingClientRect().top;
                    const sectionBottom = aboutSection.getBoundingClientRect().bottom;
                    const show = panelTop <= headerBottom && sectionBottom > headerBottom;

                    nav.classList.toggle("is-visible", show);
                    nav.setAttribute("aria-hidden", show ? "false" : "true");
                }

                syncNavTop();
                updateAboutNavVisibility();
                window.addEventListener("scroll", updateAboutNavVisibility, {
                    passive: true,
                });
                window.addEventListener("resize", function() {
                    syncNavTop();
                    updateAboutNavVisibility();
                });

                function getScrollOffset() {
                    const header = document.getElementById("mjHeader");
                    let offset = (header ? header.offsetHeight : 78) + (nav.classList.contains("is-visible") ? nav
                        .offsetHeight : 0) + 16;
                    const menuNav = document.getElementById("catIndex");
                    if (menuNav) offset += menuNav.offsetHeight;
                    return offset;
                }

                function centerPill(pill) {
                    if (!pillsWrap || !pill) return;
                    const left = pill.offsetLeft - pillsWrap.clientWidth / 2 + pill.offsetWidth / 2;
                    const maxLeft = pillsWrap.scrollWidth - pillsWrap.clientWidth;
                    const nextLeft = Math.max(0, Math.min(left, maxLeft));
                    if (typeof pillsWrap.scrollTo === "function") {
                        pillsWrap.scrollTo({
                            left: nextLeft,
                            behavior: "smooth",
                        });
                    } else {
                        pillsWrap.scrollLeft = nextLeft;
                    }
                }

                let lockActive = false;
                let lockTimer = null;

                function lockScrollSpy(ms) {
                    lockActive = true;
                    clearTimeout(lockTimer);
                    lockTimer = setTimeout(function() {
                        lockActive = false;
                    }, ms || 800);
                }

                function setActivePill(pill) {
                    if (!pill) return;
                    pills.forEach(function(item) {
                        item.classList.remove("is-active");
                    });
                    pill.classList.add("is-active");
                    centerPill(pill);
                }

                pills.forEach(function(pill) {
                    const targetId = pill.dataset.target || (pill.getAttribute("href") || "").replace("#",
                        "");
                    const section = targetId ? document.getElementById(targetId) : null;
                    if (!section) return;

                    pairs.push({
                        pill: pill,
                        section: section,
                    });

                    pill.addEventListener("click", function(e) {
                        e.preventDefault();
                        setActivePill(pill);
                        lockScrollSpy(800);
                        const top = section.getBoundingClientRect().top + window.pageYOffset -
                            getScrollOffset();
                        window.scrollTo({
                            top: Math.max(0, top),
                            behavior: "smooth",
                        });
                        if (history.replaceState) {
                            history.replaceState(null, "", "#" + targetId);
                        }
                    });
                });

                if ("IntersectionObserver" in window && pairs.length) {
                    const sectionObserver = new IntersectionObserver(function(entries) {
                        if (lockActive) return;
                        const visible = entries
                            .filter(function(entry) {
                                return entry.isIntersecting;
                            })
                            .sort(function(a, b) {
                                return a.boundingClientRect.top - b.boundingClientRect.top;
                            });
                        if (!visible.length) return;
                        const match = pairs.find(function(item) {
                            return item.section === visible[0].target;
                        });
                        if (match) setActivePill(match.pill);
                    }, {
                        rootMargin: "-30% 0px -55% 0px",
                        threshold: 0,
                    });

                    pairs.forEach(function(item) {
                        sectionObserver.observe(item.section);
                    });
                }

                if (pillsWrap) {
                    pillsWrap.addEventListener("wheel", function(e) {
                        if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
                            pillsWrap.scrollLeft += e.deltaY;
                            e.preventDefault();
                        }
                    }, {
                        passive: false,
                    });
                }
            }

            initAboutCatIndex();

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
            const comments = document.querySelectorAll(".listReview .comment.hide");

            if (btn && comments.length > 0) {
                btn.addEventListener("click", function() {
                    comments.forEach(function(comment) {
                        comment.classList.remove("hide");
                        comment.classList.add("show");
                    });
                    btn.style.display = "none";
                });
            }
        });
    </script>
@endpush
