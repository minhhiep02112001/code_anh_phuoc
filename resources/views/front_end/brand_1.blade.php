

@extends('front_end._index')
@php
    $ver = $ver ?? 127;
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

    $orderUrl = !empty($post->redirect_order) ? $post->redirect_order : '#';
    $reserveUrl = !empty($post->redirect_reserve_table) ? $post->redirect_reserve_table : '#';
    $heroImage = !empty($post->thumbnail) ? getImageThumb($post->thumbnail) : '';
    $aboutSideImage = $photoGallery->first()
        ? convertPathImage($photoGallery->first()->thumbnail)
        : $heroImage;
@endphp

@section('menu_brand')
    @foreach ($pageNavItems ?? [] as $navItem)
        <li class="nav-item">
            <a class="mj-nav-link" href="{{ $navItem['href'] }}">{{ $navItem['label'] }}</a>
        </li>
    @endforeach
@endsection

@section('content')
    <main id="main" class="b1-brand" aria-label="{{ $post->title }}">

        {{-- Hero: cinematic full-bleed --}}
        <section class="b1-hero" id="overview" aria-labelledby="brandTitle">
            @if (!empty($heroImage))
                <div class="b1-hero-bg" style="background-image:url('{{ $heroImage }}')"></div>
            @endif
            <div class="b1-hero-overlay"></div>
            <div class="container-xxl b1-hero-inner">
                <div class="b1-hero-badge">{{ $dossierId }}</div>
                <h1 id="brandTitle" class="b1-hero-title">{{ $post->title }}</h1>
                @if (!empty($post->review_google))
                    <div class="b1-hero-rating">
                        @for ($s = 1; $s <= 5; $s++)
                            <i class="bi bi-star-fill"></i>
                        @endfor
                        <span>{{ $post->review_google }}</span>
                    </div>
                @endif
                @if (!empty($post->description))
                    <p class="b1-hero-lede">{{ $post->description }}</p>
                @endif
                <div class="b1-hero-actions">
                    <a href="#menu" class="b1-btn b1-btn-gold"><i class="bi bi-journal-richtext"></i> View Menu</a>
                    <a href="{{ $orderUrl }}" class="b1-btn b1-btn-ghost"
                        @if ($orderUrl !== '#') target="_blank" rel="noopener" @endif>
                        <i class="bi bi-bag-check"></i> Order Online
                    </a>
                    <a href="{{ $reserveUrl }}" class="b1-btn b1-btn-ghost"
                        @if ($reserveUrl !== '#') target="_blank" rel="noopener" @endif>
                        <i class="bi bi-calendar2-check"></i> Reserve
                    </a>
                </div>
                @if (!empty($pageNavItems))
                    <nav class="b1-section-nav" aria-label="Page sections">
                        @foreach ($pageNavItems as $navItem)
                            <a href="{{ $navItem['href'] }}"
                                class="b1-nav-pill{{ $loop->first ? ' is-active' : '' }}"
                                data-sections="{{ implode(',', $navItem['sections']) }}">{{ $navItem['label'] }}</a>
                        @endforeach
                    </nav>
                @endif
            </div>
        </section>

        {{-- Quick facts strip --}}
        @if (!empty($glanceItems))
            <section class="b1-facts" aria-label="Restaurant quick facts">
                <div class="container-xxl">
                    <div class="b1-facts-grid">
                        @foreach ($glanceItems as $fact)
                            <article class="b1-fact-card">
                                <i class="bi {{ $fact['icon'] ?? 'bi-info-circle' }}"></i>
                                <div>
                                    <strong>{{ $fact['title'] ?? '' }}</strong>
                                    <span>{{ $fact['text'] ?? '' }}</span>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- About --}}
        <section id="about">
            @if (!empty($post->content))
                <section class="b1-section b1-about" aria-labelledby="aboutTitle">
                    <div class="container-xxl">
                        <div class="row g-5 align-items-center">
                            @if ($aboutSideImage)
                                <div class="col-lg-5">
                                    <div class="b1-about-frame">
                                        <img src="{{ $aboutSideImage }}" alt="{{ $post->title }}" class="b1-about-img"
                                            loading="lazy">
                                        <span class="b1-about-frame-accent"></span>
                                    </div>
                                </div>
                            @endif
                            <div class="{{ $aboutSideImage ? 'col-lg-7' : 'col-12' }}">
                                <span class="b1-eyebrow">{{ __('config_data.menus.about') }}</span>
                                <h2 id="aboutTitle" class="b1-section-title">{{ $post->title }}</h2>
                                <div class="b1-prose">{!! $post->content !!}</div>
                                @if (!empty($knownFor))
                                    <ul class="b1-tags">
                                        @foreach ($knownFor as $tag)
                                            <li>{{ $tag }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @if ($aboutGroupsWithItems->isNotEmpty())
                <section class="b1-section b1-services" id="service" aria-labelledby="servicesTitle">
                    <div class="container-xxl">
                        <span class="b1-eyebrow">What we offer</span>
                        <h2 id="servicesTitle" class="b1-section-title">Services at {{ $post->title }}</h2>
                        <div class="b1-service-grid">
                            @foreach ($aboutGroupsWithItems as $aboutGroup)
                                <article class="b1-service-card" id="{{ $aboutGroup['sectionId'] }}">
                                    <div class="b1-service-icon"><i class="bi bi-gem"></i></div>
                                    <h3>{{ $aboutGroup['parent']->title }}</h3>
                                    <ul>
                                        @foreach ($aboutGroup['items'] as $aboutItem)
                                            <li><i class="bi bi-check2"></i>{{ $aboutItem->title }}</li>
                                        @endforeach
                                    </ul>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </section>

        {{-- Photos: masonry --}}
        @if ($hasPhotoGallery)
            <section class="b1-section b1-gallery" id="photo" aria-labelledby="albumTitle">
                <div class="container-xxl">
                    <span class="b1-eyebrow">{{ __('config_data.menus.photo') }}</span>
                    <h2 id="albumTitle" class="b1-section-title">Inside {{ $post->title }}</h2>
                    <div class="b1-masonry">
                        @foreach ($photoCards as $i => $photo)
                            @php
                                $photoAlt = $post->title . ' Photo ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                                $photoSrc = convertPathImage($photo->thumbnail);
                                $sizeClass = $i % 5 === 0 ? 'b1-masonry-tall' : ($i % 3 === 0 ? 'b1-masonry-wide' : '');
                            @endphp
                            <button type="button" class="b1-masonry-item {{ $sizeClass }}"
                                data-photo-lightbox="{{ $i }}" aria-label="Open photo: {{ $photoAlt }}">
                                <img src="{{ $photoSrc }}" alt="{{ $photoAlt }}" loading="lazy">
                            </button>
                        @endforeach
                    </div>
                    @if ($photoGallery->count() > 6)
                        <div class="text-center mt-4">
                            <button type="button" class="b1-btn b1-btn-gold js-open-photo-gallery">
                                <i class="bi bi-images"></i> View all {{ $photoGallery->count() }} photos
                            </button>
                        </div>
                    @endif
                </div>
            </section>
        @endif

        {{-- Menu highlights: horizontal scroll --}}
        @if ($highlightCards->count() > 0)
            <section class="b1-section b1-highlights" id="highlights" aria-labelledby="highlightsTitle">
                <div class="container-xxl">
                    <span class="b1-eyebrow">{{ __('config_data.menus.menu') }}</span>
                    <h2 id="highlightsTitle" class="b1-section-title">Signature dishes</h2>
                    <div class="b1-scroll-row">
                        @foreach ($highlightCards as $i => $item)
                            @php
                                $highlightTitle = $item->title ?? $post->title . ' Menu ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                                $highlightImage = convertPathImage($item->thumbnail ?? '');
                            @endphp
                            <article class="b1-scroll-card{{ $hasMenuGallery ? ' b1-scroll-card--click' : '' }}"
                                @if ($hasMenuGallery) role="button" tabindex="0" data-menu-lightbox="{{ $i }}" @endif>
                                <img src="{{ $highlightImage }}" alt="{{ $highlightTitle }}" loading="lazy">
                                <div class="b1-scroll-card-cap">
                                    <h3>{{ $highlightTitle }}</h3>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    @if ($hasMenuGallery && $menuGallery->count() > 6)
                        <div class="text-center mt-4">
                            <button type="button" class="b1-btn b1-btn-outline js-open-menu-gallery">
                                View all {{ $menuGallery->count() }} menu pages
                            </button>
                        </div>
                    @endif
                </div>
            </section>
        @endif

        {{-- Full menu: accordion --}}
        @if ($menuSections->isNotEmpty())
            <section class="b1-section b1-menu" id="menu" aria-labelledby="menuSectionsTitle">
                <div class="container-xxl">
                    <span class="b1-eyebrow">Full menu</span>
                    <h2 id="menuSectionsTitle" class="b1-section-title">Explore our menu</h2>
                    <div class="b1-accordion-list">
                        @foreach ($menuSections as $i => $category)
                            @php
                                $sectionId = 'sec-' . \Illuminate\Support\Str::slug($category->title);
                                $items = ($menuItemsByParent->get($category->id) ?? collect())->sortBy('id')->values();
                            @endphp
                            <article class="b1-accordion{{ $i === 0 ? ' is-open' : '' }}" data-accordion
                                id="{{ $sectionId }}">
                                <button type="button" class="b1-accordion-head" data-accordion-trigger>
                                    <span class="b1-accordion-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                    <span class="b1-accordion-title">{{ $category->title }}</span>
                                    <span class="b1-accordion-count">{{ $items->count() }} items</span>
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                                <div class="b1-accordion-body">
                                    <ul class="b1-menu-list">
                                        @foreach ($items as $item)
                                            <li class="b1-menu-item">
                                                <div>
                                                    <h4>{{ $item->title }}</h4>
                                                    @if (!empty($item->description))
                                                        <p>{!! nl2br(e(strip_tags($item->description))) !!}</p>
                                                    @endif
                                                </div>
                                                @if (!empty($item->price))
                                                    <span class="b1-menu-price">{{ $item->price }}</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Location --}}
        @if ($hasLocationSection)
            <section class="b1-section b1-location" id="location" aria-labelledby="locationTitle">
                <div class="container-xxl">
                    <span class="b1-eyebrow">{{ __('config_data.menus.location') }}</span>
                    <h2 id="locationTitle" class="b1-section-title">Find us &amp; visit</h2>
                    @if (!empty($post->iframe_map))
                        <div class="b1-map-wrap">{!! $post->iframe_map !!}</div>
                    @endif
                    <div class="row g-4 mt-1">
                        <div class="{{ !empty($timeSchedule) ? 'col-lg-6' : 'col-12' }}">
                            <article class="b1-loc-card">
                                <h3><i class="bi bi-pin-map-fill"></i> Address &amp; Contact</h3>
                                @if (!empty($post->address))
                                    <p><strong>Address</strong><br>{{ $post->address }}</p>
                                @endif
                                @if (!empty($post->phone))
                                    <p><strong>Phone</strong><br>
                                        <a href="tel:{{ preg_replace('/\s+/', '', $post->phone) }}">{{ $post->phone }}</a>
                                    </p>
                                @endif
                                @if ($directionsUrl !== '#')
                                    <a href="{{ $directionsUrl }}" target="_blank" rel="noopener" class="b1-btn b1-btn-gold">
                                        <i class="bi bi-signpost-2"></i> Get Directions
                                    </a>
                                @endif
                            </article>
                        </div>
                        @if (!empty($timeSchedule))
                            <div class="col-lg-6">
                                <article class="b1-loc-card">
                                    <h3><i class="bi bi-clock-fill"></i> Opening Hours
                                        @if (!empty($todayHours))
                                            <span class="b1-hours-badge time-status" data-time="{{ $todayHours }}"></span>
                                        @endif
                                    </h3>
                                    <ul class="b1-hours">
                                        @foreach ($timeSchedule as $row)
                                            <li>
                                                <span>{{ $row['day'] ?? '' }}</span>
                                                <span>{{ $row['hours'] ?? '' }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </article>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        {{-- Reviews --}}
        @if ($hasReviewsSection)
            <section class="b1-section b1-reviews" id="review" aria-labelledby="reviewsTitle">
                <div class="container-xxl">
                    <span class="b1-eyebrow">{{ __('config_data.menus.review') }}</span>
                    <h2 id="reviewsTitle" class="b1-section-title">Guest experiences</h2>
                    @if ($reviews->count() > 0)
                        <div class="b1-review-grid listReview row g-4">
                            @foreach ($reviews as $i => $review)
                                <div class="col-md-6 col-lg-4 comment {{ $i >= 6 ? 'hide' : 'show' }}">
                                    <article class="b1-review-card">
                                        <i class="bi bi-quote b1-quote-icon"></i>
                                        <blockquote>{{ $review->content }}</blockquote>
                                        @php
                                            $reviewName = trim($review->fullname ?? '') ?: 'Guest';
                                            $reviewInitial = mb_strtoupper(mb_substr($reviewName, 0, 1));
                                        @endphp
                                        <footer>
                                            <span class="b1-review-avatar">{{ $reviewInitial }}</span>
                                            <div>
                                                @if (!empty($review->fullname))
                                                    <strong>{{ $review->fullname }}</strong>
                                                @endif
                                                @if (!empty($review->created_at))
                                                    <small>{{ timeAgo($review->created_at) }}</small>
                                                @endif
                                            </div>
                                        </footer>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        @if ($reviews->count() > 6)
                            <div class="text-center mt-4">
                                <button type="button" class="b1-btn b1-btn-outline loadmoreReview">Load more reviews</button>
                            </div>
                        @endif
                    @endif
                </div>
            </section>
        @endif

        {{-- Related --}}
        @if ($relates->count() > 0)
            <section class="b1-section b1-related" id="similar" aria-labelledby="similarTitle">
                <div class="container-xxl">
                    <span class="b1-eyebrow">Nearby</span>
                    <h2 id="similarTitle" class="b1-section-title">Similar restaurants</h2>
                    <div class="row g-4">
                        @foreach ($relates as $relate)
                            @php
                                $relateUrl = !empty($relate->website)
                                    ? rtrim($relate->website, '/')
                                    : route('post', ['slug' => $relate->slug]);
                            @endphp
                            <div class="col-md-6 col-lg-4">
                                <a href="{{ $relateUrl }}" class="b1-related-card" title="{{ $relate->title }}">
                                    <img class="lazy" src="{{ asset('public/dot.jpg') }}"
                                        data-src="{{ getImageThumb($relate->thumbnail) }}" alt="{{ $relate->title }}">
                                    <div class="b1-related-body">
                                        <h3>{{ $relate->title }}</h3>
                                        @if (!empty($relate->address))
                                            <p><i class="bi bi-geo-alt"></i> {{ $relate->address }}</p>
                                        @endif
                                        @if (!empty($relate->review_google))
                                            <span><i class="bi bi-star-fill"></i> {{ $relate->review_google }}</span>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>

    @include('front_end.brand._lightbox')
@endsection

@push('scripts')
<style>
.b1-brand { --b1-gold: #c9a962; --b1-dark: #1a1410; --b1-cream: #faf6f0; --b1-muted: #6b5d52; background: var(--b1-cream); color: var(--b1-dark); }
.b1-hero { position: relative; min-height: clamp(420px, 72vh, 680px); display: flex; align-items: flex-end; padding: clamp(48px, 8vw, 96px) 0 clamp(32px, 5vw, 64px); overflow: hidden; }
.b1-hero-bg { position: absolute; inset: 0; background-size: cover; background-position: center; transform: scale(1.05); }
.b1-hero-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(26,20,16,.35) 0%, rgba(26,20,16,.88) 70%, rgba(26,20,16,.95) 100%); }
.b1-hero-inner { position: relative; z-index: 2; color: #fff; max-width: 820px; }
.b1-hero-badge { display: inline-block; padding: 6px 14px; border: 1px solid rgba(201,169,98,.6); border-radius: 999px; font-size: 12px; letter-spacing: .12em; text-transform: uppercase; color: var(--b1-gold); margin-bottom: 16px; }
.b1-hero-title { font-family: Georgia, "Times New Roman", serif; font-size: clamp(2.2rem, 5vw, 3.75rem); font-weight: 500; line-height: 1.1; margin: 0 0 12px; }
.b1-hero-rating { display: flex; align-items: center; gap: 6px; color: var(--b1-gold); margin-bottom: 16px; font-size: 15px; }
.b1-hero-lede { font-size: 1.05rem; line-height: 1.65; opacity: .92; max-width: 560px; margin-bottom: 24px; }
.b1-hero-actions { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 28px; }
.b1-btn { display: inline-flex; align-items: center; gap: 8px; padding: 12px 22px; border-radius: 999px; font-size: 14px; font-weight: 600; text-decoration: none; border: 1px solid transparent; transition: transform .25s, box-shadow .25s, background .25s; cursor: pointer; }
.b1-btn-gold { background: var(--b1-gold); color: var(--b1-dark); border-color: var(--b1-gold); }
.b1-btn-gold:hover { transform: translateY(-2px); box-shadow: 0 12px 28px rgba(201,169,98,.35); color: var(--b1-dark); }
.b1-btn-ghost { background: rgba(255,255,255,.08); color: #fff; border-color: rgba(255,255,255,.35); backdrop-filter: blur(6px); }
.b1-btn-ghost:hover { background: rgba(255,255,255,.18); color: #fff; }
.b1-btn-outline { background: transparent; color: var(--b1-dark); border-color: rgba(26,20,16,.25); }
.b1-section-nav { display: flex; flex-wrap: wrap; gap: 8px; }
.b1-nav-pill { padding: 10px 18px; border-radius: 999px; border: 1px solid rgba(255,255,255,.25); color: #fff; font-size: 13px; font-weight: 600; text-decoration: none; transition: background .2s; }
.b1-nav-pill:hover, .b1-nav-pill.is-active { background: var(--b1-gold); border-color: var(--b1-gold); color: var(--b1-dark); }
.b1-facts { background: #fff; border-bottom: 1px solid rgba(0,0,0,.06); padding: 28px 0; margin-top: -1px; position: relative; z-index: 3; }
.b1-facts-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; }
.b1-fact-card { display: flex; gap: 14px; padding: 16px 18px; border-radius: 14px; background: var(--b1-cream); }
.b1-fact-card i { font-size: 22px; color: var(--b1-gold); flex-shrink: 0; margin-top: 2px; }
.b1-fact-card strong { display: block; font-size: 12px; text-transform: uppercase; letter-spacing: .06em; color: var(--b1-muted); margin-bottom: 4px; }
.b1-fact-card span { font-size: 14px; line-height: 1.45; color: var(--b1-dark); }
.b1-section { padding: clamp(56px, 8vw, 96px) 0; }
.b1-eyebrow { display: block; font-size: 12px; letter-spacing: .14em; text-transform: uppercase; color: var(--b1-gold); margin-bottom: 10px; font-weight: 600; }
.b1-section-title { font-family: Georgia, serif; font-size: clamp(1.75rem, 3.5vw, 2.5rem); margin: 0 0 32px; line-height: 1.2; }
.b1-about-frame { position: relative; border-radius: 20px; overflow: hidden; }
.b1-about-img { width: 100%; aspect-ratio: 4/5; object-fit: cover; display: block; }
.b1-about-frame-accent { position: absolute; inset: 12px; border: 2px solid rgba(201,169,98,.5); border-radius: 14px; pointer-events: none; }
.b1-prose { font-size: 1rem; line-height: 1.75; color: #3d3530; }
.b1-prose p:last-child { margin-bottom: 0; }
.b1-tags { display: flex; flex-wrap: wrap; gap: 8px; margin: 20px 0 0; padding: 0; list-style: none; }
.b1-tags li { padding: 6px 14px; border-radius: 999px; background: rgba(201,169,98,.15); font-size: 13px; font-weight: 500; }
.b1-services { background: #fff; }
.b1-service-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; }
.b1-service-card { padding: 28px; border-radius: 18px; border: 1px solid rgba(0,0,0,.07); background: var(--b1-cream); transition: transform .3s, box-shadow .3s; }
.b1-service-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(26,20,16,.08); }
.b1-service-icon { width: 48px; height: 48px; border-radius: 12px; background: var(--b1-gold); display: flex; align-items: center; justify-content: center; font-size: 22px; color: #fff; margin-bottom: 16px; }
.b1-service-card h3 { font-size: 1.15rem; margin: 0 0 14px; }
.b1-service-card ul { margin: 0; padding: 0; list-style: none; }
.b1-service-card li { display: flex; gap: 8px; font-size: 14px; line-height: 1.5; padding: 5px 0; color: var(--b1-muted); }
.b1-service-card li i { color: var(--b1-gold); flex-shrink: 0; }
.b1-masonry { display: grid; grid-template-columns: repeat(4, 1fr); grid-auto-rows: 180px; gap: 12px; }
.b1-masonry-item { border: 0; padding: 0; border-radius: 14px; overflow: hidden; cursor: pointer; background: #ddd; }
.b1-masonry-item img { width: 100%; height: 100%; object-fit: cover; transition: transform .4s; display: block; }
.b1-masonry-item:hover img { transform: scale(1.06); }
.b1-masonry-tall { grid-row: span 2; }
.b1-masonry-wide { grid-column: span 2; }
.b1-scroll-row { display: flex; gap: 16px; overflow-x: auto; padding-bottom: 8px; scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; }
.b1-scroll-row::-webkit-scrollbar { height: 6px; }
.b1-scroll-row::-webkit-scrollbar-thumb { background: var(--b1-gold); border-radius: 99px; }
.b1-scroll-card { flex: 0 0 clamp(240px, 32vw, 300px); scroll-snap-align: start; border-radius: 16px; overflow: hidden; position: relative; background: #ddd; }
.b1-scroll-card--click { cursor: pointer; }
.b1-scroll-card img { width: 100%; aspect-ratio: 3/4; object-fit: cover; display: block; }
.b1-scroll-card-cap { position: absolute; inset: auto 0 0; padding: 20px 16px; background: linear-gradient(transparent, rgba(26,20,16,.85)); color: #fff; }
.b1-scroll-card-cap h3 { margin: 0; font-size: 1rem; }
.b1-accordion-list { max-width: 860px; margin: 0 auto; }
.b1-accordion { border: 1px solid rgba(0,0,0,.08); border-radius: 14px; margin-bottom: 12px; overflow: hidden; background: #fff; }
.b1-accordion-head { width: 100%; display: flex; align-items: center; gap: 12px; padding: 18px 20px; border: 0; background: transparent; cursor: pointer; text-align: left; font-size: 1rem; }
.b1-accordion-num { font-size: 12px; color: var(--b1-gold); font-weight: 700; min-width: 28px; }
.b1-accordion-title { flex: 1; font-weight: 700; }
.b1-accordion-count { font-size: 13px; color: var(--b1-muted); }
.b1-accordion-head i { transition: transform .3s; color: var(--b1-muted); }
.b1-accordion.is-open .b1-accordion-head i { transform: rotate(180deg); }
.b1-accordion-body { max-height: 0; overflow: hidden; transition: max-height .35s ease; }
.b1-accordion.is-open .b1-accordion-body { max-height: 2000px; }
.b1-menu-list { margin: 0; padding: 0 20px 20px; list-style: none; }
.b1-menu-item { display: flex; justify-content: space-between; gap: 16px; padding: 14px 0; border-top: 1px dashed rgba(0,0,0,.08); }
.b1-menu-item h4 { margin: 0 0 4px; font-size: 15px; }
.b1-menu-item p { margin: 0; font-size: 13px; color: var(--b1-muted); line-height: 1.45; }
.b1-menu-price { font-weight: 700; color: var(--b1-gold); white-space: nowrap; }
.b1-map-wrap { border-radius: 18px; overflow: hidden; margin-bottom: 8px; }
.b1-map-wrap iframe { width: 100%; min-height: 320px; border: 0; display: block; }
.b1-loc-card { padding: 28px; border-radius: 18px; background: #fff; border: 1px solid rgba(0,0,0,.07); height: 100%; }
.b1-loc-card h3 { font-size: 1.1rem; margin: 0 0 18px; display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.b1-loc-card p { margin: 0 0 12px; font-size: 14px; line-height: 1.55; }
.b1-hours { margin: 0; padding: 0; list-style: none; }
.b1-hours li { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid rgba(0,0,0,.06); font-size: 14px; }
.b1-reviews { background: #fff; }
.b1-review-card { padding: 28px; border-radius: 18px; background: var(--b1-cream); height: 100%; display: flex; flex-direction: column; border: 1px solid rgba(0,0,0,.05); }
.b1-quote-icon { font-size: 2rem; color: var(--b1-gold); opacity: .5; margin-bottom: 8px; }
.b1-review-card blockquote { flex: 1; margin: 0 0 20px; font-style: italic; line-height: 1.6; font-size: 15px; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden; }
.b1-review-card footer { display: flex; align-items: center; gap: 12px; }
.b1-review-avatar { width: 42px; height: 42px; border-radius: 50%; background: var(--b1-gold); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; }
.b1-related-card { display: block; border-radius: 16px; overflow: hidden; background: #fff; border: 1px solid rgba(0,0,0,.07); text-decoration: none; color: inherit; transition: transform .3s, box-shadow .3s; height: 100%; }
.b1-related-card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(26,20,16,.1); color: inherit; }
.b1-related-card img { width: 100%; aspect-ratio: 16/10; object-fit: cover; display: block; }
.b1-related-body { padding: 18px; }
.b1-related-body h3 { margin: 0 0 8px; font-size: 1.05rem; }
.b1-related-body p { margin: 0 0 6px; font-size: 13px; color: var(--b1-muted); }
.b1-related-body span { font-size: 13px; color: var(--b1-gold); }
.listReview .comment.hide { display: none !important; }
@media (max-width: 991.98px) {
    .b1-masonry { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 140px; }
    .b1-masonry-wide { grid-column: span 1; }
    .b1-hero-actions { position: fixed; left: 0; right: 0; bottom: 0; z-index: 90; margin: 0; padding: 10px 12px calc(10px + env(safe-area-inset-bottom)); background: linear-gradient(transparent, rgba(26,20,16,.95)); justify-content: center; }
    .b1-hero-actions .b1-btn { flex: 1; justify-content: center; font-size: 12px; padding: 11px 10px; }
    main#main { padding-bottom: calc(80px + env(safe-area-inset-bottom)); }
}
@media (max-width: 575.98px) { .b1-masonry { grid-template-columns: 1fr 1fr; } }
</style>
@include('front_end.brand._scripts')
@endpush
