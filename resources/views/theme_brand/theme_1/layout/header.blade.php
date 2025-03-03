@php
    $menus_header = getMenuParent(0, 0);
@endphp

<div id="header-wrapper" class="header-top-absolute">
    <!-- **Header** -->
    <header id="header">
        <div class="wdt-elementor-container-fluid">
            <div id="header-16" class="wdt-header-tpl header-16">
                <div data-elementor-type="wp-post" data-elementor-id="16" class="elementor elementor-16"
                    data-elementor-post-type="wdt_headers">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-1d3f0ff elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                        data-id="1d3f0ff" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b3dc106"
                                data-id="b3dc106" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-a670b9c e-grid-align-left elementor-shape-rounded elementor-grid-0 elementor-widget elementor-widget-social-icons"
                                        data-id="a670b9c" data-element_type="widget"
                                        data-widget_type="social-icons.default">
                                        <div class="elementor-widget-container">
                                            @if (!empty($config_social))
                                                <div class="elementor-social-icons-wrapper elementor-grid">
                                                    @if (!empty($config_social->facebook))
                                                        <span class="elementor-grid-item">
                                                            <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-5dd8ff2"
                                                                href="{{ $config_social->facebook }}" target="_blank">
                                                                <span class="elementor-screen-only">Facebook</span>
                                                                <svg class="e-font-icon-svg e-fab-facebook"
                                                                    viewBox="0 0 512 512"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                                                                    </path>
                                                                </svg> </a>
                                                        </span>
                                                    @endif
                                                    @if (!empty($config_social->instagram))
                                                        <span class="elementor-grid-item">
                                                            <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-5f446a5"
                                                                href="{{ $config_social->instagram }}"
                                                                target="_blank">
                                                                <span class="elementor-screen-only">Instagram</span>
                                                                <svg class="e-font-icon-svg e-fab-instagram"
                                                                    viewBox="0 0 448 512"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                                                    </path>
                                                                </svg> </a>
                                                        </span>
                                                    @endif
                                                    @if (!empty($config_social->whatsapp))
                                                        <span class="elementor-grid-item">
                                                            <a class="elementor-icon elementor-social-icon elementor-social-icon-whatsapp elementor-repeater-item-4847f11"
                                                                href="{{ $config_social->whatsapp }}" target="_blank">
                                                                <span class="elementor-screen-only">Whatsapp</span>
                                                                <svg class="e-font-icon-svg e-fab-whatsapp"
                                                                    viewBox="0 0 448 512"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
                                                                    </path>
                                                                </svg> </a>
                                                        </span>
                                                    @endif

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2adc6ad"
                                data-id="2adc6ad" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-39b940d elementor-position-left elementor-widget__width-initial elementor-hidden-tablet elementor-hidden-mobile elementor-view-default elementor-mobile-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box"
                                        data-id="39b940d" data-element_type="widget"
                                        data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">

                                                <div class="elementor-icon-box-icon">
                                                    <a href="https://booksy.com/en-gb/144837_isha-nails-and-beauty-shorditch_nail-salon_311817_london?do=invite&amp;_branch_match_id=1385333577996626525&amp;utm_medium=profile_share_from_profile_completeness&amp;_branch_referrer=H4sIAAAAAAAAA8soKSkottLXT07J0UvKz88urtRLzs%2FVLwo3dzQq9jcp9k%2ByrytKTUstKsrMS49PKsovL04tsnXOKMrPTQUAWh9DZjwAAAA%3D"
                                                        class="elementor-icon" tabindex="-1">
                                                        <svg aria-hidden="true"
                                                            class="e-font-icon-svg e-far-calendar-alt"
                                                            viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z">
                                                            </path>
                                                        </svg> </a>
                                                </div>

                                                <div class="elementor-icon-box-content">


                                                    <p class="elementor-icon-box-description">
                                                        Book Appointment </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-70f6f45 animated-fast elementor-section-full_width elementor-hidden-mobile elementor-section-height-default elementor-section-height-default elementor-invisible"
                        data-id="70f6f45" data-element_type="section"
                        data-settings="{&quot;animation&quot;:&quot;fadeIn&quot;,&quot;animation_delay&quot;:100,&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2ce434f"
                                data-id="2ce434f" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-6ee10e6 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default"
                                        data-id="6ee10e6" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-179032a"
                                                data-id="179032a" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-ec95532 elementor-widget elementor-widget-image"
                                                        data-id="ec95532" data-element_type="widget"
                                                        data-widget_type="image.default">
                                                        <div class="elementor-widget-container">
                                                            <a href="{{ url('/') }}">

                                                                <img loading="lazy" width="407" height="184"
                                                                    src="{{ convertPathImage($config_website->logo ?? '') }}"
                                                                    class="elementor-animation-grow attachment-large size-large wp-image-2801"
                                                                    alt="{{ $config_website->website ?? '' }}"
                                                                    srcset="{{ convertPathImage($config_website->logo ?? '') }} 407w, {{ convertPathImage($config_website->logo ?? '') }} 300w"
                                                                    sizes="(max-width: 407px) 100vw, 407px" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-c3bec27"
                                                data-id="c3bec27" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-0da02c4 elementor-widget__width-auto wdt-custom-menu-style elementor-widget elementor-widget-wdt-header-menu"
                                                        data-id="0da02c4" data-element_type="widget"
                                                        data-widget_type="wdt-header-menu.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="wdt-header-menu" data-menu="62">
                                                                <div class="menu-container">
                                                                    <ul id="menu-new-menu-3" class="wdt-primary-nav "
                                                                        data-menu="62">

                                                                        <li class="close-nav"><a
                                                                                href="javascript:void(0);"></a>
                                                                        </li>

                                                                        @foreach ($menus_header as $menu)
                                                                            @php
                                                                                $childs = getMenuParent($menu->id, 0);
                                                                            @endphp
                                                                            @if (empty($childs))
                                                                                <li
                                                                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2877 menu-item-depth-0">
                                                                                    <a href="{{ $menu->link }}"
                                                                                        aria-current="page"><span
                                                                                            data-text="Home">
                                                                                            {{ $menu->title }}</span></a>
                                                                                </li>
                                                                            @else
                                                                                <li
                                                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2752 menu-item-depth-0">
                                                                                    <a href="#">
                                                                                        <span
                                                                                            data-text="Spa Treatments">
                                                                                            {{ $menu->title }}</span>
                                                                                    </a>
                                                                                    <ul class="sub-menu is-hidden">
                                                                                        <li class="close-nav"><a
                                                                                                href="javascript:void(0);"></a>
                                                                                        </li>
                                                                                        <li class="go-back"><a
                                                                                                href="javascript:void(0);"></a>
                                                                                        </li>
                                                                                        <li class="see-all"></li>
                                                                                        @foreach ($childs as $child)
                                                                                            <li
                                                                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2882 menu-item-depth-1">
                                                                                                <a
                                                                                                    href="{{ $child->link }}"><span
                                                                                                        data-text="Hair Care">{{ $child->title }}</span></a>
                                                                                            </li>
                                                                                        @endforeach

                                                                                    </ul>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                    <div class="sub-menu-overlay"></div>
                                                                </div>
                                                                <div class="mobile-nav-container mobile-nav-offcanvas-right"
                                                                    data-menu="62"><a href="#"
                                                                        class="menu-trigger menu-trigger-icon"
                                                                        data-menu="62"><i></i><span>Menu</span></a>
                                                                    <div class="mobile-menu" data-menu="62"></div>
                                                                    <div class="overlay"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-e6bb765"
                                                data-id="e6bb765" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-bb483ca elementor-align-right elementor-widget__width-auto wdt-header-icon-style elementor-hidden-mobile elementor-widget elementor-widget-wdt-header-icons"
                                                        data-id="bb483ca" data-element_type="widget"
                                                        data-widget_type="wdt-header-icons.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="woocommerce">
                                                                <div class="wdt-header-icons-list">
                                                                    <div class="wdt-header-icons-list-item cart-item">
                                                                        <div class="wdt-shop-menu-icon"><a
                                                                                href="/"><span
                                                                                    class="wdt-shop-menu-icon-wrapper"><span
                                                                                        class="wdt-shop-menu-cart-inner"><span
                                                                                            class="wdt-shop-menu-cart-icon"><i><svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                    x="0px" y="0px"
                                                                                                    viewBox="0 0 100 100"
                                                                                                    style="enable-background:new 0 0 100 100;"
                                                                                                    xml:space="preserve">
                                                                                                    <path
                                                                                                        d="M75.6,99.5c-0.1,0-0.2,0-0.2,0H24.7c-3.5,0.1-7.1-1.3-9.7-3.9s-4.1-6-4.2-9.6c0-0.3,0-0.7,0-1.1l4.7-56.1 c0.4-4.4,4-7.8,8.5-7.8H76c4.4,0,8.1,3.4,8.5,7.8l4.7,56.1c0.2,3.7-1,7.3-3.4,10c-2.4,2.7-5.8,4.4-9.4,4.6 C76.1,99.5,75.9,99.5,75.6,99.5z M24,27.8c-0.9,0-1.6,0.7-1.7,1.6l-4.7,56.1c0,2.3,0.8,4.1,2.1,5.4c1.3,1.3,3,2,5,1.9h50.8 c0,0,0.1,0,0.1,0l0.4,0c1.9-0.1,3.6-1,4.8-2.3c1.2-1.4,1.8-3.2,1.7-5l-4.7-56c-0.1-0.9-0.8-1.6-1.7-1.6H24z">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M65.4,43.1c-1.9,0-3.4-1.5-3.4-3.4V14.1c0-3.8-3.1-6.9-6.9-6.9H44.9c-3.8,0-6.9,3.1-6.9,6.9v25.6c0,1.9-1.5,3.4-3.4,3.4 s-3.4-1.5-3.4-3.4V14.1c0-7.5,6.1-13.6,13.6-13.6h10.2c7.5,0,13.6,6.1,13.6,13.6v25.6C68.8,41.6,67.3,43.1,65.4,43.1z">
                                                                                                    </path>
                                                                                                </svg></i></span><span
                                                                                            class="wdt-shop-menu-cart-number">0</span></span><span
                                                                                        class="wdt-shop-menu-cart-totals"></span></span></a>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="wdt-header-icons-list-item wishlist-item">
                                                                        <div class="wdt-wishlist-menu-icon">
                                                                            <a href="/"><span><i><svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            x="0px" y="0px"
                                                                                            viewBox="0 0 100 100"
                                                                                            style="enable-background:new 0 0 100 100;"
                                                                                            xml:space="preserve">
                                                                                            <path
                                                                                                d="M49.8,93.8c-4.9,0-9.9-1.7-13.8-5.1C6.9,63-3.9,42.4,3,25.7C6.5,16.3,14.3,9.1,24,6.5c12-2.1,21.7,5.9,26,10.3 c4.3-4.4,13.8-12.1,25.7-10.1c9.9,2.4,17.7,9.4,21.3,18.7c6.8,16.7-4.1,37.4-33.4,63.3C59.7,92.1,54.7,93.8,49.8,93.8z M28.1,12.1 c-0.9,0-1.8,0.1-2.8,0.2c-7.5,2.1-13.9,7.9-16.7,15.5C2.8,42,13,60.4,39.9,84.2c5.6,4.9,14.1,4.9,19.7,0 c26.8-23.7,37.5-42.7,31.8-56.6c-2.9-7.5-9.2-13.1-17-15c-11.9-2-21.7,10.1-22.1,10.6c-1.1,1.4-3.6,1.4-4.7,0 C46.7,22,38.6,12.1,28.1,12.1z">
                                                                                            </path>
                                                                                        </svg></i><span
                                                                                        class="icotype-label">Wishlist</span><span
                                                                                        class="wdt-wishlist-count">
                                                                                        0</span></span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-61e5467 elementor-widget__width-initial elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon"
                                                        data-id="61e5467" data-element_type="widget"
                                                        data-widget_type="icon.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-icon-wrapper">
                                                                <a class="elementor-icon"
                                                                    href="/">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 100 100"
                                                                        style="enable-background:new 0 0 100 100;"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M50,42c-11.3,0-20.5-9.2-20.5-20.5S38.7,1,50,1c11.3,0,20.5,9.2,20.5,20.5S61.3,42,50,42z M50,7.8 c-7.5,0-13.7,6.1-13.7,13.7S42.5,35.2,50,35.2S63.7,29,63.7,21.5S57.5,7.8,50,7.8z">
                                                                        </path>
                                                                        <path
                                                                            d="M72.8,99H27.2c-8.2,0-14.8-6.6-14.8-14.8v-5.7c0-14.4,11.7-26.2,26.2-26.2h22.8c0,0,0,0,0,0c7,0,13.6,2.7,18.5,7.7 c5,4.9,7.7,11.5,7.7,18.5v5.7C87.6,92.4,81,99,72.8,99z M38.6,59.1c-10.7,0-19.4,8.7-19.4,19.4v5.7c0,4.4,3.6,8,8,8h45.6 c4.4,0,8-3.6,8-8v-5.7c0-5.2-2-10.1-5.7-13.7c-3.7-3.7-8.5-5.7-13.7-5.7c0,0,0,0,0,0H38.6z">
                                                                        </path>
                                                                    </svg> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-8b5cf9e animated-fast elementor-section-full_width elementor-hidden-desktop elementor-hidden-tablet elementor-section-height-default elementor-section-height-default elementor-invisible"
                        data-id="8b5cf9e" data-element_type="section"
                        data-settings="{&quot;animation&quot;:&quot;fadeIn&quot;,&quot;animation_delay&quot;:100,&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6393c2b"
                                data-id="6393c2b" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-f7e3bd6 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default"
                                        data-id="f7e3bd6" data-element_type="section"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-cc107b0"
                                                data-id="cc107b0" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-16ca706 elementor-widget elementor-widget-image"
                                                        data-id="16ca706" data-element_type="widget"
                                                        data-widget_type="image.default">
                                                        <div class="elementor-widget-container">
                                                            <img loading="lazy" width="407" height="184"
                                                                src="/wp-content/uploads/2023/06/Isha_Beauty__1_-removebg-preview11-1.png"
                                                                class="attachment-large size-large wp-image-2801"
                                                                alt=""
                                                                srcset="https://ishabeauty.com//wp-content/uploads/2023/06/Isha_Beauty__1_-removebg-preview11-1.png 407w, https://ishabeauty.com//wp-content/uploads/2023/06/Isha_Beauty__1_-removebg-preview11-1-300x136.png 300w"
                                                                sizes="(max-width: 407px) 100vw, 407px" />
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-5fbaa46 elementor-widget__width-auto wdt-custom-menu-style elementor-widget elementor-widget-wdt-header-menu"
                                                        data-id="5fbaa46" data-element_type="widget"
                                                        data-widget_type="wdt-header-menu.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="wdt-header-menu" data-menu="0">
                                                                <div class="menu-container">
                                                                    <ul id="menu-main-menu-1" class="wdt-primary-nav "
                                                                        data-menu="0">
                                                                        <li class="close-nav"><a
                                                                                href="javascript:void(0);"></a>
                                                                        </li>

                                                                        @foreach ($menus_header as $menu)
                                                                            @php
                                                                                $childs = getMenuParent($menu->id, 0);
                                                                            @endphp
                                                                            @if (empty($childs))
                                                                                <li
                                                                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2953 menu-item-depth-0">
                                                                                    <a href="{{$menu->link}}"
                                                                                        aria-current="page"><span
                                                                                            data-text="Home">
                                                                                            {{ $menu->title }}</span></a>
                                                                                </li>
                                                                            @else
                                                                                <li
                                                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2080 menu-item-depth-0">
                                                                                    <a href="#">
                                                                                        <span
                                                                                            data-text="Spa Treatments">
                                                                                            {{ $menu->title }}</span>
                                                                                    </a>


                                                                                    <ul class="sub-menu is-hidden">
                                                                                        <li class="close-nav"><a
                                                                                                href="javascript:void(0);"></a>
                                                                                        </li>
                                                                                        <li class="go-back"><a
                                                                                                href="javascript:void(0);"></a>
                                                                                        </li>
                                                                                        <li class="see-all"></li>

                                                                                        @foreach ($childs as $child)
                                                                                            <li
                                                                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2116 menu-item-depth-1">
                                                                                                <a
                                                                                                    href="{{ $child->link }}"><span
                                                                                                        data-text="Hair Care">{{ $child->title }}</span></a>
                                                                                            </li>
                                                                                        @endforeach

                                                                                    </ul>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                    <div class="sub-menu-overlay"></div>
                                                                </div>
                                                                <div class="mobile-nav-container mobile-nav-offcanvas-right"
                                                                    data-menu="0"><a href="#"
                                                                        class="menu-trigger menu-trigger-icon"
                                                                        data-menu="0"><i></i><span>Menu</span></a>
                                                                    <div class="mobile-menu" data-menu="0"></div>
                                                                    <div class="overlay"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-169f9b0 elementor-align-right elementor-widget__width-auto wdt-header-icon-style elementor-widget elementor-widget-wdt-header-icons"
                                                        data-id="169f9b0" data-element_type="widget"
                                                        data-widget_type="wdt-header-icons.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="woocommerce">
                                                                <div class="wdt-header-icons-list">
                                                                    <div class="wdt-header-icons-list-item cart-item">
                                                                        <div class="wdt-shop-menu-icon"><a
                                                                                href="/"><span
                                                                                    class="wdt-shop-menu-icon-wrapper"><span
                                                                                        class="wdt-shop-menu-cart-inner"><span
                                                                                            class="wdt-shop-menu-cart-icon"><i><svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                    x="0px" y="0px"
                                                                                                    viewBox="0 0 100 100"
                                                                                                    style="enable-background:new 0 0 100 100;"
                                                                                                    xml:space="preserve">
                                                                                                    <path
                                                                                                        d="M75.6,99.5c-0.1,0-0.2,0-0.2,0H24.7c-3.5,0.1-7.1-1.3-9.7-3.9s-4.1-6-4.2-9.6c0-0.3,0-0.7,0-1.1l4.7-56.1 c0.4-4.4,4-7.8,8.5-7.8H76c4.4,0,8.1,3.4,8.5,7.8l4.7,56.1c0.2,3.7-1,7.3-3.4,10c-2.4,2.7-5.8,4.4-9.4,4.6 C76.1,99.5,75.9,99.5,75.6,99.5z M24,27.8c-0.9,0-1.6,0.7-1.7,1.6l-4.7,56.1c0,2.3,0.8,4.1,2.1,5.4c1.3,1.3,3,2,5,1.9h50.8 c0,0,0.1,0,0.1,0l0.4,0c1.9-0.1,3.6-1,4.8-2.3c1.2-1.4,1.8-3.2,1.7-5l-4.7-56c-0.1-0.9-0.8-1.6-1.7-1.6H24z">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M65.4,43.1c-1.9,0-3.4-1.5-3.4-3.4V14.1c0-3.8-3.1-6.9-6.9-6.9H44.9c-3.8,0-6.9,3.1-6.9,6.9v25.6c0,1.9-1.5,3.4-3.4,3.4 s-3.4-1.5-3.4-3.4V14.1c0-7.5,6.1-13.6,13.6-13.6h10.2c7.5,0,13.6,6.1,13.6,13.6v25.6C68.8,41.6,67.3,43.1,65.4,43.1z">
                                                                                                    </path>
                                                                                                </svg></i></span><span
                                                                                            class="wdt-shop-menu-cart-number">0</span></span><span
                                                                                        class="wdt-shop-menu-cart-totals"></span></span></a>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="wdt-header-icons-list-item wishlist-item">
                                                                        <div class="wdt-wishlist-menu-icon">
                                                                            <a href="/"><span><i><svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            x="0px" y="0px"
                                                                                            viewBox="0 0 100 100"
                                                                                            style="enable-background:new 0 0 100 100;"
                                                                                            xml:space="preserve">
                                                                                            <path
                                                                                                d="M49.8,93.8c-4.9,0-9.9-1.7-13.8-5.1C6.9,63-3.9,42.4,3,25.7C6.5,16.3,14.3,9.1,24,6.5c12-2.1,21.7,5.9,26,10.3 c4.3-4.4,13.8-12.1,25.7-10.1c9.9,2.4,17.7,9.4,21.3,18.7c6.8,16.7-4.1,37.4-33.4,63.3C59.7,92.1,54.7,93.8,49.8,93.8z M28.1,12.1 c-0.9,0-1.8,0.1-2.8,0.2c-7.5,2.1-13.9,7.9-16.7,15.5C2.8,42,13,60.4,39.9,84.2c5.6,4.9,14.1,4.9,19.7,0 c26.8-23.7,37.5-42.7,31.8-56.6c-2.9-7.5-9.2-13.1-17-15c-11.9-2-21.7,10.1-22.1,10.6c-1.1,1.4-3.6,1.4-4.7,0 C46.7,22,38.6,12.1,28.1,12.1z">
                                                                                            </path>
                                                                                        </svg></i><span
                                                                                        class="icotype-label">Wishlist</span><span
                                                                                        class="wdt-wishlist-count">
                                                                                        0</span></span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </header> <!-- **Header - End ** -->

    <!-- ** Slider ** -->

    <!-- ** Slider End ** -->

    <!-- ** Breadcrumb ** -->
    <!-- ** Breadcrumb End ** -->

</div>
