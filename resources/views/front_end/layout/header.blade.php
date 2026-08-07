@php
    $menus_header = getMenuParent(0, 0);
    $title = !empty($post) ? $post->title : $config_website->website;
@endphp

<header class="mj-header" id="mjHeader">
    <div class="container-xxl">
        <nav class="navbar navbar-expand-lg mj-navbar" aria-label="Primary">
            @if (!empty($post))
                <a class="mj-brand logo-text-header" href="{{ env('APP_URL', '/') }}" aria-label="{{ $title }}">
                    {{ $post->title }}
                </a>
            @else<a class="mj-brand" href="{{ $SEO['url'] ?? '/' }}" aria-label="{{ $title }}">
                    <img class="mj-brand-img" src="{{ getImageThumb($config_website->logo_header ?? '') }}"
                        alt="{{ $title }}" width="165" height="44" />
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
    .logo-text-header {
        display: block;
        flex: 1 1 auto;
        min-width: 0;
        max-width: calc(100% - 56px);
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        font-family: Georgia, "Times New Roman", serif;
        font-size: 25px;
        font-weight: 600;
        color: #49362d;
        text-decoration: none;
    }

    @media (max-width: 991.98px) {
        .mj-navbar {
            flex-wrap: nowrap;
        }

        .logo-text-header {
            font-size: 18px;
            max-width: calc(100vw - 96px);
        }
    }
</style>
