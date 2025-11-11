@extends('front_end._index')

@section('content')
    <div id="content" class="section content-wrap">
        <script type="application/ld+json"> { "@context": "https://schema.org", "@type": "BreadcrumbList", "itemListElement": [{ "@type": "ListItem", "position": 1, "item": { "@id": "https://tradr-sam.restaurants-world.com/", "name": "Home" } }, { "@type": "ListItem", "position": 2, "item": { "@id": "https://tradr-sam.restaurants-world.com/location.html", "name": "Location" } }] } </script>
        <div class="container clearfix">
            <div class="box-wrap-top hot-box-wrap clearfix">
                <ul class="rs feature-slides slick-initialized slick-slider slick-dotted">
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 1170px; transform: translate3d(0px, 0px, 0px);">
                            <li class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false"
                                style="width: 1170px;" tabindex="0" role="tabpanel" id="slick-slide00"
                                aria-describedby="slick-slide-control00">
                                <div class="item-slide">
                                    <div class="item-banner"> <img class="img-item-slide"
                                            src="https://tradr-sam.restaurants-world.com/public/media/tradr-sam/7.png"
                                            alt="Banner Chung" width="100%"> </div>
                                </div>
                            </li>
                        </div>
                    </div>
                    <ul class="slick-dots" role="tablist" style="display: none;">
                        <li class="slick-active" role="presentation"><button type="button" role="tab"
                                id="slick-slide-control00" aria-controls="slick-slide00" aria-label="1 of 1" tabindex="0"
                                aria-selected="true">1</button></li>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="container tabs clearfix">
            <div class="block-menu-tab">
                <div class="block-menu-wrap clearfix">
                    <div class="tab-menu icon12 none "
                        onclick="window.location.href='{{ route('about') }}'">
                        <div class=" title fs-16 fc-blue3 fwb"><a
                                href="{{ route('about') }}">{{ __('config.config_data.title_about') }}</a></div>
                    </div>
                    <div class="tab-menu icon11 active "
                        onclick="window.location.href='{{ route('location') }}'">
                        <div class=" title fs-16 fc-blue3 fwb"><a
                                href="{{ route('location') }}">{{ __('config.config_data.title_location') }}</a>
                        </div>
                    </div>
                    <div class="tab-menu icon10 none "
                        onclick="window.location.href='{{ route('review') }}'">
                        <div class=" title fs-16 fc-blue3 fwb"><a
                                href="{{ route('review') }}">{{ __('config.config_data.title_review') }}</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container clearfix">
            @yield('content_page')
        </div>
        <div class="modal fade" id="viewMapModal" role="dialog">
            <div class="modal-dialog login-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="map_canvas_restaurants" class="map" style="width: 100%; height: 100%;"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
