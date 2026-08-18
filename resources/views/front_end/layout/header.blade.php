@php
    $menus_header = getMenuParent(0, 0);
@endphp

<header class="main-header" id="mainHeader">

    {{-- =========================
        DESKTOP HEADER
    ========================== --}}
    <div class="main-box desktop-header">
        <div class="logo-box">
            <div class="logo">
                <a href="{{ env('APP_URL', '/') }}"
                    title="{{ $config_website->website ?? '' }}">

                    @if (!empty($post))
                        <span class="header-post-title">
                            {{ $post->title }}
                        </span>
                    @else
                        <img
                            src="{{ getImageThumb($config_website->logo_header ?? '') }}"
                            width="95"
                            alt="{{ $config_website->website ?? '' }}"
                        >
                    @endif

                </a>
            </div>
        </div>

        <div class="nav-outer">
            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    @foreach ($menus_header as $menu)
                        <li>
                            <a href="{{ $menu->link }}">
                                {{ $menu->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>


    {{-- =========================
        MOBILE HEADER
    ========================== --}}
    <div class="mobile-header">
        <div class="mobile-header-inner">

            <div class="logo">
                <a href="{{ env('APP_URL', '/') }}"
                    title="{{ $config_website->website ?? '' }}">

                    @if (!empty($post))
                        <span class="mobile-post-title">
                            {{ $post->title }}
                        </span>
                    @else
                        <img
                            src="{{ getImageThumb($config_website->logo_header ?? '') }}"
                            alt="{{ $config_website->website ?? '' }}"
                        >
                    @endif

                </a>
            </div>

            <button
                type="button"
                class="mobile-nav-toggler"
                id="mobileNavToggle"
                aria-label="Open menu"
                aria-expanded="false"
                aria-controls="mobileNavigation"
            >
                <span class="fa fa-bars"></span>
            </button>

        </div>
    </div>


    {{-- =========================
        MOBILE OVERLAY
    ========================== --}}
    <div
        class="mobile-nav-overlay"
        id="mobileNavOverlay"
    ></div>


    {{-- =========================
        MOBILE DRAWER
    ========================== --}}
    <aside
        class="mobile-navigation"
        id="mobileNavigation"
        aria-hidden="true"
    >

        <div class="mobile-navigation-header">

            <div class="mobile-navigation-logo">
                <a href="{{ env('APP_URL', '/') }}">
                    @if (!empty($config_website->logo_header))
                        <img
                            src="{{ getImageThumb($config_website->logo_header) }}"
                            alt="{{ $config_website->website ?? '' }}"
                        >
                    @else
                        {{ $config_website->website ?? '' }}
                    @endif
                </a>
            </div>

            <button
                type="button"
                class="mobile-nav-close"
                id="mobileNavClose"
                aria-label="Close menu"
            >
                <span class="fa fa-times"></span>
            </button>

        </div>


        <nav class="mobile-menu">
            <ul>
                @foreach ($menus_header as $menu)
                    <li>
                        <a href="{{ $menu->link }}">
                            {{ $menu->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

    </aside>

</header>


<style>
    /* ==================================================
       HEADER GENERAL
    ================================================== */

    .main-header {
        position: sticky;
        top: 0;
        left: 0;

        width: 100%;

        z-index: 9999;

        background: #fff;

        transition:
            box-shadow 0.25s ease,
            background-color 0.25s ease;
    }

    .main-header.is-scrolled {
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.10);
    }


    /* ==================================================
       DESKTOP
    ================================================== */

    .desktop-header {
        display: flex;
        align-items: center;
    }

    .mobile-header,
    .mobile-navigation,
    .mobile-nav-overlay {
        display: none;
    }


    /* ==================================================
       MOBILE
    ================================================== */

    @media (max-width: 991px) {

        /* ------------------------------
           HIDE DESKTOP
        ------------------------------ */

        .desktop-header {
            display: none !important;
        }


        /* ------------------------------
           MOBILE HEADER
        ------------------------------ */

        .mobile-header {
            display: block;

            width: 100%;

            position: relative;

            z-index: 1001;

            background: #fff;

            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        }

        .mobile-header-inner {
            width: 100%;
            min-height: 64px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 8px 15px;
        }


        /* ------------------------------
           LOGO
        ------------------------------ */

        .mobile-header .logo {
            flex: 1;
            min-width: 0;
        }

        .mobile-header .logo a {
            display: inline-flex;
            align-items: center;

            max-width: calc(100vw - 80px);

            color: #222;
            text-decoration: none;
        }

        .mobile-header .logo img {
            display: block;

            width: auto;

            max-width: 150px;
            max-height: 48px;

            object-fit: contain;
        }

        .mobile-post-title {
            display: block;

            max-width: calc(100vw - 90px);

            font-size: 16px;
            font-weight: 600;
            line-height: 1.4;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        /* ------------------------------
           HAMBURGER BUTTON
        ------------------------------ */

        .mobile-nav-toggler {
            width: 44px;
            height: 44px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0;

            border: 0;
            outline: none;

            background: transparent;

            color: #222;

            font-size: 24px;

            cursor: pointer;
        }

        .mobile-nav-toggler:focus {
            outline: none;
        }


        /* ------------------------------
           OVERLAY
        ------------------------------ */

        .mobile-nav-overlay {
            display: block;

            position: fixed;
            inset: 0;

            width: 100%;
            height: 100%;

            background: rgba(0, 0, 0, 0.45);

            opacity: 0;
            visibility: hidden;

            z-index: 10000;

            transition:
                opacity 0.3s ease,
                visibility 0.3s ease;
        }

        .mobile-nav-overlay.active {
            opacity: 1;
            visibility: visible;
        }


        /* ------------------------------
           MOBILE DRAWER
        ------------------------------ */

        .mobile-navigation {
            display: flex;
            flex-direction: column;

            position: fixed;

            top: 0;
            right: 0;

            width: min(85vw, 340px);
            height: 100dvh;

            background: #fff;

            z-index: 10001;

            transform: translateX(100%);

            transition: transform 0.3s ease;

            overflow-y: auto;

            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.15);
        }

        .mobile-navigation.active {
            transform: translateX(0);
        }


        /* ------------------------------
           DRAWER HEADER
        ------------------------------ */

        .mobile-navigation-header {
            min-height: 70px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 12px 16px;

            border-bottom: 1px solid #eee;
        }

        .mobile-navigation-logo {
            flex: 1;
            min-width: 0;
        }

        .mobile-navigation-logo a {
            display: inline-flex;
            align-items: center;

            color: #222;
            text-decoration: none;
        }

        .mobile-navigation-logo img {
            display: block;

            width: auto;

            max-width: 130px;
            max-height: 45px;

            object-fit: contain;
        }


        /* ------------------------------
           CLOSE BUTTON
        ------------------------------ */

        .mobile-nav-close {
            width: 40px;
            height: 40px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0;

            border: 0;
            outline: none;

            background: transparent;

            color: #222;

            font-size: 22px;

            cursor: pointer;
        }


        /* ------------------------------
           MOBILE MENU
        ------------------------------ */

        .mobile-menu {
            width: 100%;
            flex: 1;
        }

        .mobile-menu ul {
            margin: 0;
            padding: 0;

            list-style: none;
        }

        .mobile-menu li {
            margin: 0;
            padding: 0;

            border-bottom: 1px solid #eee;
        }

        .mobile-menu li a {
            display: flex;
            align-items: center;

            width: 100%;

            padding: 15px 18px;

            color: #222;
            text-decoration: none;

            font-size: 15px;
            font-weight: 500;
            line-height: 1.5;

            transition:
                background-color 0.2s ease,
                color 0.2s ease;
        }

        .mobile-menu li a:hover {
            background: #f6f6f6;
            color: #000;
        }


        /* ------------------------------
           BODY LOCK
        ------------------------------ */

        body.mobile-menu-open {
            overflow: hidden;
            touch-action: none;
        }

    }


    /* ==================================================
       DESKTOP ONLY
    ================================================== */

    @media (min-width: 992px) {

        .desktop-header {
            display: flex !important;
        }

        .mobile-header,
        .mobile-navigation,
        .mobile-nav-overlay {
            display: none !important;
        }

    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const header = document.getElementById('mainHeader');

        const toggle = document.getElementById('mobileNavToggle');
        const closeButton = document.getElementById('mobileNavClose');

        const navigation = document.getElementById('mobileNavigation');
        const overlay = document.getElementById('mobileNavOverlay');


        /* ==================================================
           HEADER STICKY SHADOW
        ================================================== */

        function handleHeaderScroll() {

            if (!header) {
                return;
            }

            if (window.scrollY > 20) {

                header.classList.add('is-scrolled');

            } else {

                header.classList.remove('is-scrolled');

            }

        }


        handleHeaderScroll();


        window.addEventListener(
            'scroll',
            handleHeaderScroll,
            {
                passive: true
            }
        );


        /* ==================================================
           CHECK MOBILE ELEMENTS
        ================================================== */

        if (!toggle || !navigation || !overlay) {
            return;
        }


        /* ==================================================
           OPEN MOBILE MENU
        ================================================== */

        function openMobileMenu() {

            navigation.classList.add('active');

            overlay.classList.add('active');

            document.body.classList.add('mobile-menu-open');

            toggle.setAttribute(
                'aria-expanded',
                'true'
            );

            navigation.setAttribute(
                'aria-hidden',
                'false'
            );

        }


        /* ==================================================
           CLOSE MOBILE MENU
        ================================================== */

        function closeMobileMenu() {

            navigation.classList.remove('active');

            overlay.classList.remove('active');

            document.body.classList.remove('mobile-menu-open');

            toggle.setAttribute(
                'aria-expanded',
                'false'
            );

            navigation.setAttribute(
                'aria-hidden',
                'true'
            );

        }


        /* ==================================================
           CLICK HAMBURGER
        ================================================== */

        toggle.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                event.stopPropagation();


                if (
                    navigation.classList.contains('active')
                ) {

                    closeMobileMenu();

                } else {

                    openMobileMenu();

                }

            }
        );


        /* ==================================================
           CLICK CLOSE
        ================================================== */

        if (closeButton) {

            closeButton.addEventListener(
                'click',
                function (event) {

                    event.preventDefault();

                    closeMobileMenu();

                }
            );

        }


        /* ==================================================
           CLICK OVERLAY
        ================================================== */

        overlay.addEventListener(
            'click',
            function () {

                closeMobileMenu();

            }
        );


        /* ==================================================
           PRESS ESC
        ================================================== */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape' &&
                    navigation.classList.contains('active')
                ) {

                    closeMobileMenu();

                }

            }
        );


        /* ==================================================
           CLICK MOBILE MENU ITEM
        ================================================== */

        const mobileMenuLinks =
            navigation.querySelectorAll('.mobile-menu a');


        mobileMenuLinks.forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    closeMobileMenu();

                }
            );

        });


        /* ==================================================
           RESIZE MOBILE -> DESKTOP
        ================================================== */

        window.addEventListener(
            'resize',
            function () {

                if (window.innerWidth >= 992) {

                    closeMobileMenu();

                }

            }
        );

    });
</script>
