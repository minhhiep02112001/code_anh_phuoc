 @php
     $banners = !empty($medias['banner']) ? $medias['banner'] : [];
     $photos = !empty($medias['photo']) ? $medias['photo'] : [];
 @endphp
 @extends('front_end._index')
 @section('content')
     <div class="wdt-elementor-container-fluid elementor elementor-2632">
         <section class="elementor-section" data-id="35535b0" data-element_type="section">
             <div class="homebanners">
                 @foreach ($banners as $k => $item)
                     @php
                         // Tạo mảng ảnh responsive 400, 800, 1200px, chiều cao 400 cố định, crop true
                         $thumbs = getImageThumbsResponsive($item->thumbnail, [400, 800, 1200], 400, true);
                     @endphp

                     <div class="block-item">
                         <div class="banner-box text-center">
                             <img src="{{ $thumbs[800] ?? ($thumbs[400] ?? asset('assets/default.png')) }}"
                                 srcset="{{ $thumbs[400] ?? '' }} 400w, {{ $thumbs[800] ?? '' }} 800w, {{ $thumbs[1200] ?? '' }} 1200w"
                                 sizes="(max-width: 600px) 400px, (max-width: 900px) 800px, 1200px"
                                 alt="Banner {{ $k }}" width="1200" height="400" class="banner-img">

                             <div class="overlay"></div>

                             {{-- @if (!empty($post->content_banner)) --}}
                             <div class="banner-content">
                                @if($k == 0)
                                    <h1 class="text-center title_banner">{{ replaceContentBanner($post) }}</h1>
                                    @else
                                    <div class="text-center title_banner">{{ replaceContentBanner($post) }}</div>

                                    @endif 
                                 <a href="#" class="cta-button btn btn-outline btn--bordered btn--white">BOOK
                                     NOW</a>
                             </div>
                             {{-- @endif --}}
                         </div>
                     </div>
                 @endforeach
             </div>
         </section>

         <section id="about" class="elementor-padding elementor-section  ">

             <div class="elementor-column-gap-default">
                 <h2 class="elementor-heading-title  text-center">
                     {!! "Welcome To {$post->title}" !!}
                 </h2>

                 <div style="">
                     <div class="elementor-widget-divider">
                         <div class="elementor-divider">
                             <span class="elementor-divider-separator"></span>
                         </div>
                     </div>

                     <section class="elementor-inner-section elementor-section-full_width">
                         <p class="markdown prose text-justify w-full break-words dark:prose-invert">
                             {!! replaceContent($post->description) !!}
                         </p>
                     </section>

                     <div class="elementor-widget-divider">
                         <div class="elementor-divider">
                             <span class="elementor-divider-separator"></span>
                         </div>
                     </div>
                 </div>
             </div>
         </section>

         <section
             class="elementor-section elementor-padding elementor-inner-section elementor-element elementor-element-6d3b147 elementor-reverse-mobile   elementor-section-boxed elementor-section-height-default elementor-section-height-default">
             <div class="elementor-widget-wrap elementor-element-populated d-flex justify-content-center flex-warp">
                 <div class="elementor-icon-box-wrapper p-2">

                     <div class="elementor-icon-box-icon">
                         <img src="{{ asset('assets/images/icon_1.png') }}" loading="lazy" width="100" height="100"
                             alt=" New Consultation">
                     </div>

                     <div class="elementor-icon-box-content">
                         <p class="elementor-icon-box-description">
                             New Consultation </p>
                     </div>
                 </div>
                 <div class="elementor-icon-box-wrapper p-2">
                     <div class="elementor-icon-box-icon">
                         <img src="{{ asset('assets/images/icon_2.png') }}" loading="lazy" width="100" height="100"
                             alt=" All Services">
                     </div>

                     <div class="elementor-icon-box-content">
                         <p class="elementor-icon-box-description">
                             All Services </p>
                     </div>

                 </div>
                 <div class="elementor-icon-box-wrapper p-2">

                     <div class="elementor-icon-box-icon">
                         <img src="{{ asset('assets/images/icon_3.png') }}" loading="lazy" width="100" height="100"
                             alt="Book Appointments">
                     </div>

                     <div class="elementor-icon-box-content">
                         <p class="elementor-icon-box-description">
                             Book Appointments </p>
                     </div>

                 </div>
                 <div class="elementor-icon-box-wrapper p-2">

                     <div class="elementor-icon-box-icon">
                         <span class="elementor-icon">
                             <img src="{{ asset('assets/images/icon_4.png') }}" loading="lazy" width="100" height="100"
                                 alt="Gift Cards ">
                         </span>
                     </div>
                     <div class="elementor-icon-box-content">
                         <p class="elementor-icon-box-description">
                             Gift Cards </p>
                     </div>
                 </div>
             </div>
         </section>
         @if (!empty($post->image_block_1))
             <section id="content_block_1"
                 class="elementor-section elementor-inner-section elementor-element elementor-element-6533d6c4 elementor-reverse-tablet elementor-reverse-mobile elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default">
                 <div
                     class="elementor-column elementor-column-1 elementor-padding elementor-col-50 elementor-inner-column elementor-element elementor-element-7ea6c594 animated-fast ">
                     <div class="elementor-widget-wrap elementor-element-populated">
                         {{-- <h2 class="elementor-heading-title elementor-size-default text-center d-block">
                             {!! $post?->title_block_1 !!}
                         </h2> --}}
                         <div class="elementor-element elementor-element-7b2894d elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                             data-id="7b2894d" data-element_type="widget" data-widget_type="divider.default">
                             <div class="elementor-widget-container">
                                 <div class="elementor-divider">
                                 </div>
                             </div>
                         </div>
                         <div
                             class="elementor-element   elementor-element-d02be1a elementor-widget elementor-widget-text-editor">
                             <div class="elementor-widget-container justify">

                                 {!! replaceContent($post->content_block_1) !!}
                             </div>
                         </div>
                     </div>
                 </div>

                 <div
                     class="elementor-column elementor-column-2 elementor-padding  elementor-col-50 elementor-inner-column elementor-element elementor-element-17aa2697 animated-fast ">
                     <div
                         class="elementor-element elementor-element-164478d animated-fast wdt-custom-hover-image-style elementor-hidden-tablet elementor-widget elementor-widget-image">
                         <div class="elementor-widget-container">
                             <img decoding="async" width="500" height="500" loading="lazy" alt="{{ $post->title }}"
                                 src="{{ getImageThumb($post->image_block_1, 500, 500) }}"
                                 class="attachment-full size-full wp-image-3006" alt="" />
                         </div>
                     </div>
                 </div>
             </section>
         @endif
         @if ($comments->isNotEmpty())
             <section id="comment"
                 class="elementor-padding elementor-section elementor-top-section elementor-element elementor-element-affcef2 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                 data-id="affcef2" data-element_type="section"
                 data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                 <div class="elementor-background-overlay"></div>
                 <div class=" elementor-column-gap-no">
                     <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-26de3ac"
                         data-id="26de3ac" data-element_type="column">
                         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-ee89094 elementor-widget elementor-widget-heading"
                                 data-id="ee89094" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                     <h2 class="elementor-heading-title elementor-size-default">What Our
                                         Clients Say About Us</h2>
                                 </div>
                             </div>
                             <div class="elementor-element elementor-element-c54651d elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                 data-id="c54651d" data-element_type="widget" data-widget_type="divider.default">
                                 <div class="elementor-widget-container">
                                     <div class="elementor-divider">
                                         <span class="elementor-divider-separator">
                                         </span>
                                     </div>
                                 </div>
                             </div>
                             <div class="elementor-element elementor-element-a8bddac elementor-widget elementor-widget-shortcode"
                                 data-id="a8bddac" data-element_type="widget" data-widget_type="shortcode.default">
                                 <div class="elementor-widget-container">
                                     <div class="elementor-shortcode">
                                         <div class="ti-widget ti-goog ti-disable-font ti-review-text-mode-readmore ti-text-align-left"
                                             data-no-translation="true" data-layout-id="4" data-layout-category="slider"
                                             data-set-id="light-background" data-pid="" data-language="en"
                                             data-review-target-width="300" data-css-version="2"
                                             data-review-text-mode="readmore" data-reply-by-locale="Owner's reply"
                                             data-pager-autoplay-timeout="6" data-trustindex-widget="true"
                                             style="">
                                             <div class="ti-widget-container ti-col-5">
                                                 <div class="ti-reviews-container">

                                                     <div class="ti-reviews-container-wrapper sliders">
                                                         @foreach ($comments as $item)
                                                             <div data-empty="0"
                                                                 class="ti-review-item source-Google ti-image-layout-thumbnail"
                                                                 style="position: relative;">
                                                                 <div class="ti-inner">
                                                                     <div class="ti-review-header">

                                                                         <div class="ti-profile-details">
                                                                             <div class="ti-name">
                                                                                 {{ $item->fullname }}
                                                                             </div>
                                                                             <div class="ti-date">
                                                                                 {{ format_date($item->created_at, 'd-m-Y') }}
                                                                             </div>
                                                                         </div>
                                                                     </div> <span class="ti-stars">

                                                                         <img class="ti-star"
                                                                             src="{{ asset('images/f.svg') }}"
                                                                             alt="Google" width="17" height="17"
                                                                             loading="lazy">
                                                                         <img class="ti-star"
                                                                             src="{{ asset('images/f.svg') }}"
                                                                             alt="Google" width="17" height="17"
                                                                             loading="lazy"><img class="ti-star"
                                                                             src="{{ asset('images/f.svg') }}"
                                                                             alt="Google" width="17" height="17"
                                                                             loading="lazy"><img class="ti-star"
                                                                             src="{{ asset('images/f.svg') }}"
                                                                             alt="Google" width="17" height="17"
                                                                             loading="lazy"><img class="ti-star"
                                                                             src="{{ asset('images/f.svg') }}"
                                                                             alt="Google" width="17" height="17"
                                                                             loading="lazy"></span>
                                                                     <div class="ti-review-text-container justify ti-review-content line-clamp-3"
                                                                         style="height: 87px !important;"
                                                                         data-initial-height="87"
                                                                         data-expanded-height="261">
                                                                         {!! $item->content ?? '' !!}
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         @endforeach
                                                     </div>
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
         @endif
         @if (!empty($photos))
             <section id="gallery"
                 class="elementor-section elementor-padding elementor-top-section elementor-element elementor-element-37adf8a elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                 data-id="37adf8a" data-element_type="section"
                 data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">

                 <div
                     class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-26de3ac">
                     <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-ee89094 elementor-widget elementor-widget-heading"
                             data-id="ee89094" data-element_type="widget" data-widget_type="heading.default">
                             <div class="elementor-widget-container">
                                 <h2 class="elementor-heading-title elementor-size-default">Gallery</h2>
                             </div>
                         </div>
                         <div class="elementor-element elementor-element-c54651d elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                             data-id="c54651d" data-element_type="widget" data-widget_type="divider.default">
                             <div class="elementor-widget-container">
                                 <div class="elementor-divider">
                                     <span class="elementor-divider-separator">
                                     </span>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>

                 <div>
                     @php
                         $first = collect($photos)->first();
                     @endphp
                     <div class="pt-[56%] relative mx-6 sm:mx-12 mb-4 box-show-image-photo">
                         <img alt="Gallery" loading="lazy" decoding="async"
                             class="top-0 left-0 w-full h-full absolute object-cover rounded" style="color:transparent"
                             src="{!! getImageThumb($first->thumbnail) !!}">
                     </div>
                     <div class="relative w-full px-6 sm:px-12">
                         <div class="ant-carousel css-1kkcnz3">
                             <div class="sliders-photo SectionFive__GalleryCarousel">
                                 @foreach ($photos as $k => $item)
                                     <div class="slide-item">
                                         <div class="item-block" tabindex="-1">
                                             <img alt="Gallery {{ $k }} " loading="lazy" decoding="async"
                                                 data-nimg="1" style="color:transparent"
                                                 src-set="{!! getImageThumb($item->thumbnail) !!}" src="{!! getImageThumb($item->thumbnail, 200, 100) !!}">
                                         </div>
                                     </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
         @endif

         @if (!empty($post->iframe_map))
             <section id="location"
                 class="elementor-section elementor-padding elementor-top-section elementor-element elementor-element-37adf8a elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                 data-id="37adf8a" data-element_type="section"
                 data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">

                 <div
                     class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-26de3ac">
                     <div class="elementor-widget-wrap elementor-element-populated">
                         <div class="elementor-element elementor-element-ee89094 elementor-widget elementor-widget-heading"
                             data-id="ee89094" data-element_type="widget" data-widget_type="heading.default">
                             <div class="elementor-widget-container">
                                 <h2 class="elementor-heading-title elementor-size-default">Location Map</h2>
                             </div>
                         </div>
                         <div class="elementor-element elementor-element-c54651d elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                             data-id="c54651d" data-element_type="widget" data-widget_type="divider.default">
                             <div class="elementor-widget-container">
                                 <div class="elementor-divider">
                                     <span class="elementor-divider-separator">
                                     </span>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>

                 <div class="location-map">
                     <div style="border-radius: 5px;" class="box-map">
                         {!! getIframeSrcFromString($post->iframe_map) !!}
                     </div>
                     <div class="box-address">
                         <div class="box-item">
                             <div
                                 class="max-w-full w-100 mb-8 last:mb-0 sm:mb-0 px-10 md:first:border-l-0 md:border-l border-l-secondary-800">
                                 <strong
                                     class="inline-block text-xl md:text-2xl font-semibold mb-6 cursor-pointer transition-colors duration-300 text-accent">{{ $post->title }}</strong>
                                 <div class="flex flex-col gap-1">
                                     <span>Address: {{ replaceAddress($post->address) }}</span>
                                     <span>Tel: {{ $post->phone ?? '' }} </span>
                                     @if (!empty($post->email))
                                         <span>Email: {{ $post->email }} </span>
                                     @endif
                                 </div>
                                 @if (!empty($post->time_open))
                                     <div id="time_open">
                                         <h2 style="font-size: 20px;" class="text-center">Hour:</h2>  
                                         {!! $post->time_open !!}
                                     </div>
                                 @endif
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
         @endif

         <section id="location"
             class="elementor-section elementor-padding elementor-top-section elementor-element elementor-element-37adf8a elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
             data-id="37adf8a" data-element_type="section"
             data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">

             <div id="content" class="justify">
                 {!! replaceContent($post?->content) !!}
             </div>
         </section>

         @if (!empty($relates) && $relates->isNotEmpty())
             <section class="e18e99my1 css-1600jh ehep9uj0">
                 <div class="elementor-padding e18e99my0 css-1iiv58m e1xmv6f40">

                     <div class="sec-title ">
                         <h3 class="title-h3">Recommend Brand</h3> <span class="divider"></span>
                     </div>
                     <div class="row" id="list-recomend">
                         @foreach ($relates as $item)
                             <div class="listing-block col-lg-4 col-md-6 col-sm-12">
                                 <div class="inner-box">
                                     <a href="{{ route('post', ['slug' => $item->slug]) }}" title="{{ $item->title }}">
                                         <div class="image-box">
                                             <figure class="image" style="aspect-ratio: 3/2;">
                                                 {!! getThumbnailImg($item->thumbnail, 600, 400, '', $item->title) !!}
                                             </figure>
                                         </div>
                                         <div class="lower-content">
                                             <a style="font-weight: bold; font-size:16px;"
                                                 href="{{ route('post', ['slug' => $item->slug]) }}"
                                                 title="{{ $item->title }}">
                                                 <h4 style="font-weight: bold; font-size:17px;">{{ $item->title }} </h4>
                                             </a>
                                         </div>
                                     </a>
                                 </div>
                             </div>
                         @endforeach
                     </div>

                 </div>
             </section>
         @endif
     </div>
 @endsection
 @push('scripts')
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             const iframes = document.querySelectorAll('iframe[data-src]');
             const observer = new IntersectionObserver((entries, observer) => {
                 entries.forEach(entry => {
                     if (entry.isIntersecting) {
                         const iframe = entry.target;
                         iframe.src = iframe.dataset.src;
                         observer.unobserve(iframe);
                     }
                 });
             });

             iframes.forEach(iframe => observer.observe(iframe));
         });
     </script>
     <script>
         jQuery(document).ready(function() {
             // Khởi tạo Slick Slider
             if (jQuery(".homebanners").length > 0) {
                 jQuery(".homebanners").slick({
                     slidesToShow: 1,
                     slidesToScroll: 1,
                     dots: false,
                     autoplay: true,
                     autoplaySpeed: 5000, // Chuyển ảnh sau mỗi 2 giây
                     arrows: false,
                     infinite: false,
                 });
             }
         })
     </script>
 @endpush
