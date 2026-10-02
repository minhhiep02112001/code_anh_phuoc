@php
    $menus_header = getMenuParent(0, 0);
    $brandName = 'MENUDY';
    $siteName = preg_replace('/menujoys/i', $brandName, $config_website->website ?? $brandName);
    $title = !empty($post) ? $post->title : $siteName;
    $logoPath = $config_website->logo_header ?? '';
    $useWordmark = empty($logoPath) || stripos(basename($logoPath), 'menujoys') !== false;
    $logoUrl = $useWordmark ? '' : getImageThumb($logoPath);
    if ($useWordmark && file_exists(public_path('assets/images/logo/menudy-logo-light.png'))) {
        $logoUrl = asset('assets/images/logo/menudy-logo-light.png');
        $useWordmark = false;
    }
@endphp
<header class="mj-header" id="mjHeader">
    <div class="container-xxl">
        <nav class="navbar navbar-expand-lg mj-navbar" aria-label="Primary">
            @if (!empty($post))
                <a class="mj-brand logo-text-header" href="{{ env('APP_URL', '/') }}" aria-label="{{ $title }}">
                    {{ $post->title }}
                </a>
            @else
                <a class="mj-brand" href="{{ $SEO['url'] ?? '/' }}" aria-label="{{ $brandName }} home">
                    @if ($useWordmark)
                        <span class="mj-brand-wordmark">{{ $brandName }}</span>
                    @else
                        <img class="mj-brand-img" src="{{ $logoUrl }}"
                            alt="{{ $brandName }}" width="165" height="44" />
                    @endif
                </a>
            @endif
            <button class="navbar-toggler mj-nav-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mjNav" aria-controls="mjNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse mj-nav" id="mjNav">
                <ul class="navbar-nav mx-lg-auto mj-nav-list" role="menubar">
                    @if (!empty($post))
                        @yield('menu_brand')
                    @else
                        @foreach ($menus_header as $menu)
                            <li class="nav-item">
                                <a class="mj-nav-link" href="{{ $menu->link }}">{{ $menu->title }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
<style>
    .mj-brand-wordmark {
        font-size: 1.625rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        color: #6d28d9;
        text-decoration: none;
        line-height: 1;
    }

    .logo-text-header {
        display: block;
        flex: 1 1 auto;
        min-width: 0;
        max-width: calc(100% - 56px);
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        font-size: 25px;
        font-weight: 700;
        color: #1e1b4b;
        text-decoration: none;
        letter-spacing: -0.02em;
    }

    @media (max-width: 991.98px) {
        .mj-navbar {
            flex-wrap: nowrap;
        }

        .logo-text-header {
            font-size: 18px;
            max-width: calc(100vw - 96px);
        }

        .mj-brand-wordmark {
            font-size: 1.375rem;
        }
    }
</style>
