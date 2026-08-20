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
