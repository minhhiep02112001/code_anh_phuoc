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
        $src = convertPathImage($photo->thumbnail);
        if ($galleryItems->pluck('src')->contains($src)) {
            continue;
        }
        $galleryItems->push([
            'src' => $src,
            'alt' => $post->title . ' photo ' . ($i + 1),
        ]);
    }
    if ($galleryItems->count() <= 1) {
        foreach ($menuGallery as $i => $menu) {
            $src = convertPathImage($menu->thumbnail);
            if ($galleryItems->pluck('src')->contains($src)) {
                continue;
            }
            $galleryItems->push([
                'src' => $src,
                'alt' => $post->title . ' menu ' . ($i + 1),
            ]);
        }
    }

    $allGalleryForLightbox = $galleryItems->values();

    $menuCategories = $products->where('parent_id', 0)->sortBy('id')->values();
    $menuItemsByParent = $products->where('parent_id', '>', 0)->groupBy('parent_id');
    $menuSections = $menuCategories
        ->filter(fn($cat) => ($menuItemsByParent->get($cat->id) ?? collect())->isNotEmpty())
        ->values();

    $aboutParents = $abouts->where('parent_id', 0)->values();
    $aboutChildrenByParent = $abouts->where('parent_id', '>', 0)->groupBy('parent_id');
    $amenities = $aboutParents
        ->flatMap(function ($parent) use ($aboutChildrenByParent) {
            return ($aboutChildrenByParent->get($parent->id) ?? collect())->pluck('title');
        })
        ->filter()
        ->values();

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
    $dietaryOptions = array_values(
        array_unique(array_merge($parseList($header['known_for'] ?? []), $parseList($header['good_for'] ?? []))),
    );

    $rating = 5;
    $reviewCount = $post->review_google ?? 0;
    $orderUrl = !empty($post->redirect_order) ? $post->redirect_order : '#';
    $reserveUrl = !empty($post->redirect_reserve_table) ? $post->redirect_reserve_table : '#';
    $directionsUrl = $post->link_map ?: '#';
    $phoneDigits = preg_replace('/\D+/', '', $post->phone ?? '');
    $whatsappUrl = $phoneDigits ? 'https://wa.me/' . $phoneDigits : '#';
    $menuHighlights = $menuGallery->isNotEmpty() ? $menuGallery : $photoGallery;
    $menuCarousel = $menuHighlights->take(10)->values();

    $heroImage = $galleryItems->first() ?: [
        'src' => convertPathImage($post->thumbnail ?? ''),
        'alt' => $post->title,
    ];
    $thumbImages = $galleryItems->slice(1, 4)->values();
    $extraPhotoCount = max(0, $galleryItems->count() - 1 - $thumbImages->count());

    $allMenuItems = collect();
    foreach ($menuSections as $category) {
        $categoryTitle = trim((string) ($category->title ?? ''));
        if ($categoryTitle === '') {
            continue;
        }
        foreach (($menuItemsByParent->get($category->id) ?? collect())->sortBy('id') as $menuItem) {
            if (trim((string) ($menuItem->title ?? '')) === '') {
                continue;
            }
            $allMenuItems->push([
                'item' => $menuItem,
                'category' => $categoryTitle,
            ]);
        }
    }

    $menuSections = $menuSections
        ->filter(function ($cat) use ($allMenuItems) {
            $title = trim((string) ($cat->title ?? ''));
            return $title !== '' && $allMenuItems->contains(fn($row) => $row['category'] === $title);
        })
        ->values();

    $menuCarouselItems = $menuCarousel
        ->filter(fn($img) => !empty($img->thumbnail))
        ->map(function ($img, $i) use ($allMenuItems) {
            $title = data_get($allMenuItems->get($i), 'item.title', 'Menu ' . ($i + 1));
            return [
                'src' => convertPathImage($img->thumbnail ?? ''),
                'title' => $title,
                'alt' => $title,
            ];
        })
        ->values();

    $showMenuSection = $allMenuItems->isNotEmpty() || $menuCarouselItems->isNotEmpty();

    $websiteUrl = !empty($post->website) ? $post->website : '#';
    $visibleReviewLimit = 5;
    $hiddenReviewCount = max(0, $reviews->count() - $visibleReviewLimit);
    $amenityList = $amenities->isNotEmpty() ? $amenities : $aboutParents->pluck('title')->filter()->values();
@endphp

<html lang="en">

<head>
    <style>
        body {
            transition: opacity ease-in 0.2s;
        }

        body[unresolved] {
            opacity: 0;
            display: block;
            overflow: hidden;
            position: relative;
        }
    </style>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="/vite.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('front_end.block.config_seo_header')
    <link rel="stylesheet" crossorigin="" href="/assets/css/brand.css?v=1">
</head>

