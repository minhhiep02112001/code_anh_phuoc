@php
    $medias = $medias ?? collect();
    $photos = collect($medias['photo'] ?? $medias->get('photo', []));
    $menus = collect($medias['menu'] ?? $medias->get('menu', []));
    $products = collect($products ?? []);
    $relates = collect($relates ?? []);
    $comments = collect($comments ?? []);
    $reviews = $comments->where('parent_id', 0)->values();
    $abouts = collect($abouts ?? []);

    $photoGallery = $photos->filter(fn($i) => !empty($i->thumbnail))->sortBy('position')->values();
    $menuGallery = $menus->filter(fn($i) => !empty($i->thumbnail))->sortBy('position')->values();

    $galleryItems = collect();
    if (!empty($post->thumbnail)) {
        $galleryItems->push(['src' => convertPathImage($post->thumbnail), 'alt' => $post->title]);
    }
    foreach ($photoGallery as $i => $photo) {
        if ($galleryItems->count() >= 5) {
            break;
        }
        $src = convertPathImage($photo->thumbnail);
        if ($galleryItems->pluck('src')->contains($src)) {
            continue;
        }
        $galleryItems->push([
            'src' => $src,
            'alt' => $post->title . ' photo ' . ($i + 1),
        ]);
    }
    foreach ($menuGallery as $i => $menu) {
        if ($galleryItems->count() >= 5) {
            break;
        }
        $src = convertPathImage($menu->thumbnail);
        if ($galleryItems->pluck('src')->contains($src)) {
            continue;
        }
        $galleryItems->push([
            'src' => $src,
            'alt' => $post->title . ' menu ' . ($i + 1),
        ]);
    }

    $allGalleryForLightbox = $galleryItems->merge(
        $photoGallery->map(fn($p, $i) => [
            'src' => convertPathImage($p->thumbnail),
            'alt' => $post->title . ' photo ' . ($i + 1),
        ]),
    )->merge(
        $menuGallery->map(fn($m, $i) => [
            'src' => convertPathImage($m->thumbnail),
            'alt' => $post->title . ' menu ' . ($i + 1),
        ]),
    )->unique('src')->values();

    $menuCategories = $products->where('parent_id', 0)->sortBy('id')->values();
    $menuItemsByParent = $products->where('parent_id', '>', 0)->groupBy('parent_id');
    $menuSections = $menuCategories->filter(fn($cat) => ($menuItemsByParent->get($cat->id) ?? collect())->isNotEmpty())->values();

    $aboutParents = $abouts->where('parent_id', 0)->values();
    $aboutChildrenByParent = $abouts->where('parent_id', '>', 0)->groupBy('parent_id');
    $amenities = $aboutParents->flatMap(function ($parent) use ($aboutChildrenByParent) {
        return ($aboutChildrenByParent->get($parent->id) ?? collect())->pluck('title');
    })->filter()->values();

    $timeSchedule = exportTimeOpen($post->time_open ?? '');
    $todayName = \Carbon\Carbon::now()->format('l');
    $todayHours = '';
    foreach ($timeSchedule as $row) {
        if (stripos($row['day'] ?? '', substr($todayName, 0, 3)) !== false) {
            $todayHours = $row['hours'] ?? '';
            break;
        }
    }
    if (!$todayHours && !empty($timeSchedule[0]['hours'])) {
        $todayHours = $timeSchedule[0]['hours'];
    }

    $rating = $post->google_review ?? $post->review_google ?? '4.7';
    $reviewCount = $reviews->count() ?: ($post->viewed ?? 0);
    $orderUrl = !empty($post->redirect_order) ? $post->redirect_order : '#';
    $reserveUrl = !empty($post->redirect_reserve_table) ? $post->redirect_reserve_table : '#';
    $directionsUrl = $post->link_map ?: '#';
    $phoneDigits = preg_replace('/\D+/', '', $post->phone ?? '');
    $whatsappUrl = $phoneDigits ? 'https://wa.me/' . $phoneDigits : '#';
    $menuHighlights = $menuGallery->take(4);
@endphp

@extends('front_end._index')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/brand.css') }}?v={{ time() }}">
@endpush

