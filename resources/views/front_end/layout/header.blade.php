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
            @else<a class="mj-brand" href="{{ env('APP_URL', '/') }}" aria-label="{{ $title }}">
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
                        <li class="nav-item">
                            <a class="mj-nav-link" href="#about">{{ __('config_data.menus.about') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="mj-nav-link" href="#service">{{ __('config_data.menus.service') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="mj-nav-link" href="#photo">{{ __('config_data.menus.photo') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="mj-nav-link" href="#menu">{{ __('config_data.menus.menu') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="mj-nav-link" href="#review">{{ __('config_data.menus.review') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="mj-nav-link" href="#location">{{ __('config_data.menus.location') }}</a>
                        </li>
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
        max-width: 400px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        font-family: Georgia, "Times New Roman", serif;
        font-size: 25px;
        font-weight: 600;
        color: #49362d;
        text-decoration: none;
    }
</style>
