@php
    $medias = $post->media->all();
    $photos = collect($medias)->where('type', 'photo')->values();
    $menus = collect($medias)->where('type', 'menu')->values();
    $photoPreview = $photos->take(6);
    $menuPreview = $menus->take(6);
    $aboutGroups = collect($abouts ?? [])->where('parent_id', 0);
    $rating = $post->google_review ?? 5;
    $timeSchedule = exportTimeOpen($post->time_open ?? '');
    $todayName = \Carbon\Carbon::now()->format('l');
    $todayHours = '';
    foreach ($timeSchedule as $row) {
        if (stripos($row['day'], substr($todayName, 0, 3)) !== false) {
            $todayHours = $row['hours'];
            break;
        }
    }
    if (!$todayHours && !empty($timeSchedule[0]['hours'])) {
        $todayHours = $timeSchedule[0]['hours'];
    }
@endphp

@extends('front_end._index')

@section('body_class', 'vn-page vn-brand')

@section('content')
    <section class="vn-brand-hero">
        <div class="vn-brand-hero__bg" style="background-image:url('{{ getImageThumb($post->thumbnail) }}')"></div>
        <div class="vn-container vn-brand-hero__content">
            <h1>{{ $post->title }}</h1>
            <div class="vn-brand-hero__chips">
                @if ($rating)
                    <span class="vn-chip">★ {{ $rating }}</span>
                @endif
                @if ($post->address)
                    <a class="vn-chip" href="#location">{{ $post->address }}</a>
                @endif
                @if ($post->phone)
                    <a class="vn-chip" href="tel:{{ preg_replace('/\s+/', '', $post->phone) }}">{{ $post->phone }}</a>
                @endif
            </div>

            <nav class="vn-nav" data-vn-section-nav aria-label="Page sections">
                @if (!empty($post->content))
                    <a class="vn-nav__pill is-active" href="#overview">Overview</a>
                @endif
                @if ($aboutGroups->count())
                    <a class="vn-nav__pill" href="#about">About</a>
                @endif
                @if ($photos->count())
                    <a class="vn-nav__pill" href="#photos">Photos</a>
                @endif
                @if ($menus->count() || !empty($products))
                    <a class="vn-nav__pill" href="#menu">Menu</a>
                @endif
                @if (!empty($comments) && collect($comments)->count())
                    <a class="vn-nav__pill" href="#reviews">Reviews</a>
                @endif
                <a class="vn-nav__pill" href="#location">Location</a>
            </nav>
        </div>
    </section>

    <div class="vn-brand-body">
        <div class="vn-container">
            @if (!empty($post->content))
                <section class="vn-panel" id="overview">
                    <h2 class="vn-panel__title">Overview</h2>
                    <div class="vn-prose">{!! $post->content !!}</div>
                </section>
            @endif

            @if ($aboutGroups->count())
                <section class="vn-panel" id="about">
                    <h2 class="vn-panel__title">Amenities &amp; details</h2>
                    <div class="vn-expandable" id="aboutExpand">
                        @foreach ($aboutGroups as $group)
                            @if (!empty($group->title))
                                <div class="vn-about-group">
                                    <h3>{{ $group->title }}</h3>
                                    <ul class="vn-check-grid">
                                        @foreach (collect($abouts)->where('parent_id', $group->id) as $child)
                                            <li>{!! $child->title !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button type="button" class="vn-btn vn-btn--outline" style="margin-top:1rem" data-vn-expand="#aboutExpand"
                        data-vn-label-more="Show more" data-vn-label-less="Show less">Show
                        more</button>
                </section>
            @endif

            @if ($photos->count())
                <section class="vn-panel" id="photos">
                    <h2 class="vn-panel__title">Photos</h2>
                    <ul class="vn-gallery">
                        @foreach ($photoPreview as $k => $item)
                            <li>
                                <a href="{{ getImageThumb($item->thumbnail) }}" data-vn-lightbox="photos"
                                    data-caption="Photo {{ $k + 1 }} – {{ $post->title }}">
                                    <img src="{{ getImageThumb($item->thumbnail) }}" alt="Photo {{ $post->title }} – {{ $k + 1 }}"
                                        loading="lazy">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @if ($photos->count() > 6)
                        <ul class="vn-gallery visually-hidden" aria-hidden="true">
                            @foreach ($photos->slice(6) as $k => $item)
                                <li>
                                    <a href="{{ getImageThumb($item->thumbnail) }}" data-vn-lightbox="photos"
                                        data-caption="Photo {{ $k + 7 }} – {{ $post->title }}"></a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </section>
            @endif

            @if ($menus->count() || !empty($products))
                <section class="vn-panel" id="menu">
                    <h2 class="vn-panel__title">Menu</h2>

                    @if ($menus->count())
                        <ul class="vn-gallery" style="margin-bottom:1.5rem">
                            @foreach ($menuPreview as $k => $item)
                                <li>
                                    <a href="{{ getImageThumb($item->thumbnail) }}" data-vn-lightbox="menu"
                                        data-caption="Menu {{ $k + 1 }} – {{ $post->title }}">
                                        <img src="{{ getImageThumb($item->thumbnail) }}" alt="Menu {{ $post->title }} – {{ $k + 1 }}"
                                            loading="lazy">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        @if ($menus->count() > 6)
                            <ul class="vn-gallery visually-hidden" aria-hidden="true">
                                @foreach ($menus->slice(6) as $k => $item)
                                    <li>
                                        <a href="{{ getImageThumb($item->thumbnail) }}" data-vn-lightbox="menu"
                                            data-caption="Menu {{ $k + 7 }} – {{ $post->title }}"></a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif

                    @if (!empty($products) && collect($products)->count())
                        @foreach (collect($products)->where('parent_id', 0) as $product)
                            @if (!empty($product->title))
                                <div class="vn-menu-cat">
                                    <h3>{{ $product->title }}</h3>
                                    @foreach (collect($products)->where('parent_id', $product->id) as $child)
                                        <div class="vn-menu-item">
                                            <span>{!! trim($child->title) !!}</span>
                                            @if (!empty($child->price))
                                                <span class="vn-menu-item__price">{!! trim($child->price) !!}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    @endif
                </section>
            @endif

            @if (!empty($comments) && collect($comments)->count())
                <section class="vn-panel" id="reviews">
                    <h2 class="vn-panel__title">Reviews</h2>
                    <div data-vn-review-list>
                        @foreach (collect($comments)->values() as $k => $item)
                            <article class="vn-review {{ $k < 5 ? 'show' : 'hide' }}">
                                <div class="vn-review__name">{{ $item->fullname }}</div>
                                <div class="vn-review__date">{{ format_date($item->created_at, 'd-m-Y') }}</div>
                                <div>{!! $item->content ?? '' !!}</div>
                            </article>
                        @endforeach
                    </div>
                    @if (collect($comments)->count() > 5)
                        <button type="button" class="vn-btn vn-btn--outline" style="margin-top:1rem"
                            data-vn-load-more="[data-vn-review-list]" data-vn-step="5">Load more reviews</button>
                    @endif
                </section>
            @endif

            <div class="vn-split" id="location">
                <section class="vn-panel" id="hours">
                    <h2 class="vn-panel__title">Opening hours</h2>
                    @if (!empty($post->time_open))
                        <p class="vn-hours-status" data-hours-range="{{ $todayHours }}">Checking…</p>
                        <div class="vn-hours" id="time_open">{!! $post->time_open !!}</div>
                    @else
                        <p class="vn-lead">Hours not available.</p>
                    @endif
                </section>

                <section class="vn-panel">
                    <h2 class="vn-panel__title">Location</h2>
                    @if ($post->address)
                        <p class="vn-lead" style="margin-bottom:1rem">{{ $post->address }}</p>
                    @endif
                    <div class="vn-map">
                        {!! getIframeSrcFromString($post->iframe_map) !!}
                    </div>
                </section>
            </div>
        </div>
    </div>

    @if (!empty($relates))
        <section class="vn-related">
            <div class="vn-container">
                <h2 class="vn-title">More restaurants</h2>
                <div class="vn-carousel">
                    @foreach ($relates as $item)
                        <article class="vn-card">
                            <a href="{{ route('post', $item->slug) }}" class="vn-card__link" title="{{ $item->title }}">
                                <div class="vn-card__img">
                                    <img src="{{ getImageThumb($item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy">
                                </div>
                                <div class="vn-card__body">
                                    <h3 class="vn-card__name">{{ $item->title }}</h3>
                                    @if (!empty($item->address))
                                        <p class="vn-card__meta">{{ $item->address }}</p>
                                    @endif
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('scripts')
    <style>
        /* ==========================
                   FIX MOBILE HEADER ON TOP
                   ========================== */

        @media screen and (max-width: 768px) {

            .mobile-nav-toggler.navbar-trigger {
                color: #000 !important;
            }
            .vn-nav{
                display: flex;
                justify-content: space-between;
            }

            .vn-nav.is-stuck {
                width: 100% !important;
                max-width: 100% !important;
                border-radius: 10px;
            }

            .vn-nav__pill {
                padding: 3px;
            }

            :root {
                --mobile-header-height: 55px;
            }

            body.vn-page {
                padding-top: var(--mobile-header-height) !important;
            }

            .vn-page header.main-header {
                position: fixed !important;

                top: 0 !important;
                left: 0 !important;
                right: 0 !important;

                width: 100% !important;
                height: var(--mobile-header-height);

                margin: 0 !important;

                z-index: 99999 !important;

                background: #fff;
            }

            .vn-page header.main-header .main-box {
                width: 100%;
                max-width: 100%;
                height: 100%;
            }

            .vn-page header.main-header .mobile-header {
                width: 100%;
                height: 100%;

                display: flex;
                align-items: center;
            }

            .vn-page .page-wrapper {
                width: 100%;
                overflow-x: hidden;
            }

            .vn-page #nav-mobile {
                z-index: 100000;
            }

            .vn-page #nav-mobile .vn-mobile-panel {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                height: 500px;
                max-height: calc(100dvh - var(--mobile-header-height));
                overflow-y: auto;

                z-index: 99998;
            }
        }
    </style>
@endpush