@section('content')
    <div class="md-brand-page">
        <div class="md-container">
            <a href="{{ url('/') }}" class="md-back" title="Back to home">
                <i class="bi bi-arrow-left" aria-hidden="true"></i> Back to home
            </a>

            @if ($galleryItems->count())
                <div class="md-gallery" aria-label="Restaurant photos">
                    @php $hero = $galleryItems->first(); @endphp
                    <div class="md-gallery__main">
                        <button type="button" data-md-lightbox="0" aria-label="Open gallery">
                            <img src="{{ $hero['src'] }}" alt="{{ $hero['alt'] }}" loading="eager">
                        </button>
                    </div>
                    <div class="md-gallery__grid">
                        @foreach ($galleryItems->slice(1, 4) as $i => $thumb)
                            <div class="md-gallery__thumb{{ $loop->last && ($photoGallery->count() + $menuGallery->count()) > 4 ? ' md-gallery__more' : '' }}">
                                <button type="button" data-md-lightbox="{{ $i + 1 }}"
                                    aria-label="Open photo {{ $i + 2 }}">
                                    <img src="{{ $thumb['src'] }}" alt="{{ $thumb['alt'] }}" loading="lazy">
                                </button>
                                @if ($loop->last && $allGalleryForLightbox->count() > 5)
                                    <span>+{{ $allGalleryForLightbox->count() - 5 }} photos</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="md-layout">
                <div class="md-main">
                    <header class="md-brand-head">
                        <div class="md-brand-head__top">
                            <h1>{{ $post->title }}</h1>
                            <div class="md-brand-head__actions">
                                <button type="button" class="md-icon-btn" aria-label="Share"
                                    onclick="if(navigator.share)navigator.share({title:document.title,url:location.href})">
                                    <i class="bi bi-share" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="md-icon-btn" aria-label="Save">
                                    <i class="bi bi-heart" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="md-meta">
                            <span class="md-rating">
                                <i class="bi bi-star-fill" aria-hidden="true"></i> {{ $rating }}
                            </span>
                            @if ($reviewCount)
                                <span>({{ $reviewCount }} reviews)</span>
                            @endif
                            <span class="md-meta__dot">·</span>
                            <span>Restaurant</span>
                            @if (!empty($todayHours))
                                <span class="md-badge md-badge--closed md-hours-badge"
                                    data-hours-range="{{ $todayHours }}">Checking hours…</span>
                            @endif
                        </div>
                        @if (!empty($post->description))
                            <p class="md-lede">{{ $post->description }}</p>
                        @endif
                    </header>

                    @if (!empty($post->content))
                        <section class="md-section" id="about">
                            <h2 class="md-section__title">About</h2>
                            <div class="md-prose">{!! $post->content !!}</div>
                        </section>
                    @endif

                    @if ($amenities->count())
                        <section class="md-section" id="service">
                            <h2 class="md-section__title">What this place offers</h2>
                            <ul class="md-amenities">
                                @foreach ($amenities as $item)
                                    <li>
                                        <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                                        <span>{!! strip_tags($item) !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    @endif

                    @if ($menuGallery->count() || $menuSections->count())
                        <section class="md-section" id="menu">
                            <div class="md-menu-head">
                                <h2><i class="bi bi-journal-richtext" aria-hidden="true"></i> Full Menu</h2>
                            </div>

                            @if ($menuHighlights->count())
                                <div class="md-menu-scroll" aria-label="Menu highlights">
                                    @foreach ($menuHighlights as $i => $item)
                                        <button type="button" data-md-menu-lightbox="{{ $i }}"
                                            aria-label="Menu page {{ $i + 1 }}">
                                            <img src="{{ convertPathImage($item->thumbnail) }}"
                                                alt="Menu {{ $i + 1 }}" loading="lazy">
                                        </button>
                                    @endforeach
                                </div>
                            @endif

                            @if ($menuSections->count())
                                <nav class="md-cat-pills" aria-label="Menu categories">
                                    @foreach ($menuSections as $i => $category)
                                        @php $sectionId = 'sec-' . \Illuminate\Support\Str::slug($category->title); @endphp
                                        <a href="#{{ $sectionId }}"
                                            class="md-cat-pill{{ $i === 0 ? ' is-active' : '' }}"
                                            data-md-cat="{{ $sectionId }}">{{ $category->title }}</a>
                                    @endforeach
                                </nav>

                                @foreach ($menuSections as $i => $category)
                                    @php
                                        $sectionId = 'sec-' . \Illuminate\Support\Str::slug($category->title);
                                        $items = ($menuItemsByParent->get($category->id) ?? collect())->sortBy('id')->values();
                                    @endphp
                                    <article class="md-menu-block" id="{{ $sectionId }}">
                                        <h3>{{ $category->title }}</h3>
                                        @foreach ($items as $j => $item)
                                            <div class="md-menu-row">
                                                <div>
                                                    <p class="md-menu-row__name">
                                                        {{ $item->title }}
                                                        @if ($j === 0)
                                                            <span class="md-tag-popular">Popular</span>
                                                        @endif
                                                    </p>
                                                    @if (!empty($item->description))
                                                        <p class="md-menu-row__desc">
                                                            {{ strip_tags($item->description) }}</p>
                                                    @endif
                                                </div>
                                                @if (!empty($item->price))
                                                    <div class="md-menu-row__price">{{ $item->price }}</div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </article>
                                @endforeach
                            @elseif ($menuGallery->count())
                                <div class="md-menu-scroll">
                                    @foreach ($menuGallery as $i => $item)
                                        <button type="button" data-md-menu-lightbox="{{ $i }}">
                                            <img src="{{ convertPathImage($item->thumbnail) }}"
                                                alt="Menu {{ $i + 1 }}" loading="lazy">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </section>
                    @endif

                    @if ($photoGallery->count() && $galleryItems->count() <= 1)
                        <section class="md-section" id="photos">
                            <h2 class="md-section__title">Photos</h2>
                            <div class="md-menu-scroll">
                                @foreach ($photoGallery as $i => $photo)
                                    @php
                                        $lbIndex = $allGalleryForLightbox->values()->search(function ($g) use ($photo) {
                                            return ($g['src'] ?? '') === convertPathImage($photo->thumbnail);
                                        });
                                        if ($lbIndex === false) {
                                            $lbIndex = $i;
                                        }
                                    @endphp
                                    <button type="button" data-md-lightbox="{{ $lbIndex }}">
                                        <img src="{{ convertPathImage($photo->thumbnail) }}"
                                            alt="Photo {{ $i + 1 }}" loading="lazy">
                                    </button>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @if ($reviews->count())
                        <section class="md-section" id="reviews">
                            <h2 class="md-section__title">Customer Reviews</h2>
                            <div class="md-reviews-summary">
                                <div>
                                    <div class="md-reviews-score">{{ $rating }}</div>
                                    <div class="md-reviews-stars">
                                        @for ($s = 0; $s < 5; $s++)
                                            <i class="bi bi-star-fill" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    <div class="md-review__date">{{ $reviewCount }} reviews</div>
                                </div>
                            </div>
                            <div class="md-review-list" data-md-review-list>
                                @foreach ($reviews as $i => $review)
                                    @php
                                        $reviewName = trim($review->fullname ?? '') ?: 'Guest';
                                        $initial = mb_strtoupper(mb_substr($reviewName, 0, 1));
                                    @endphp
                                    <article class="md-review{{ $i >= 5 ? ' hide' : '' }}">
                                        <div class="md-review__head">
                                            <span class="md-review__avatar" aria-hidden="true">{{ $initial }}</span>
                                            <div>
                                                <div class="md-review__name">{{ $reviewName }}</div>
                                                <div class="md-review__date">
                                                    {{ !empty($review->created_at) ? timeAgo($review->created_at) : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md-review__stars">
                                            @for ($s = 0; $s < 5; $s++)
                                                <i class="bi bi-star-fill" aria-hidden="true"></i>
                                            @endfor
                                        </div>
                                        <p class="md-review__text">{{ $review->content }}</p>
                                    </article>
                                @endforeach
                            </div>
                            @if ($reviews->count() > 5)
                                <button type="button" class="md-btn md-btn--outline loadmoreReview"
                                    style="margin-top:1rem">Load more reviews</button>
                            @endif
                        </section>
                    @endif
                </div>

                <aside class="md-sidebar">
                    <div class="md-card">
                        @if (!empty($timeSchedule))
                            <h3 class="md-sidebar__title">Opening Hours</h3>
                            <ul class="md-hours-list">
                                @foreach ($timeSchedule as $row)
                                    <li>
                                        <span>{{ $row['day'] ?? '' }}</span>
                                        <span>{{ $row['hours'] ?? '' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if (!empty($post->address))
                            <h3 class="md-sidebar__title">Address</h3>
                            <div class="md-contact-row">
                                <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                                <span>{{ $post->address }}</span>
                            </div>
                        @endif

                        @if (!empty($post->phone))
                            <div class="md-contact-row">
                                <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                                <a href="tel:{{ preg_replace('/\s+/', '', $post->phone) }}">{{ $post->phone }}</a>
                            </div>
                        @endif

                        <div class="md-btn-stack md-btn-stack--mobile-fixed">
                            @if ($reserveUrl !== '#')
                                <a href="{{ $reserveUrl }}" class="md-btn md-btn--primary" target="_blank"
                                    rel="noopener">
                                    <i class="bi bi-calendar2-check" aria-hidden="true"></i> Book Online
                                </a>
                            @endif
                            @if ($whatsappUrl !== '#')
                                <a href="{{ $whatsappUrl }}" class="md-btn md-btn--outline" target="_blank"
                                    rel="noopener">
                                    <i class="bi bi-whatsapp" aria-hidden="true"></i> WhatsApp
                                </a>
                            @endif
                            @if ($orderUrl !== '#')
                                <a href="{{ $orderUrl }}" class="md-btn md-btn--outline" target="_blank"
                                    rel="noopener">
                                    <i class="bi bi-bag-check" aria-hidden="true"></i> Order Delivery
                                </a>
                            @endif
                        </div>

                        @if (!empty($post->iframe_map))
                            <div class="md-map">{!! $post->iframe_map !!}</div>
                        @endif

                        @if ($directionsUrl !== '#')
                            <a href="{{ $directionsUrl }}" class="md-btn md-btn--outline" target="_blank"
                                rel="noopener" style="margin-top:1rem;width:100%">
                                <i class="bi bi-signpost-2" aria-hidden="true"></i> Get Directions
                            </a>
                        @endif
                    </div>
                </aside>
            </div>

            @if ($relates->count())
                <section class="md-related" id="similar">
                    <h2>More near you</h2>
                    <div class="md-related-grid">
                        @foreach ($relates->take(3) as $relate)
                            @php
                                $relateUrl = !empty($relate->website)
                                    ? rtrim($relate->website, '/')
                                    : route('post', ['slug' => $relate->slug]);
                            @endphp
                            <article class="md-related-card">
                                <a href="{{ $relateUrl }}" title="{{ $relate->title }}">
                                    <div class="md-related-card__img">
                                        <img src="{{ getImageThumb($relate->thumbnail) }}"
                                            alt="{{ $relate->title }}" loading="lazy">
                                    </div>
                                    <div class="md-related-card__body">
                                        <h3 class="md-related-card__name">{{ $relate->title }}</h3>
                                        @if (!empty($relate->address))
                                            <p class="md-related-card__meta">{{ $relate->address }}</p>
                                        @endif
                                        @if (!empty($relate->google_review ?? $relate->review_google))
                                            <p class="md-related-card__meta">
                                                <i class="bi bi-star-fill" style="color:#f59e0b"></i>
                                                {{ $relate->google_review ?? $relate->review_google }}
                                            </p>
                                        @endif
                                        <span class="md-related-card__link">Explore menu</span>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>

    @if ($allGalleryForLightbox->count())
        <script type="application/json" id="mdGalleryData">
            {!! json_encode($allGalleryForLightbox->values(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
        </script>
    @endif
    @if ($menuGallery->count())
        <script type="application/json" id="mdMenuGalleryData">
            {!! json_encode(
                $menuGallery->map(fn($image, $i) => [
                    'src' => convertPathImage($image->thumbnail),
                    'alt' => $post->title . ' Menu ' . ($i + 1),
                ])->values(),
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
            ) !!}
        </script>
    @endif

    <div class="md-lightbox" id="mdLightbox" aria-hidden="true" role="dialog" aria-modal="true">
        <button type="button" class="md-lightbox__close" aria-label="Close"><i class="bi bi-x-lg"></i></button>
        <button type="button" class="md-lightbox__prev" aria-label="Previous"><i class="bi bi-arrow-left"></i></button>
        <img src="" alt="">
        <button type="button" class="md-lightbox__next" aria-label="Next"><i class="bi bi-arrow-right"></i></button>
        <span class="md-lightbox__counter"></span>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateHoursBadge(el) {
                var raw = (el.getAttribute('data-hours-range') || '').trim();
                var lower = raw.toLowerCase();
                if (!raw || lower === 'closed') {
                    el.textContent = 'Closed';
                    el.className = 'md-badge md-badge--closed';
                    return;
                }
                if (lower.indexOf('24') !== -1) {
                    el.textContent = 'Open now';
                    el.className = 'md-badge md-badge--open';
                    return;
                }
                var parts = raw.split(' - ');
                if (parts.length < 2) {
                    el.textContent = 'Closed';
                    return;
                }
                var now = new Date();
                var start = new Date(now.toDateString() + ' ' + parts[0].trim());
                var end = new Date(now.toDateString() + ' ' + parts[1].trim());
                if (end < start) end.setDate(end.getDate() + 1);
                if (now >= start && now <= end) {
                    el.textContent = 'Open now';
                    el.className = 'md-badge md-badge--open';
                } else {
                    el.textContent = 'Closed · Opens ' + parts[0].trim();
                    el.className = 'md-badge md-badge--closed';
                }
            }
            document.querySelectorAll('.md-hours-badge').forEach(updateHoursBadge);

            function initLightbox(dataId, openSelector, attr) {
                var dataEl = document.getElementById(dataId);
                var box = document.getElementById('mdLightbox');
                if (!dataEl || !box) return;
                var album = [];
                try { album = JSON.parse(dataEl.textContent || '[]'); } catch (e) { return; }
                if (!album.length) return;

                var img = box.querySelector('img');
                var counter = box.querySelector('.md-lightbox__counter');
                var current = 0;

                function show(i) {
                    current = (i + album.length) % album.length;
                    img.src = album[current].src;
                    img.alt = album[current].alt || '';
                    if (counter) counter.textContent = (current + 1) + ' / ' + album.length;
                }
                function open(i) { show(i); box.classList.add('is-open'); box.setAttribute('aria-hidden', 'false'); document.body.classList.add('md-lightbox-open'); }
                function close() { box.classList.remove('is-open'); box.setAttribute('aria-hidden', 'true'); document.body.classList.remove('md-lightbox-open'); img.src = ''; }

                document.querySelectorAll(openSelector).forEach(function(el) {
                    el.addEventListener('click', function() {
                        open(parseInt(el.getAttribute(attr), 10) || 0);
                    });
                });

                box.querySelector('.md-lightbox__close').addEventListener('click', close);
                box.querySelector('.md-lightbox__prev').addEventListener('click', function() { show(current - 1); });
                box.querySelector('.md-lightbox__next').addEventListener('click', function() { show(current + 1); });
                box.addEventListener('click', function(e) { if (e.target === box) close(); });
                document.addEventListener('keydown', function(e) {
                    if (!box.classList.contains('is-open')) return;
                    if (e.key === 'Escape') close();
                    if (e.key === 'ArrowLeft') show(current - 1);
                    if (e.key === 'ArrowRight') show(current + 1);
                });
            }

            initLightbox('mdGalleryData', '[data-md-lightbox]', 'data-md-lightbox');
            if (document.getElementById('mdMenuGalleryData')) {
                var menuBox = document.getElementById('mdLightbox');
                var menuData = JSON.parse(document.getElementById('mdMenuGalleryData').textContent || '[]');
                document.querySelectorAll('[data-md-menu-lightbox]').forEach(function(el) {
                    el.addEventListener('click', function() {
                        var i = parseInt(el.getAttribute('data-md-menu-lightbox'), 10) || 0;
                        if (!menuBox || !menuData[i]) return;
                        menuBox.querySelector('img').src = menuData[i].src;
                        menuBox.querySelector('img').alt = menuData[i].alt || '';
                        var counter = menuBox.querySelector('.md-lightbox__counter');
                        if (counter) counter.textContent = (i + 1) + ' / ' + menuData.length;
                        menuBox.classList.add('is-open');
                        document.body.classList.add('md-lightbox-open');
                    });
                });
            }

            document.querySelectorAll('.md-cat-pill[data-md-cat]').forEach(function(pill) {
                pill.addEventListener('click', function(e) {
                    e.preventDefault();
                    var id = pill.getAttribute('data-md-cat');
                    var target = document.getElementById(id);
                    document.querySelectorAll('.md-cat-pill').forEach(function(p) { p.classList.remove('is-active'); });
                    pill.classList.add('is-active');
                    if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });

            var loadBtn = document.querySelector('.loadmoreReview');
            if (loadBtn) {
                loadBtn.addEventListener('click', function() {
                    document.querySelectorAll('.md-review.hide').forEach(function(r) {
                        r.classList.remove('hide');
                    });
                    loadBtn.style.display = 'none';
                });
            }
        });
    </script>
@endpush