<body>
    <div id="root">
        <div class="min-h-screen bg-[#FAF9FC] flex flex-col">
            <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-purple-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16"><a class="flex items-center gap-2.5"
                            href="/" data-discover="true">
                            <div
                                class="w-9 h-9 rounded-xl bg-gradient-to-br from-purple-800 to-indigo-900 flex items-center justify-center shadow-lg shadow-purple-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-utensils-crossed w-5 h-5 text-white">
                                    <path d="m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8"></path>
                                    <path d="M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7">
                                    </path>
                                    <path d="m2.1 21.8 6.4-6.3"></path>
                                    <path d="m19 5-7 7"></path>
                                </svg>
                            </div><span
                                class="text-xl font-bold tracking-tight text-slate-900">{{ $post->title }}</span>
                        </a>
                        <div class="hidden md:flex items-center gap-1"><a
                                class="px-4 py-2 text-sm text-gray-600 hover:text-purple-800 font-medium rounded-lg hover:bg-purple-50 transition-colors duration-200"
                                href="/about" data-discover="true">About Us</a><a
                                class="px-4 py-2 text-sm text-gray-600 hover:text-purple-800 font-medium rounded-lg hover:bg-purple-50 transition-colors duration-200"
                                href="/contact" data-discover="true">Contact Us</a><a
                                class="px-4 py-2 text-sm text-gray-600 hover:text-purple-800 font-medium rounded-lg hover:bg-purple-50 transition-colors duration-200"
                                href="/faq" data-discover="true">FAQ</a><a
                                class="px-4 py-2 text-sm text-gray-600 hover:text-purple-800 font-medium rounded-lg hover:bg-purple-50 transition-colors duration-200"
                                href="/terms" data-discover="true">Terms of Service</a><a
                                class="px-4 py-2 text-sm text-gray-600 hover:text-purple-800 font-medium rounded-lg hover:bg-purple-50 transition-colors duration-200"
                                href="/privacy" data-discover="true">Privacy Policy</a></div>
                        <div class="flex items-center gap-2"><button
                                class="p-2.5 rounded-lg text-slate-600 hover:text-purple-800 hover:bg-purple-50 transition-colors duration-200"
                                aria-label="Search"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-search w-5 h-5">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg></button><button
                                class="md:hidden p-2.5 rounded-lg text-slate-600 hover:text-purple-800 hover:bg-purple-50 transition-colors duration-200"
                                aria-label="Menu"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-5 h-5">
                                    <line x1="4" x2="20" y1="12" y2="12"></line>
                                    <line x1="4" x2="20" y1="6" y2="6"></line>
                                    <line x1="4" x2="20" y1="18" y2="18"></line>
                                </svg></button></div>
                    </div>
                </div>
            </nav>
            <main class="flex-1">
                <div class="pt-16">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4"><a
                            class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-500 hover:text-purple-800 transition-colors"
                            href="/" data-discover="true"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-arrow-left w-4 h-4">
                                <path d="m12 19-7-7 7-7"></path>
                                <path d="M19 12H5"></path>
                            </svg>Back to Home</a></div>
                    <section id="photos" class="scroll-mt-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 lg:grid-cols-5 lg:items-stretch gap-3 mb-4 md-brand-gallery">
                            <div id="mdHeroGallery"
                                class="lg:col-span-3 relative h-72 sm:h-96 rounded-2xl overflow-hidden group md-brand-gallery__hero">
                                <button type="button" id="mdHeroGalleryImageBtn"
                                    class="block w-full h-full cursor-zoom-in" data-md-lightbox-group="gallery"
                                    data-md-lightbox-src="{{ $heroImage['src'] }}"
                                    data-md-lightbox-title="{{ $heroImage['alt'] }}" data-md-lightbox-index="0"
                                    aria-label="View photo"><img id="mdHeroGalleryImage"
                                        src="{{ $heroImage['src'] }}" alt="{{ $heroImage['alt'] }}"
                                        class="w-full h-full object-cover"></button><button type="button"
                                    data-md-hero-prev
                                    class="md-hero-gallery__nav absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center bg-white/80 backdrop-blur-md rounded-full shadow-md hover:bg-white transition-colors opacity-0 group-hover:opacity-100"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-left w-5 h-5 text-slate-700">
                                        <path d="m15 18-6-6 6-6"></path>
                                    </svg></button><button type="button" data-md-hero-next
                                    class="md-hero-gallery__nav absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center bg-white/80 backdrop-blur-md rounded-full shadow-md hover:bg-white transition-colors opacity-0 group-hover:opacity-100"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-right w-5 h-5 text-slate-700">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg></button>
                                <div id="mdHeroGalleryDots"
                                    class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1.5">
                                    @foreach ($galleryItems as $item)
                                        <button type="button" data-md-hero-dot="{{ $loop->index }}"
                                            class="md-hero-dot h-2 rounded-full transition-all @if ($loop->first) md-hero-dot--active @endif"
                                            aria-label="Go to slide {{ $loop->iteration }}"></button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="lg:col-span-2 grid grid-cols-2 gap-3 md-brand-gallery__thumbs">
                                @foreach ($thumbImages as $i => $thumb)
                                    @php
                                        $slideIndex =
                                            $galleryItems->count() > 1 ? min($i + 1, $galleryItems->count() - 1) : 0;
                                        $isMoreThumb = $loop->last && $extraPhotoCount > 0;
                                    @endphp
                                    <button type="button" data-md-hero-go="{{ $slideIndex }}"
                                        @if ($isMoreThumb) data-md-hero-more
                                            data-md-lightbox-group="gallery"
                                            data-md-lightbox-src="{{ $thumb['src'] }}"
                                            data-md-lightbox-title="{{ $thumb['alt'] }}"
                                            data-md-lightbox-index="{{ $slideIndex }}" @endif
                                        class="md-brand-gallery__thumb md-hero-thumb rounded-2xl overflow-hidden border-2 transition-all border-transparent @if ($isMoreThumb) md-hero-thumb--more @endif">
                                        <img src="{{ $thumb['src'] }}" alt="{{ $thumb['alt'] }}"
                                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                        @if ($isMoreThumb)
                                            <span class="md-hero-thumb__overlay">+{{ $extraPhotoCount }} photos</span>
                                        @endif
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </section>




                    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <div class="flex-1 lg:w-2/3">
                                <div id="overview" class="scroll-mt-24 flex items-start justify-between gap-4 mb-3">
                                    <div>
                                        <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight">
                                            {{ $post->title }}
                                        </h1>
                                        <div class="flex items-center flex-wrap gap-2 mt-2">
                                            <div class="flex items-center gap-1"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-star w-5 h-5 fill-amber-400 text-amber-400">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg><span
                                                    class="text-lg font-bold text-slate-900">{{ $rating }}</span>
                                            </div>
                                            <span class="text-sm text-slate-400">({{ $reviewCount }} reviews)</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2"><button
                                            class="w-10 h-10 flex items-center justify-center border border-purple-200 rounded-xl hover:border-purple-400 hover:bg-purple-50 transition-all"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-heart w-5 h-5 transition-colors text-slate-500">
                                                <path
                                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                                </path>
                                            </svg></button><button
                                            class="w-10 h-10 flex items-center justify-center border border-purple-200 rounded-xl hover:border-purple-400 hover:bg-purple-50 transition-all"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-share2 w-5 h-5 text-slate-500">
                                                <circle cx="18" cy="5" r="3"></circle>
                                                <circle cx="6" cy="12" r="3"></circle>
                                                <circle cx="18" cy="19" r="3"></circle>
                                                <line x1="8.59" x2="15.42" y1="13.51" y2="17.49">
                                                </line>
                                                <line x1="15.41" x2="8.59" y1="6.51" y2="10.49">
                                                </line>
                                            </svg></button></div>
                                </div>
                                <nav id="mdSectionNav" class="md-section-nav mb-6" aria-label="Page sections">
                                    <div class="md-section-nav__inner">
                                        <a href="#overview" class="md-section-nav__link is-active"
                                            data-md-section="overview">Overview</a>
                                        <a href="#about" class="md-section-nav__link"
                                            data-md-section="about">About</a>
                                        <a href="#photos" class="md-section-nav__link"
                                            data-md-section="photos">Photos</a>
                                        @if ($showMenuSection)
                                            <a href="#menu" class="md-section-nav__link"
                                                data-md-section="menu">Menu</a>
                                        @endif
                                        <a href="#reviews" class="md-section-nav__link"
                                            data-md-section="reviews">Reviews</a>
                                        <a href="#location" class="md-section-nav__link"
                                            data-md-section="location">Location</a>
                                    </div>
                                </nav>
                                <div class="space-y-12">
                                    <div id="about" class="scroll-mt-28">
                                        <div class="flex items-center gap-2.5 mb-5">
                                            <div
                                                class="w-9 h-9 rounded-xl bg-gradient-to-br from-purple-800 to-purple-900 flex items-center justify-center shadow-md shadow-purple-200/40">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-info w-5 h-5 text-white">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <path d="M12 16v-4"></path>
                                                    <path d="M12 8h.01"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="text-xl font-bold text-slate-900 tracking-tight">About the
                                                    {{ $post->title }}</h2>
                                            </div>
                                        </div>
                                        <div class="bg-white rounded-2xl border border-purple-100 p-6 shadow-sm mb-5">

                                            <div class="text-sm text-slate-600 leading-relaxed">
                                                {!! $post->content !!}
                                            </div>
                                        </div>
                                        @if ($amenities->count())
                                            <div>
                                                <h3
                                                    class="text-sm font-bold text-slate-900 uppercase tracking-wide mb-3">
                                                    Amenities &amp; Features</h3>
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2.5">
                                                    @foreach ($amenities as $item)
                                                        <li>
                                                            <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                                                            <span>{!! strip_tags($item) !!}</span>
                                                        </li>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    @if ($showMenuSection)
                                        <div id="menu" class="scroll-mt-28">
                                            <div class="flex items-center gap-2.5 mb-5">
                                                <div
                                                    class="w-9 h-9 rounded-xl bg-gradient-to-br from-purple-800 to-purple-900 flex items-center justify-center shadow-md shadow-purple-200/40">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-utensils-crossed w-5 h-5 text-white">
                                                        <path
                                                            d="m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8">
                                                        </path>
                                                        <path
                                                            d="M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7">
                                                        </path>
                                                        <path d="m2.1 21.8 6.4-6.3"></path>
                                                        <path d="m19 5-7 7"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h2 class="text-xl font-bold text-slate-900 tracking-tight">Full
                                                        Menu
                                                    </h2>
                                                    <p class="text-xs text-slate-400">Explore the complete dining
                                                        experience</p>
                                                </div>
                                            </div>
                                            @if ($menuCarouselItems->isNotEmpty())
                                                <div class="relative mb-5 group/carousel md-menu-carousel"
                                                    id="mdMenuCarousel"><button type="button" data-md-carousel-prev
                                                        class="hidden md:flex absolute -left-3 top-1/2 -translate-y-1/2 z-10 w-9 h-9 items-center justify-center bg-purple-800 text-white rounded-full shadow-lg hover:bg-purple-900 transition-all opacity-0 group-hover/carousel:opacity-100 md-menu-carousel__nav"
                                                        aria-label="Scroll left"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-chevron-left w-5 h-5">
                                                            <path d="m15 18-6-6 6-6"></path>
                                                        </svg></button><button type="button" data-md-carousel-next
                                                        class="hidden md:flex absolute -right-3 top-1/2 -translate-y-1/2 z-10 w-9 h-9 items-center justify-center bg-purple-800 text-white rounded-full shadow-lg hover:bg-purple-900 transition-all opacity-0 group-hover/carousel:opacity-100 md-menu-carousel__nav"
                                                        aria-label="Scroll right"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-chevron-right w-5 h-5">
                                                            <path d="m9 18 6-6-6-6"></path>
                                                        </svg></button>
                                                    <div id="mdMenuCarouselTrack"
                                                        class="no-scrollbar flex gap-4 overflow-x-auto scroll-smooth snap-x pb-1 md-menu-carousel__track">
                                                        @foreach ($menuCarouselItems as $carouselItem)
                                                            <button type="button" data-md-lightbox-group="menu"
                                                                data-md-lightbox-src="{{ $carouselItem['src'] }}"
                                                                data-md-lightbox-title="{{ $carouselItem['title'] }}"
                                                                data-md-lightbox-index="{{ $loop->index }}"
                                                                class="md-menu-carousel__slide w-44 h-32 flex-shrink-0 rounded-2xl overflow-hidden relative group cursor-pointer border border-purple-100 shadow-sm snap-start hover:ring-2 hover:ring-purple-500 transition-all @if ($loop->first) is-active @endif"><img
                                                                    src="{{ $carouselItem['src'] }}"
                                                                    alt="{{ $carouselItem['alt'] }}"
                                                                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                                                <div
                                                                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                                                    <span
                                                                        class="text-sm font-semibold text-white drop-shadow-md">{{ $carouselItem['title'] }}</span>
                                                                </div>
                                                            </button>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($allMenuItems->isNotEmpty())
                                                @if ($menuSections->isNotEmpty())
                                                    <div id="mdMenuFilters"
                                                        class="flex gap-2 mb-5 overflow-x-auto pb-1"><button
                                                            type="button" data-md-menu-filter="all"
                                                            class="md-menu-filter is-active flex items-center gap-1.5 px-4 py-2 text-sm font-semibold rounded-lg whitespace-nowrap transition-all bg-purple-800 text-white shadow-md shadow-purple-200/50"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-utensils-crossed w-3.5 h-3.5">
                                                                <path
                                                                    d="m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8">
                                                                </path>
                                                                <path
                                                                    d="M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7">
                                                                </path>
                                                                <path d="m2.1 21.8 6.4-6.3"></path>
                                                                <path d="m19 5-7 7"></path>
                                                            </svg>All</button>
                                                        @foreach ($menuSections as $section)
                                                            <button type="button"
                                                                data-md-menu-filter="{{ $section->title }}"
                                                                class="md-menu-filter flex items-center gap-1.5 px-4 py-2 text-sm font-semibold rounded-lg whitespace-nowrap transition-all bg-purple-50 text-slate-600 hover:bg-purple-100">{{ $section->title }}</button>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div id="mdMenuItems" class="space-y-3">
                                                    @foreach ($allMenuItems as $menuRow)
                                                        @php $menuItem = $menuRow['item']; @endphp
                                                        <div data-md-menu-category="{{ $menuRow['category'] }}"
                                                            class="md-menu-item flex items-start justify-between gap-4 p-4 rounded-xl bg-white border border-purple-50 hover:border-purple-200 transition-colors">
                                                            <div class="flex-1 min-w-0">
                                                                <div class="flex items-center gap-2 flex-wrap mb-1">
                                                                    <h4 class="text-base font-bold text-slate-900">
                                                                        {{ $menuItem->title }}</h4>
                                                                </div>
                                                                @if (!empty($menuItem->description))
                                                                    <p class="text-sm text-slate-500 leading-relaxed">
                                                                        {{ $menuItem->description }}</p>
                                                                @endif
                                                                <span
                                                                    class="inline-block mt-1.5 text-[11px] font-semibold text-purple-600 bg-purple-50 px-2 py-0.5 rounded-md">
                                                                    {{ $menuRow['category'] }}</span>
                                                            </div>
                                                            @if (!empty($menuItem->price))
                                                                <span
                                                                    class="text-base font-bold text-purple-800 whitespace-nowrap">{{ $menuItem->price }}</span>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="scroll-mt-28" id="reviews">
                                        <div class="flex items-center gap-2.5 mb-5">
                                            <div
                                                class="w-9 h-9 rounded-xl bg-gradient-to-br from-purple-800 to-purple-900 flex items-center justify-center shadow-md shadow-purple-200/40">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-star w-5 h-5 text-white">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="text-xl font-bold text-slate-900 tracking-tight">Customer
                                                    Reviews</h2>
                                                <p class="text-xs text-slate-400">Real experiences from verified diners
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="flex flex-col sm:flex-row items-center gap-6 mb-6 p-6 bg-white rounded-2xl border border-purple-100 shadow-sm">
                                            <div class="text-center flex-shrink-0">
                                                <div class="text-5xl font-bold text-slate-900">{{ $rating }}
                                                </div>
                                                <div class="flex items-center justify-center gap-0.5 mt-1.5"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400">
                                                        <polygon
                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                        </polygon>
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400">
                                                        <polygon
                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                        </polygon>
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400">
                                                        <polygon
                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                        </polygon>
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400">
                                                        <polygon
                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                        </polygon>
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400">
                                                        <polygon
                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                        </polygon>
                                                    </svg></div>
                                                <div class="text-xs text-slate-400 mt-1.5">{{ $reviewCount }} total
                                                    reviews</div>
                                            </div>
                                            <div class="flex-1 w-full space-y-2">
                                                <div class="flex items-center gap-2.5"><span
                                                        class="text-xs text-slate-500 w-6 text-right">5 stars</span>
                                                    <div
                                                        class="flex-1 h-2.5 bg-purple-50 rounded-full overflow-hidden">
                                                        <div class="h-full bg-gradient-to-r from-amber-400 to-amber-500 rounded-full transition-all duration-500"
                                                            style="width: 71.9527%;"></div>
                                                    </div><span
                                                        class="text-xs text-slate-400 w-12 text-right">608</span>
                                                </div>
                                                <div class="flex items-center gap-2.5"><span
                                                        class="text-xs text-slate-500 w-6 text-right">4 stars</span>
                                                    <div
                                                        class="flex-1 h-2.5 bg-purple-50 rounded-full overflow-hidden">
                                                        <div class="h-full bg-gradient-to-r from-amber-400 to-amber-500 rounded-full transition-all duration-500"
                                                            style="width: 17.9882%;"></div>
                                                    </div><span
                                                        class="text-xs text-slate-400 w-12 text-right">152</span>
                                                </div>
                                                <div class="flex items-center gap-2.5"><span
                                                        class="text-xs text-slate-500 w-6 text-right">3 stars</span>
                                                    <div
                                                        class="flex-1 h-2.5 bg-purple-50 rounded-full overflow-hidden">
                                                        <div class="h-full bg-gradient-to-r from-amber-400 to-amber-500 rounded-full transition-all duration-500"
                                                            style="width: 6.0355%;"></div>
                                                    </div><span
                                                        class="text-xs text-slate-400 w-12 text-right">51</span>
                                                </div>
                                                <div class="flex items-center gap-2.5"><span
                                                        class="text-xs text-slate-500 w-6 text-right">2 stars</span>
                                                    <div
                                                        class="flex-1 h-2.5 bg-purple-50 rounded-full overflow-hidden">
                                                        <div class="h-full bg-gradient-to-r from-amber-400 to-amber-500 rounded-full transition-all duration-500"
                                                            style="width: 2.95858%;"></div>
                                                    </div><span
                                                        class="text-xs text-slate-400 w-12 text-right">25</span>
                                                </div>
                                                <div class="flex items-center gap-2.5"><span
                                                        class="text-xs text-slate-500 w-6 text-right">1 star</span>
                                                    <div
                                                        class="flex-1 h-2.5 bg-purple-50 rounded-full overflow-hidden">
                                                        <div class="h-full bg-gradient-to-r from-amber-400 to-amber-500 rounded-full transition-all duration-500"
                                                            style="width: 0.946746%;"></div>
                                                    </div><span class="text-xs text-slate-400 w-12 text-right">8</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6 p-5 bg-white rounded-2xl border border-purple-100 shadow-sm">
                                            <div class="flex items-center gap-2 mb-4"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-pen-line w-5 h-5 text-purple-800">
                                                    <path d="M12 20h9"></path>
                                                    <path
                                                        d="M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z">
                                                    </path>
                                                </svg>
                                                <h3 class="text-base font-bold text-slate-900">Write a Review</h3>
                                            </div>
                                            <form id="mdReviewForm" class="space-y-3">
                                                <div id="mdReviewSuccess"
                                                    class="hidden rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                                                    Thank you! Your review has been submitted successfully.
                                                </div>
                                                <input type="text" name="name" placeholder="Your name"
                                                    required=""
                                                    class="w-full px-4 py-2.5 text-sm text-slate-900 bg-purple-50/50 border border-purple-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                                    value="">
                                                <div id="mdReviewStars" class="flex items-center gap-2"><span
                                                        class="text-sm text-slate-600 font-medium">Rating:</span><button
                                                        type="button" class="md-review-star" data-md-star="1"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-star w-6 h-6 transition-colors fill-amber-400 text-amber-400">
                                                            <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                            </polygon>
                                                        </svg></button><button type="button" class="md-review-star"
                                                        data-md-star="2"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-star w-6 h-6 transition-colors fill-amber-400 text-amber-400">
                                                            <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                            </polygon>
                                                        </svg></button><button type="button" class="md-review-star"
                                                        data-md-star="3"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-star w-6 h-6 transition-colors fill-amber-400 text-amber-400">
                                                            <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                            </polygon>
                                                        </svg></button><button type="button" class="md-review-star"
                                                        data-md-star="4"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-star w-6 h-6 transition-colors fill-amber-400 text-amber-400">
                                                            <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                            </polygon>
                                                        </svg></button><button type="button" class="md-review-star"
                                                        data-md-star="5"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="lucide lucide-star w-6 h-6 transition-colors fill-amber-400 text-amber-400">
                                                            <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                            </polygon>
                                                        </svg></button></div>
                                                <textarea name="content" placeholder="Share your experience..." required="" rows="3"
                                                    class="w-full px-4 py-2.5 text-sm text-slate-900 bg-purple-50/50 border border-purple-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"></textarea><button type="submit"
                                                    class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-purple-800 to-purple-900 text-white text-sm font-semibold rounded-xl hover:from-purple-700 hover:to-purple-800 transition-all shadow-md shadow-purple-200/40"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-pen-line w-4 h-4">
                                                        <path d="M12 20h9"></path>
                                                        <path
                                                            d="M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z">
                                                        </path>
                                                    </svg>Post Review</button>
                                            </form>
                                        </div>
                                        <div class="space-y-0">
                                            @foreach ($reviews as $review)
                                                @php
                                                    $reviewName = trim($review->fullname ?? '') ?: 'Guest';
                                                    $initial = mb_strtoupper(mb_substr($reviewName, 0, 1));
                                                @endphp
                                                <div
                                                    class="p-5 bg-white rounded-2xl border border-purple-100 shadow-sm animate-fade-in-up border-b border-purple-50 pb-6 @if ($loop->index >= $visibleReviewLimit) hidden md-review-extra @endif">
                                                    <div class="flex items-start justify-between gap-3 mb-3">
                                                        <div class="flex items-center gap-3">
                                                            <div
                                                                class="w-11 h-11 rounded-full bg-gradient-to-br from-purple-700 to-indigo-800 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                                                                {{ $initial }}</div>
                                                            <div>
                                                                <div class="flex items-center gap-1.5">
                                                                    <span
                                                                        class="text-sm font-bold text-slate-900">{{ $reviewName }}</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="lucide lucide-badge-check w-4 h-4 text-purple-600">
                                                                        <path
                                                                            d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z">
                                                                        </path>
                                                                        <path d="m9 12 2 2 4-4"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="text-xs text-slate-400 mt-0.5">
                                                                    {{ format_date($review->created_at) }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center gap-0.5 flex-shrink-0"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-star w-3.5 h-3.5 fill-amber-400 text-amber-400">
                                                                <polygon
                                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                </polygon>
                                                            </svg><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-star w-3.5 h-3.5 fill-amber-400 text-amber-400">
                                                                <polygon
                                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                </polygon>
                                                            </svg><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-star w-3.5 h-3.5 fill-amber-400 text-amber-400">
                                                                <polygon
                                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                </polygon>
                                                            </svg><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-star w-3.5 h-3.5 fill-amber-400 text-amber-400">
                                                                <polygon
                                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                </polygon>
                                                            </svg><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-star w-3.5 h-3.5 fill-amber-400 text-amber-400">
                                                                <polygon
                                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                </polygon>
                                                            </svg></div>
                                                    </div>
                                                    <p class="text-sm text-slate-600 leading-relaxed">
                                                        {!! $review->content !!}</p>
                                                </div>
                                            @endforeach

                                        </div>
                                        @if ($hiddenReviewCount > 0)
                                            <div class="mt-6 flex flex-col items-center gap-2"><button type="button"
                                                    id="mdShowMoreReviews"
                                                    class="border-2 border-purple-800 text-purple-900 font-semibold px-6 py-3 rounded-xl hover:bg-purple-50 transition-all flex items-center gap-2 mx-auto shadow-sm"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-chevron-down w-4 h-4">
                                                        <path d="m6 9 6 6 6-6"></path>
                                                    </svg>Show More Reviews<span
                                                        class="text-xs font-bold text-purple-800 bg-purple-100 px-2 py-0.5 rounded-full">{{ min($visibleReviewLimit, $reviews->count()) }}
                                                        of {{ $reviews->count() }}</span></button></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-1/3">
                                <div class="sticky top-20 space-y-4">
                                    <div class="bg-white rounded-2xl border border-purple-100 p-5 shadow-sm">
                                        <h3 class="text-base font-bold text-slate-900 mb-4">Restaurant Info</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-start gap-2.5 text-sm text-slate-600"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-clock w-4 h-4 text-purple-500 flex-shrink-0 mt-0.5">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="12 6 12 12 16 14"></polyline>
                                                </svg>
                                                <div>
                                                    <div class="font-semibold text-slate-700">Opening Hours</div>
                                                    <div class="text-slate-500" id="mdTodayHours">
                                                        {{ $todayHours ?: 'Contact for hours' }}</div>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-2.5 text-sm text-slate-600"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-map-pin w-4 h-4 text-purple-500 flex-shrink-0 mt-0.5">
                                                    <path
                                                        d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                                    </path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                                <div>
                                                    <div class="font-semibold text-slate-700">Address</div>
                                                    <div class="text-slate-500">{{ $post->address ?: '—' }}</div>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-2.5 text-sm text-slate-600"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-phone w-4 h-4 text-purple-500 flex-shrink-0 mt-0.5">
                                                    <path
                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    <div class="font-semibold text-slate-700">Phone</div>
                                                    <div class="text-slate-500">{{ $post->phone ?: '—' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-y-3 mt-5 md-brand-cta">
                                            <button type="button"
                                                @if($orderUrl != '#') onclick="window.open('{{ $orderUrl }}','_blank')" @endif
                                                class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-purple-800 text-white text-sm font-semibold rounded-xl hover:bg-purple-900 transition-all shadow-md shadow-purple-200/40"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-shopping-bag w-4 h-4">
                                                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                                                    <path d="M3 6h18"></path>
                                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                </svg>Order Online</button><button type="button"
                                                @if($reserveUrl != '#') onclick="window.open('{{ $reserveUrl }}','_blank')" @endif
                                                class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-semibold text-purple-900 bg-purple-50 border border-purple-300 rounded-xl hover:bg-purple-100 transition-all"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-calendar w-4 h-4">
                                                    <path d="M8 2v4"></path>
                                                    <path d="M16 2v4"></path>
                                                    <rect width="18" height="18" x="3" y="4" rx="2">
                                                    </rect>
                                                    <path d="M3 10h18"></path>
                                                </svg>Reserve a Table</button><button type="button"
                                                onclick="document.getElementById('reviews')?.scrollIntoView({behavior:'smooth'})"
                                                class="w-full flex items-center justify-center gap-2 px-4 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-100 transition-all"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-pen-line w-4 h-4">
                                                    <path d="M12 20h9"></path>
                                                    <path
                                                        d="M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z">
                                                    </path>
                                                </svg>Write a Review</button>
                                        </div>
                                    </div>
                                    <div id="location"
                                        class="scroll-mt-28 bg-white rounded-2xl border border-purple-100 p-5 shadow-sm">
                                        <div class="flex items-center gap-2 mb-3"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-map w-4 h-4 text-purple-500">
                                                <path
                                                    d="M14.106 5.553a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619v12.764a1 1 0 0 1-.553.894l-4.553 2.277a2 2 0 0 1-1.788 0l-4.212-2.106a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0z">
                                                </path>
                                                <path d="M15 5.764v15"></path>
                                                <path d="M9 3.236v15"></path>
                                            </svg>
                                            <h3 class="text-base font-bold text-slate-900">Location</h3>
                                        </div>
                                        <div
                                            class="h-48 rounded-xl bg-gradient-to-br from-purple-100 to-indigo-100 flex items-center justify-center border border-purple-100 overflow-hidden">
                                            @if (!empty($post->iframe_map))
                                                <div class="w-full h-full">{!! $post->iframe_map !!}</div>
                                            @else
                                                <div class="text-center"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-map-pin w-8 h-8 text-purple-400 mx-auto mb-1">
                                                        <path
                                                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                                        </path>
                                                        <circle cx="12" cy="10" r="3"></circle>
                                                    </svg>
                                                    <p class="text-xs text-slate-500 px-4">{{ $post->address ?: '—' }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-purple-100 pt-10 pb-6 mt-12">
                        <div class="flex items-center gap-2.5 mb-6">
                            <div
                                class="w-9 h-9 rounded-xl bg-gradient-to-br from-purple-800 to-purple-900 flex items-center justify-center shadow-md shadow-purple-200/40">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-utensils-crossed w-5 h-5 text-white">
                                    <path d="m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8"></path>
                                    <path d="M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7">
                                    </path>
                                    <path d="m2.1 21.8 6.4-6.3"></path>
                                    <path d="m19 5-7 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-slate-900 tracking-tight">More Menus to Explore</h2>
                                <p class="text-xs text-slate-400">Explore menus and dining guides from our curated
                                    collection</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach (collect($relates)->where('id', '!=', $post->id)->take(3) as $relate)
                                @php
                                    $relateRating =
                                        $relate->google_review ??
                                        ($relate->review_google ?? ($relate->avg_vote ?: '5'));
                                    $relateReviewCount = number_format($relate->viewed ?? 0);
                                    $relateImage = convertPathImage($relate->thumbnail ?? '');
                                    $relateCategory = optional($relate->category)->title ?? '';
                                @endphp
                                <a class="group bg-white rounded-2xl border border-purple-100 shadow-sm overflow-hidden hover:shadow-lg hover:border-purple-200 transition-all"
                                    href="{{ route('post', ['slug' => $relate->slug]) }}" data-discover="true">
                                    <div class="relative h-40 overflow-hidden"><img src="{{ $relateImage }}"
                                            alt="{{ $relate->title }}"
                                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                        @if ($relateCategory)
                                            <span
                                                class="absolute top-3 left-3 px-2.5 py-1 text-[11px] font-bold text-white bg-purple-800/90 backdrop-blur-sm rounded-lg">{{ $relateCategory }}</span>
                                        @endif
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-center justify-between gap-2 mb-1.5">
                                            <h3 class="text-base font-bold text-slate-900 truncate">
                                                {{ $relate->title }}</h3>
                                        </div>
                                        <div class="flex items-center gap-1.5 mb-2"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-star w-4 h-4 fill-amber-400 text-amber-400">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg><span
                                                class="text-sm font-bold text-slate-900">{{ $relateRating }}</span><span
                                                class="text-xs text-slate-400">({{ $relateReviewCount }})</span></div>
                                        @if (!empty($relate->description))
                                            <p class="text-xs text-slate-500 leading-relaxed line-clamp-2 mb-3">
                                                {{ strip_tags($relate->description) }}</p>
                                        @endif
                                        <div class="flex items-center gap-1.5 text-xs text-slate-400 mb-3"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-map-pin w-3.5 h-3.5">
                                                <path
                                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                                </path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg><span class="truncate">{{ $relate->address ?: '—' }}</span></div>
                                        <span
                                            class="inline-flex items-center gap-1.5 text-sm font-semibold text-purple-800 group-hover:gap-2.5 transition-all">View
                                            Menu &amp; Details<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-chevron-right w-4 h-4">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg></span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </section>
                </div>
            </main>
            @include('front_end.layout.footer_page')
        </div>
    </div>


    <style>
        @font-face {
            font-family: Inter-NjBkMDQwOTZj;
            font-weight: 600;
            src: url(data:font/woff2;base64,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) format("woff2");
        }

        @font-face {
            font-family: Inter-NjBkMDQwOTZj;
            font-weight: 500;
            src: url(data:font/woff2;base64,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) format("woff2");
        }
    </style>
    <div style="position: fixed; bottom: 1rem; right: 1rem; z-index: 2147483647;"></div>
    <script type="application/json" id="mdHoursData">@json($timeSchedule)</script>
    <script type="application/json" id="mdGalleryLightboxData">@json($galleryItems->values())</script>
    <script type="application/json" id="mdMenuLightboxData">@json($menuCarouselItems->values())</script>
    <script src="{{ asset('assets/js/brand.js') }}"></script>
</body>

</html>
