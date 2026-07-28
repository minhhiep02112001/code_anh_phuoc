@php
    $menus_header = getMenuParent(0, 0);
    $title = !empty($post) ? $post->title : $config_website->website;
@endphp

<header class="mj-header" id="mjHeader">
    <div class="container-xxl">
        <nav class="navbar navbar-expand-lg mj-navbar" aria-label="Primary">
            <a class="mj-brand" href="{{ env('APP_URL', '/') }}" aria-label="{{ $title }}">
                <img class="mj-brand-img" src="{{ getImageThumb($config_website->logo_header ?? '') }}"
                    alt="{{ $title }}" width="165" height="44" />
            </a>
            <button class="navbar-toggler mj-nav-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mjNav" aria-controls="mjNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse mj-nav" id="mjNav">
                <ul class="navbar-nav mx-lg-auto mj-nav-list" role="menubar">
                    @foreach ($menus_header as $menu)
                        <li class="nav-item">
                            <a class="mj-nav-link" href="{{ $menu->link }}">{{ $menu->title }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="mj-nav-cta"> <a class="mj-btn mj-btn-primary" href="#" title="Add a Menu">
                        <i class="bi bi-plus-circle" aria-hidden="true"></i> <span>Add a
                            Menu</span> </a> </div>
            </div>
        </nav>
    </div>
</header>
