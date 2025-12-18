@php
    $menus_header = getMenuParent(0, 0);

@endphp


<header class="main-header">
    <div class="main-box">
        <div class="logo-box">
            <div class="logo">
                <a href="{{ route('homepage') }}" title="{{ $config_website->website ?? '' }}">
                    {{-- @if(!empty($post))
                        {{ $post->title }}
                    @else --}}
                        <img src="{{ getImageThumb($config_website->logo_header ?? '') }}" width="95" alt="{{ $config_website->website ?? '' }}">
                    {{-- @endif --}}
                </a>
            </div>
        </div>
        <div class="nav-outer">
            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    @foreach($menus_header as $menu)
                        <li> <a href="{{ $menu->link }}">{{ $menu->title }}</a> </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>

    <div class="mobile-header">
        <div class="logo">
            <a href="{{ route('home') }}" title="{{ $config_website->website ?? '' }}">
                @if(!empty($post))
                    {{ $post->title }}
                @else
                    <img src="{{ getImageThumb($config_website->logo_header ?? '') }}" alt="{{ $config_website->website ?? '' }}">
                @endif
            </a>
        </div>
        <div class="nav-outer clearfix">
            <div class="outer-box"> <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                        class="fa fa-bars"></span></a>
            </div>
        </div>
    </div>
    <div id="nav-mobile"></div>
    <div class="search-popup"> <span class="search-back-drop"></span>
        <div class="search-inner"> <button class="close-search"><span class="fa fa-times"></span></button>
            <form method="post" action="#">
                <div class="form-group"> <input type="search" name="search-field" value="" placeholder="Search..."
                        required=""> <button type="submit"><i class="flaticon-magnifying-glass"></i></button> </div>
            </form>
        </div>
    </div>
</header>