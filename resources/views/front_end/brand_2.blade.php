@extends('front_end._index')
@include('front_end.brand._prep')
@section('menu_brand')
    @foreach ($pageNavItems as $navItem)
        <li class="nav-item">
            <a class="mj-nav-link" href="{{ $navItem['href'] }}">{{ $navItem['label'] }}</a>
        </li>
    @endforeach
@endsection

@section('content')
    <main id="main" class="b2-brand" aria-label="{{ $post->title }}">

        {{-- Hero: split screen --}}
        <section class="b2-hero" id="overview" aria-labelledby="brandTitle">
            <div class="container-xxl">
                <div class="row g-0 b2-hero-row align-items-stretch">
                    <div class="col-lg-6 b2-hero-copy">
                        <div class="b2-hero-accent"></div>
                        <div class="b2-hero-content">
                            <span class="b2-label">Welcome to</span>
                            <h1 id="brandTitle" class="b2-title">{{ $post->title }}</h1>
                            @if (!empty($post->review_google))
                                <div class="b2-rating">
                                    @for ($s = 1; $s <= 5; $s++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                    <span>{{ $post->review_google }} on Google</span>
                                </div>
                            @endif
                            @if (!empty($post->description))
                                <p class="b2-lede">{{ $post->description }}</p>
                            @endif
                            <ul class="b2-chips">
                                @if (!empty($post->address))
                                    <li><i class="bi bi-geo-alt-fill"></i>{{ $post->address }}</li>
                                @endif
                                @if (!empty($post->phone))
                                    <li><i class="bi bi-telephone-fill"></i>{{ $post->phone }}</li>
                                @endif
                                @if (!empty($priceRange))
                                    <li><i class="bi bi-cash-stack"></i>{{ $priceRange }}</li>
                                @endif
                            </ul>
                            <div class="b2-actions">
                                <a href="#menu" class="b2-btn b2-btn-primary"><i class="bi bi-journal-richtext"></i> Menu</a>
                                <a href="{{ $orderUrl }}" class="b2-btn b2-btn-secondary"
                                    @if ($orderUrl !== '#') target="_blank" rel="noopener" @endif>
                                    <i class="bi bi-bag-check"></i> Order
                                </a>
                                <a href="{{ $reserveUrl }}" class="b2-btn b2-btn-secondary"
                                    @if ($reserveUrl !== '#') target="_blank" rel="noopener" @endif>
                                    <i class="bi bi-calendar2-check"></i> Book
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 b2-hero-visual">
                        @if ($heroImage)
                            <img src="{{ $heroImage }}" alt="{{ $post->title }}" class="b2-hero-img">
                        @else
                            <div class="b2-hero-placeholder"><i class="bi bi-shop"></i></div>
                        @endif
                    </div>
                </div>
            </div>
            @if (!empty($pageNavItems))
                <nav class="b2-section-nav container-xxl" aria-label="Page sections">
                    <div class="b2-section-nav-inner">
                        @foreach ($pageNavItems as $navItem)
                            <a href="{{ $navItem['href'] }}"
                                class="b2-nav-link{{ $loop->first ? ' is-active' : '' }}"
                                data-sections="{{ implode(',', $navItem['sections']) }}">{{ $navItem['label'] }}</a>
                        @endforeach
                    </div>
                </nav>
            @endif
        </section>

        {{-- Glance cards --}}
        @if (!empty($glanceItems))
            <section class="b2-glance" aria-label="Quick info">
                <div class="container-xxl">
                    <div class="row g-3">
                        @foreach ($glanceItems as $fact)
                            <div class="col-6 col-md-4 col-lg">
                                <article class="b2-glance-card">
                                    <i class="bi {{ $fact['icon'] ?? 'bi-info-circle' }}"></i>
                                    <strong>{{ $fact['title'] ?? '' }}</strong>
                                    <span>{{ $fact['text'] ?? '' }}</span>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- About --}}
        <section id="about">
            @if (!empty($post->content))
                <section class="b2-section b2-about" aria-labelledby="aboutTitle">
                    <div class="container-xxl">
                        <div class="b2-about-center">
                            <span class="b2-eyebrow">{{ __('config_data.menus.about') }}</span>
                            <h2 id="aboutTitle" class="b2-section-title">Our story</h2>
                            <div class="b2-about-quote-mark">"</div>
                            <div class="b2-prose">{!! $post->content !!}</div>
                            @if (!empty($goodFor))
                                <div class="b2-good-for">
                                    <span>Perfect for</span>
                                    @foreach ($goodFor as $gf)
                                        <em>{{ $gf }}</em>@if (!$loop->last), @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif

            @if ($aboutGroupsWithItems->isNotEmpty())
                <section class="b2-section b2-services" id="service" aria-labelledby="servicesTitle"
                    data-tab-group>
                    <div class="container-xxl">
                        <span class="b2-eyebrow">Services</span>
                        <h2 id="servicesTitle" class="b2-section-title">What makes us special</h2>
                        <div class="b2-tabs">
                            @foreach ($aboutGroupsWithItems as $i => $aboutGroup)
                                <button type="button"
                                    class="b2-tab{{ $i === 0 ? ' is-active' : '' }}"
                                    data-tab-trigger="{{ $aboutGroup['sectionId'] }}">
                                    {{ $aboutGroup['parent']->title }}
                                </button>
                            @endforeach
                        </div>
                        @foreach ($aboutGroupsWithItems as $i => $aboutGroup)
                            <div class="b2-tab-panel{{ $i === 0 ? ' is-active' : '' }}"
                                data-tab-panel="{{ $aboutGroup['sectionId'] }}" id="{{ $aboutGroup['sectionId'] }}">
                                <div class="row g-3">
                                    @foreach ($aboutGroup['items'] as $aboutItem)
                                        <div class="col-md-6 col-lg-4">
                                            <article class="b2-feature-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>{{ $aboutItem->title }}</span>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </section>

        {{-- Photos: bento grid --}}
        @if ($hasPhotoGallery)
            <section class="b2-section b2-photos" id="photo" aria-labelledby="albumTitle">
                <div class="container-xxl">
                    <div class="b2-head-row">
                        <div>
                            <span class="b2-eyebrow">{{ __('config_data.menus.photo') }}</span>
                            <h2 id="albumTitle" class="b2-section-title">Gallery</h2>
                        </div>
                        @if ($photoGallery->count() > 6)
                            <button type="button" class="b2-btn b2-btn-outline js-open-photo-gallery">
                                All photos ({{ $photoGallery->count() }})
                            </button>
                        @endif
                    </div>
                    <div class="b2-bento">
                        @foreach ($photoCards as $i => $photo)
                            @php
                                $photoAlt = $post->title . ' Photo ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                                $photoSrc = convertPathImage($photo->thumbnail);
                                $bentoClasses = ['b2-bento-a', 'b2-bento-b', 'b2-bento-c', 'b2-bento-d', 'b2-bento-e', 'b2-bento-f'];
                                $bentoClass = $bentoClasses[$i % 6];
                            @endphp
                            <button type="button" class="b2-bento-cell {{ $bentoClass }}"
                                data-photo-lightbox="{{ $i }}" aria-label="Open photo: {{ $photoAlt }}">
                                <img src="{{ $photoSrc }}" alt="{{ $photoAlt }}" loading="lazy">
                            </button>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- Menu highlights --}}
        @if ($highlightCards->count() > 0)
            <section class="b2-section b2-menu-highlights" id="highlights" aria-labelledby="highlightsTitle">
                <div class="container-xxl">
                    <span class="b2-eyebrow">{{ __('config_data.menus.menu') }}</span>
                    <h2 id="highlightsTitle" class="b2-section-title">Menu highlights</h2>
                    <div class="row g-4">
                        @foreach ($highlightCards as $i => $item)
                            @php
                                $highlightTitle = $item->title ?? $post->title . ' Menu ' . str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                                $highlightImage = convertPathImage($item->thumbnail ?? '');
                            @endphp
                            <div class="col-md-6 col-lg-4">
                                <article class="b2-menu-card{{ $hasMenuGallery ? ' b2-menu-card--click' : '' }}"
                                    @if ($hasMenuGallery) role="button" tabindex="0" data-menu-lightbox="{{ $i }}" @endif>
                                    <div class="b2-menu-card-img">
                                        <img src="{{ $highlightImage }}" alt="{{ $highlightTitle }}" loading="lazy">
                                    </div>
                                    <h3>{{ $highlightTitle }}</h3>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    @if ($hasMenuGallery && $menuGallery->count() > 6)
                        <div class="text-center mt-4">
                            <button type="button" class="b2-btn b2-btn-primary js-open-menu-gallery">
                                View {{ $menuGallery->count() }} menu pages
                            </button>
                        </div>
                    @endif
                </div>
            </section>
        @endif

        {{-- Full menu with category pills --}}
        @if ($menuSections->isNotEmpty())
            <section class="b2-section b2-full-menu" id="menu" aria-labelledby="menuSectionsTitle" data-tab-group>
                <div class="container-xxl">
                    <span class="b2-eyebrow">Full menu</span>
                    <h2 id="menuSectionsTitle" class="b2-section-title">Order your favorites</h2>
                    <div class="b2-menu-tabs">
                        @foreach ($menuSections as $i => $category)
                            @php $sectionId = 'sec-' . \Illuminate\Support\Str::slug($category->title); @endphp
                            <button type="button" class="b2-menu-tab{{ $i === 0 ? ' is-active' : '' }}"
                                data-tab-trigger="{{ $sectionId }}">{{ $category->title }}</button>
                        @endforeach
                    </div>
                    @foreach ($menuSections as $i => $category)
                        @php
                            $sectionId = 'sec-' . \Illuminate\Support\Str::slug($category->title);
                            $items = ($menuItemsByParent->get($category->id) ?? collect())->sortBy('id')->values();
                        @endphp
                        <div class="b2-menu-panel{{ $i === 0 ? ' is-active' : '' }}" data-tab-panel="{{ $sectionId }}"
                            id="{{ $sectionId }}">
                            <div class="row g-3">
                                @foreach ($items as $item)
                                    <div class="col-md-6">
                                        <article class="b2-dish-card">
                                            <div class="b2-dish-head">
                                                <h4>{{ $item->title }}</h4>
                                                @if (!empty($item->price))
                                                    <span class="b2-dish-price">{{ $item->price }}</span>
                                                @endif
                                            </div>
                                            @if (!empty($item->description))
                                                <p>{!! nl2br(e(strip_tags($item->description))) !!}</p>
                                            @endif
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Location: side layout with timeline hours --}}
        @if ($hasLocationSection)
            <section class="b2-section b2-location" id="location" aria-labelledby="locationTitle">
                <div class="container-xxl">
                    <div class="row g-4 align-items-start">
                        <div class="col-lg-5">
                            <span class="b2-eyebrow">{{ __('config_data.menus.location') }}</span>
                            <h2 id="locationTitle" class="b2-section-title">Visit us</h2>
                            <div class="b2-contact-block">
                                @if (!empty($post->address))
                                    <div class="b2-contact-row">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <div>
                                            <strong>Address</strong>
                                            <p>{{ $post->address }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($post->phone))
                                    <div class="b2-contact-row">
                                        <i class="bi bi-telephone-fill"></i>
                                        <div>
                                            <strong>Phone</strong>
                                            <p><a href="tel:{{ preg_replace('/\s+/', '', $post->phone) }}">{{ $post->phone }}</a></p>
                                        </div>
                                    </div>
                                @endif
                                @if ($directionsUrl !== '#')
                                    <a href="{{ $directionsUrl }}" target="_blank" rel="noopener" class="b2-btn b2-btn-primary">
                                        <i class="bi bi-signpost-2"></i> Directions
                                    </a>
                                @endif
                            </div>
                            @if (!empty($timeSchedule))
                                <div class="b2-timeline">
                                    <h3><i class="bi bi-clock"></i> Hours
                                        @if (!empty($todayHours))
                                            <span class="b2-open-badge time-status" data-time="{{ $todayHours }}"></span>
                                        @endif
                                    </h3>
                                    @foreach ($timeSchedule as $row)
                                        <div class="b2-timeline-row">
                                            <span class="b2-timeline-day">{{ $row['day'] ?? '' }}</span>
                                            <span class="b2-timeline-dot"></span>
                                            <span class="b2-timeline-time">{{ $row['hours'] ?? '' }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @if (!empty($post->iframe_map))
                            <div class="col-lg-7">
                                <div class="b2-map-card">{!! $post->iframe_map !!}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        {{-- Reviews --}}
        @if ($hasReviewsSection)
            <section class="b2-section b2-reviews" id="review" aria-labelledby="reviewsTitle">
                <div class="container-xxl">
                    <span class="b2-eyebrow">{{ __('config_data.menus.review') }}</span>
                    <h2 id="reviewsTitle" class="b2-section-title">What guests say</h2>
                    @if ($reviews->count() > 0)
                        <div class="listReview row g-4">
                            @foreach ($reviews as $i => $review)
                                <div class="col-md-6 comment {{ $i >= 6 ? 'hide' : 'show' }}">
                                    <article class="b2-review">
                                        <div class="b2-review-stars">
                                            @for ($s = 1; $s <= 5; $s++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                        <p>{{ $review->content }}</p>
                                        @php
                                            $reviewName = trim($review->fullname ?? '') ?: 'Guest';
                                            $reviewInitial = mb_strtoupper(mb_substr($reviewName, 0, 1));
                                        @endphp
                                        <footer>
                                            <span class="b2-review-av">{{ $reviewInitial }}</span>
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
                                <button type="button" class="b2-btn b2-btn-outline loadmoreReview">Show more</button>
                            </div>
                        @endif
                    @elseif (!empty($post->review_google))
                        <div class="b2-google-score">
                            <i class="bi bi-google"></i>
                            <strong>{{ $post->review_google }}</strong>
                            <span>Google rating</span>
                        </div>
                    @endif
                </div>
            </section>
        @endif

        {{-- Related: horizontal cards --}}
        @if ($relates->count() > 0)
            <section class="b2-section b2-related" id="similar" aria-labelledby="similarTitle">
                <div class="container-xxl">
                    <span class="b2-eyebrow">Explore more</span>
                    <h2 id="similarTitle" class="b2-section-title">Nearby dining</h2>
                    <div class="b2-related-scroll">
                        @foreach ($relates as $relate)
                            @php
                                $relateUrl = !empty($relate->website)
                                    ? rtrim($relate->website, '/')
                                    : route('post', ['slug' => $relate->slug]);
                            @endphp
                            <a href="{{ $relateUrl }}" class="b2-related-item" title="{{ $relate->title }}">
                                <img class="lazy" src="{{ asset('public/dot.jpg') }}"
                                    data-src="{{ getImageThumb($relate->thumbnail) }}" alt="{{ $relate->title }}">
                                <div>
                                    <h3>{{ $relate->title }}</h3>
                                    @if (!empty($relate->address))
                                        <p>{{ $relate->address }}</p>
                                    @endif
                                </div>
                                @if (!empty($relate->review_google))
                                    <span class="b2-related-score"><i class="bi bi-star-fill"></i>{{ $relate->review_google }}</span>
                                @endif
                            </a>
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
.b2-brand { --b2-teal: #0d9488; --b2-teal-dark: #0f766e; --b2-surface: #f0fdfa; --b2-ink: #134e4a; --b2-soft: #5eead4; background: #fff; color: var(--b2-ink); }
.b2-hero { padding: clamp(32px, 5vw, 56px) 0 0; background: var(--b2-surface); }
.b2-hero-row { border-radius: 24px; overflow: hidden; box-shadow: 0 24px 60px rgba(13,148,136,.12); background: #fff; min-height: clamp(380px, 55vh, 520px); }
.b2-hero-copy { position: relative; display: flex; align-items: center; padding: clamp(32px, 5vw, 56px); }
.b2-hero-accent { position: absolute; left: 0; top: 0; bottom: 0; width: 6px; background: linear-gradient(180deg, var(--b2-teal), var(--b2-soft)); }
.b2-hero-content { position: relative; z-index: 1; }
.b2-label { font-size: 13px; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; color: var(--b2-teal); }
.b2-title { font-size: clamp(2rem, 4.5vw, 3.2rem); font-weight: 800; line-height: 1.15; margin: 8px 0 14px; color: var(--b2-ink); letter-spacing: -.02em; }
.b2-rating { display: flex; align-items: center; gap: 6px; color: #f59e0b; font-size: 14px; margin-bottom: 16px; }
.b2-rating span { color: #64748b; margin-left: 4px; }
.b2-lede { font-size: 1.05rem; line-height: 1.65; color: #475569; max-width: 480px; margin-bottom: 20px; }
.b2-chips { margin: 0 0 24px; padding: 0; list-style: none; }
.b2-chips li { display: flex; align-items: flex-start; gap: 8px; font-size: 14px; color: #64748b; padding: 5px 0; }
.b2-chips i { color: var(--b2-teal); margin-top: 2px; }
.b2-actions { display: flex; flex-wrap: wrap; gap: 10px; }
.b2-btn { display: inline-flex; align-items: center; gap: 8px; padding: 12px 20px; border-radius: 12px; font-size: 14px; font-weight: 600; text-decoration: none; border: 2px solid transparent; cursor: pointer; transition: transform .2s, box-shadow .2s; }
.b2-btn-primary { background: var(--b2-teal); color: #fff; border-color: var(--b2-teal); }
.b2-btn-primary:hover { background: var(--b2-teal-dark); transform: translateY(-2px); box-shadow: 0 10px 24px rgba(13,148,136,.3); color: #fff; }
.b2-btn-secondary { background: #fff; color: var(--b2-ink); border-color: #cbd5e1; }
.b2-btn-secondary:hover { border-color: var(--b2-teal); color: var(--b2-teal); }
.b2-btn-outline { background: transparent; color: var(--b2-teal); border-color: var(--b2-teal); }
.b2-hero-visual { padding: 0; min-height: 280px; }
.b2-hero-img { width: 100%; height: 100%; min-height: 280px; object-fit: cover; display: block; }
.b2-hero-placeholder { height: 100%; min-height: 280px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, var(--b2-surface), #ccfbf1); font-size: 4rem; color: var(--b2-teal); }
.b2-section-nav { padding: 20px 0 0; }
.b2-section-nav-inner { display: flex; gap: 4px; overflow-x: auto; padding-bottom: 4px; scrollbar-width: none; }
.b2-section-nav-inner::-webkit-scrollbar { display: none; }
.b2-nav-link { flex-shrink: 0; padding: 10px 18px; border-radius: 10px; font-size: 14px; font-weight: 600; color: #64748b; text-decoration: none; transition: background .2s, color .2s; }
.b2-nav-link:hover, .b2-nav-link.is-active { background: var(--b2-teal); color: #fff; }
.b2-glance { padding: 28px 0; background: #fff; border-bottom: 1px solid #e2e8f0; }
.b2-glance-card { padding: 18px; border-radius: 14px; background: var(--b2-surface); height: 100%; text-align: center; }
.b2-glance-card i { display: block; font-size: 24px; color: var(--b2-teal); margin-bottom: 8px; }
.b2-glance-card strong { display: block; font-size: 11px; text-transform: uppercase; letter-spacing: .08em; color: #94a3b8; margin-bottom: 4px; }
.b2-glance-card span { font-size: 13px; line-height: 1.4; color: var(--b2-ink); display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
.b2-section { padding: clamp(48px, 7vw, 80px) 0; }
.b2-eyebrow { display: block; font-size: 12px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: var(--b2-teal); margin-bottom: 8px; }
.b2-section-title { font-size: clamp(1.6rem, 3vw, 2.25rem); font-weight: 800; margin: 0 0 28px; letter-spacing: -.02em; }
.b2-about { background: var(--b2-surface); }
.b2-about-center { max-width: 720px; margin: 0 auto; text-align: center; position: relative; }
.b2-about-quote-mark { font-size: 5rem; line-height: 1; color: var(--b2-soft); font-family: Georgia, serif; margin-bottom: -20px; }
.b2-prose { text-align: left; font-size: 1rem; line-height: 1.75; color: #475569; }
.b2-good-for { margin-top: 24px; font-size: 14px; color: #64748b; }
.b2-good-for em { font-style: normal; font-weight: 600; color: var(--b2-teal); }
.b2-tabs, .b2-menu-tabs { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 24px; }
.b2-tab, .b2-menu-tab { padding: 10px 18px; border-radius: 999px; border: 2px solid #e2e8f0; background: #fff; font-size: 14px; font-weight: 600; color: #64748b; cursor: pointer; transition: all .2s; }
.b2-tab.is-active, .b2-menu-tab.is-active { background: var(--b2-teal); border-color: var(--b2-teal); color: #fff; }
.b2-tab-panel, .b2-menu-panel { display: none; }
.b2-tab-panel.is-active, .b2-menu-panel.is-active { display: block; animation: b2fade .35s ease; }
@keyframes b2fade { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: none; } }
.b2-feature-item { display: flex; align-items: center; gap: 12px; padding: 16px 18px; border-radius: 12px; background: var(--b2-surface); font-weight: 500; font-size: 14px; height: 100%; }
.b2-feature-item i { color: var(--b2-teal); font-size: 18px; }
.b2-head-row { display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; gap: 16px; margin-bottom: 24px; }
.b2-head-row .b2-section-title { margin-bottom: 0; }
.b2-bento { display: grid; grid-template-columns: repeat(12, 1fr); grid-auto-rows: 120px; gap: 10px; }
.b2-bento-cell { border: 0; padding: 0; border-radius: 16px; overflow: hidden; cursor: pointer; background: #e2e8f0; }
.b2-bento-cell img { width: 100%; height: 100%; object-fit: cover; transition: transform .4s; display: block; }
.b2-bento-cell:hover img { transform: scale(1.05); }
.b2-bento-a { grid-column: span 6; grid-row: span 2; }
.b2-bento-b { grid-column: span 3; grid-row: span 2; }
.b2-bento-c { grid-column: span 3; grid-row: span 1; }
.b2-bento-d { grid-column: span 3; grid-row: span 1; }
.b2-bento-e { grid-column: span 4; grid-row: span 2; }
.b2-bento-f { grid-column: span 4; grid-row: span 1; }
.b2-menu-highlights { background: var(--b2-surface); }
.b2-menu-card { border-radius: 16px; overflow: hidden; background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,.06); transition: transform .3s; height: 100%; }
.b2-menu-card--click { cursor: pointer; }
.b2-menu-card:hover { transform: translateY(-4px); }
.b2-menu-card-img { aspect-ratio: 4/3; overflow: hidden; }
.b2-menu-card-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.b2-menu-card h3 { margin: 0; padding: 16px 18px; font-size: 1rem; font-weight: 700; }
.b2-dish-card { padding: 18px 20px; border-radius: 14px; border: 1px solid #e2e8f0; background: #fff; height: 100%; transition: border-color .2s, box-shadow .2s; }
.b2-dish-card:hover { border-color: var(--b2-soft); box-shadow: 0 8px 24px rgba(13,148,136,.08); }
.b2-dish-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; margin-bottom: 6px; }
.b2-dish-head h4 { margin: 0; font-size: 15px; font-weight: 700; }
.b2-dish-price { font-weight: 800; color: var(--b2-teal); white-space: nowrap; }
.b2-dish-card p { margin: 0; font-size: 13px; color: #64748b; line-height: 1.5; }
.b2-location { background: var(--b2-surface); }
.b2-contact-block { margin-bottom: 28px; }
.b2-contact-row { display: flex; gap: 14px; margin-bottom: 18px; }
.b2-contact-row i { font-size: 22px; color: var(--b2-teal); margin-top: 2px; }
.b2-contact-row strong { display: block; font-size: 12px; text-transform: uppercase; letter-spacing: .06em; color: #94a3b8; margin-bottom: 4px; }
.b2-contact-row p { margin: 0; font-size: 15px; line-height: 1.5; }
.b2-timeline h3 { font-size: 1rem; margin: 0 0 16px; display: flex; align-items: center; gap: 8px; }
.b2-timeline-row { display: grid; grid-template-columns: 100px 12px 1fr; align-items: center; gap: 12px; padding: 8px 0; font-size: 14px; }
.b2-timeline-dot { width: 10px; height: 10px; border-radius: 50%; background: var(--b2-teal); justify-self: center; }
.b2-timeline-day { font-weight: 600; color: var(--b2-ink); }
.b2-timeline-time { color: #64748b; }
.b2-map-card { border-radius: 20px; overflow: hidden; box-shadow: 0 16px 40px rgba(13,148,136,.12); background: #fff; }
.b2-map-card iframe { width: 100%; min-height: 380px; border: 0; display: block; }
.b2-reviews { background: #fff; }
.b2-review { padding: 24px; border-radius: 16px; background: var(--b2-surface); height: 100%; border: 1px solid #ccfbf1; }
.b2-review-stars { color: #f59e0b; font-size: 14px; margin-bottom: 12px; }
.b2-review p { margin: 0 0 16px; font-size: 15px; line-height: 1.6; color: #475569; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; overflow: hidden; }
.b2-review footer { display: flex; align-items: center; gap: 12px; }
.b2-review-av { width: 40px; height: 40px; border-radius: 50%; background: var(--b2-teal); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; }
.b2-google-score { text-align: center; padding: 40px; border-radius: 20px; background: var(--b2-surface); }
.b2-google-score i { font-size: 2rem; color: var(--b2-teal); display: block; margin-bottom: 8px; }
.b2-google-score strong { font-size: 2.5rem; display: block; }
.b2-related-scroll { display: flex; gap: 16px; overflow-x: auto; padding-bottom: 8px; }
.b2-related-item { flex: 0 0 min(320px, 85vw); display: grid; grid-template-columns: 88px 1fr auto; gap: 14px; align-items: center; padding: 14px; border-radius: 14px; border: 1px solid #e2e8f0; background: #fff; text-decoration: none; color: inherit; transition: border-color .2s, box-shadow .2s; }
.b2-related-item:hover { border-color: var(--b2-teal); box-shadow: 0 8px 24px rgba(13,148,136,.1); color: inherit; }
.b2-related-item img { width: 88px; height: 88px; border-radius: 12px; object-fit: cover; }
.b2-related-item h3 { margin: 0 0 4px; font-size: 15px; font-weight: 700; }
.b2-related-item p { margin: 0; font-size: 12px; color: #94a3b8; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.b2-related-score { font-size: 13px; font-weight: 700; color: #f59e0b; white-space: nowrap; }
.listReview .comment.hide { display: none !important; }
@media (max-width: 991.98px) {
    .b2-hero-row { border-radius: 0; box-shadow: none; }
    .b2-hero { padding-top: 0; }
    .b2-bento { grid-template-columns: repeat(6, 1fr); grid-auto-rows: 100px; }
    .b2-bento-a { grid-column: span 6; grid-row: span 2; }
    .b2-bento-b, .b2-bento-c, .b2-bento-d, .b2-bento-e, .b2-bento-f { grid-column: span 3; grid-row: span 1; }
    .b2-actions { position: fixed; left: 0; right: 0; bottom: 0; z-index: 90; margin: 0; padding: 10px 12px calc(10px + env(safe-area-inset-bottom)); background: rgba(255,255,255,.96); border-top: 1px solid #e2e8f0; backdrop-filter: blur(8px); }
    .b2-actions .b2-btn { flex: 1; justify-content: center; font-size: 12px; padding: 11px 8px; }
    main#main { padding-bottom: calc(80px + env(safe-area-inset-bottom)); }
}
@media (max-width: 575.98px) {
    .b2-bento { grid-template-columns: 1fr 1fr; grid-auto-rows: 120px; }
    .b2-bento-a, .b2-bento-b, .b2-bento-c, .b2-bento-d, .b2-bento-e, .b2-bento-f { grid-column: span 1; grid-row: span 1; }
    .b2-bento-a { grid-column: span 2; grid-row: span 2; }
}
</style>
@include('front_end.brand._scripts')
@endpush
