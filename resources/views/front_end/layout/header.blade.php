@php
    $menus_header = getMenuParent(0, 0);
@endphp

<header id="header">
    <div class="wdt-elementor-container-fluid">
        <div id="header-16" class="wdt-header-tpl header-16">
            <div class="elementor elementor-16">
                <section
                    class="elementor-section elementor-inner-section elementor-element elementor-element-6ee10e6 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-col-50 ele-header elementor-inner-column elementor-element">

                            <div class="elementor-widget-container container-mobile">
                                @if (!empty($post))
                                    <a href="{{ route('post', [$post->slug]) }}" class="show hide-scroll">
                                        <div class="logo">{{ $post->title }}</div>
                                    </a> 
                                @else
                                    <a href="{{ url('/') }}" class="show_mobi  show-scroll">
                                        <img style="max-height: 60px;" src="{!! getImageThumb($config_website?->logo) !!}" id="logo"
                                            alt="{{ $config_website?->website }}">
                                    </a>
                                @endif


                            </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-c3bec27"
                            data-id="c3bec27" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-0da02c4 elementor-widget__width-auto wdt-custom-menu-style elementor-widget elementor-widget-wdt-header-menu"
                                    data-id="0da02c4" data-element_type="widget"
                                    data-widget_type="wdt-header-menu.default">
                                    <div class="elementor-widget-container">
                                        <div class="wdt-header-menu" data-menu="62">
                                            <div class="menu-container">
                                                <ul id="menu-new-menu-2" class="wdt-primary-nav " data-menu="62">
                                                    <li class="close-nav"><a href="javascript:void(0);">X</a></li>
                                                    <li id="menu-item-2877"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2877 menu-item-depth-0">
                                                        <a href="/" aria-current="page"><span
                                                                data-text="Home">Home</span></a>
                                                    </li>

                                                    <li id="menu-item-2744"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2744 menu-item-depth-0">
                                                        <a href="#about"><span data-text="About">About</span></a>
                                                    </li>
                                                    <li id="menu-item-2757"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2757 menu-item-depth-0">
                                                        <a href="#gallery"><span
                                                                data-text="Contact Us">Photos</span></a>
                                                    </li>
                                                    <li id="menu-item-2755"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2755 menu-item-depth-0">
                                                        <a href="#comment"><span data-text="Blog">Review</span></a>
                                                    </li>
                                                    <li id="menu-item-2755"
                                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2755 menu-item-depth-0">
                                                        <a href="#location"><span data-text="Blog">Location</span></a>
                                                    </li>
                                                </ul>
                                                <div class="sub-menu-overlay"></div>
                                            </div>
                                            <div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="62">
                                                <a href="#" class="menu-trigger menu-trigger-icon"
                                                    data-menu="62"><i></i><span>Menu</span></a>

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
</header>

<script>
     
    // window.addEventListener('scroll', function() {
    //     scrollShowHide();
    // });

    // // Ẩn ban đầu nếu cần
    // document.addEventListener('DOMContentLoaded', function() {
    //     scrollShowHide()
    // });
</script>
