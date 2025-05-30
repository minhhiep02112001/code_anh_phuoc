 @php
     $ver = 126;
     $config_website = getValueSetting('config_website');
     $banners = !empty($medias['banner']) ? $medias['banner'] : [];
     $photos = !empty($medias['photo']) ? $medias['photo'] : [];
 @endphp
 @extends('front_end._index')
 @section('content')
     <style>
         .slide-banners {
             visibility: hidden;
             opacity: 0;
             transition: opacity 0.3s ease;
             position: relative;
         }

         .slide-banners.slick-initialized {
             visibility: visible;
             opacity: 1;
         }

         /* Hiển thị slide đầu tiên khi slider chưa init */
       

         .slide-banners .block-item:first-child {
             display: block;
         }
     </style>


     <div class="wdt-elementor-container-fluid">
         <div class="elementor elementor-2632">
             <section class="elementor-section" data-id="35535b0" data-element_type="section">
                 <div class="slide-banners slick-slider">
                     @foreach ($banners as $k => $item)
                         <div class="block-item ">
                             <div class="elementor-container position-relative text-center">
                                 <div class="overlay"></div>
                                 {!! getThumbnail($item, '', '', 'attachment-large size-large wp-image-2835') !!}

                                 @if (!empty($post->content_banner))
                                     <div class="banner-content">
                                         <p>{{ $post->content_banner }}</p>
                                         <a href="#" class="cta-button btn btn-outline btn--bordered btn--white">BOOK
                                             NOW</a>
                                     </div>
                                 @endif
                             </div>
                         </div>
                     @endforeach
                 </div>
             </section>

             <section id="about"
                 class="elementor-padding elementor-section elementor-top-section elementor-element   elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                 <div class="  elementor-column-gap-default">
                     <div class="elementor-element elementor-element-efc34fb elementor-hidden-tablet  elementor-widget elementor-widget-heading"
                         data-id="efc34fb" data-element_type="widget" data-widget_type="heading.default">
                         <div class="elementor-widget-container">
                             <h1 class="elementor-heading-title elementor-size-default">
                                 {!! "Welcome To {$post->title}" !!}
                             </h1>
                         </div>
                     </div>
                     <div style="max-width: 700px; margin: 0 auto;">
                         <div class="elementor-element elementor-element-02779b3 elementor-hidden-tablet  elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                             data-id="02779b3" data-element_type="widget" data-widget_type="divider.default">
                             <div class="elementor-widget-container">
                                 <div class="elementor-divider">
                                     <span class="elementor-divider-separator">
                                     </span>
                                 </div>
                             </div>
                         </div>
                         <section
                             class="elementor-section elementor-inner-section elementor-element elementor-element-2f91dc4 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                             data-id="2f91dc4" data-element_type="section">
                             <div class="elementor-container elementor-column-gap-default">
                                 <div class="markdown prose w-full break-words dark:prose-invert dark">
                                     {!! $post->description !!}
                                 </div>
                             </div>
                         </section>
                         <div class="elementor-element elementor-element-02779b3 elementor-hidden-tablet  elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                             data-id="02779b3" data-element_type="widget" data-widget_type="divider.default">
                             <div class="elementor-widget-container">
                                 <div class="elementor-divider">
                                     <span class="elementor-divider-separator">
                                     </span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <section
                 class="elementor-section elementor-inner-section elementor-element elementor-element-6d3b147 elementor-reverse-mobile   elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                 data-id="6d3b147" data-element_type="section">
                 <div class="elementor-container elementor-column-gap-default">
                     <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-11ae3cf"
                         data-id="11ae3cf" data-element_type="column">
                         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-6836990 elementor-widget__width-initial elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                 data-id="6836990" data-element_type="widget" data-widget_type="icon-box.default">
                                 <div class="elementor-widget-container">
                                     <div class="elementor-icon-box-wrapper">

                                         <div class="elementor-icon-box-icon">
                                             <img src="{{ asset('assets/images/icon_1.png') }}" alt=" New Consultation">
                                         </div>

                                         <div class="elementor-icon-box-content">
                                             <p class="elementor-icon-box-description">
                                                 New Consultation </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="elementor-element elementor-element-3e4b9d4 elementor-widget__width-initial elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                 data-id="3e4b9d4" data-element_type="widget" data-widget_type="icon-box.default">
                                 <div class="elementor-widget-container">
                                     <div class="elementor-icon-box-wrapper">
                                         <div class="elementor-icon-box-icon">
                                             <img src="{{ asset('assets/images/icon_2.png') }}" alt=" All Services">
                                         </div>

                                         <div class="elementor-icon-box-content">
                                             <p class="elementor-icon-box-description">
                                                 All Services </p>
                                         </div>

                                     </div>
                                 </div>
                             </div>
                             <div class="elementor-element elementor-element-633c238 elementor-widget__width-initial elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                 data-id="633c238" data-element_type="widget" data-widget_type="icon-box.default">
                                 <div class="elementor-widget-container">
                                     <div class="elementor-icon-box-wrapper">

                                         <div class="elementor-icon-box-icon">
                                             <img src="{{ asset('assets/images/icon_3.png') }}" alt="Book Appointments">
                                         </div>

                                         <div class="elementor-icon-box-content">
                                             <p class="elementor-icon-box-description">
                                                 Book Appointments </p>
                                         </div>

                                     </div>
                                 </div>
                             </div>
                             <div class="elementor-element elementor-element-ce17083 elementor-widget__width-initial elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                 data-id="ce17083" data-element_type="widget" data-widget_type="icon-box.default">
                                 <div class="elementor-widget-container">
                                     <div class="elementor-icon-box-wrapper">

                                         <div class="elementor-icon-box-icon">
                                             <span class="elementor-icon">
                                                 <img src="{{ asset('assets/images/icon_4.png') }}" alt="Gift Cards ">
                                             </span>
                                         </div>
                                         <div class="elementor-icon-box-content">
                                             <p class="elementor-icon-box-description">
                                                 Gift Cards </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             @if (!empty($post->content_block_1) && !empty($post->image_block_1))
                 <section id="content_block_1"
                     class="elementor-section elementor-inner-section elementor-element elementor-element-6533d6c4 elementor-reverse-tablet elementor-reverse-mobile elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default"
                     data-id="6533d6c4" data-element_type="section"
                     data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                     <div class="elementor-container elementor-column-gap-no">
                         <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7ea6c594 animated-fast elementor-invisible"
                             data-id="7ea6c594" data-element_type="column"
                             data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;animation_delay&quot;:100}">
                             <div class="elementor-widget-wrap elementor-element-populated">
                                 <h2 class="elementor-heading-title elementor-size-default text-center d-block">
                                     {!! $post?->title_block_1 !!}
                                 </h2>
                                 <div class="elementor-element elementor-element-7b2894d elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                     data-id="7b2894d" data-element_type="widget" data-widget_type="divider.default">
                                     <div class="elementor-widget-container">
                                         <div class="elementor-divider">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="elementor-element elementor-element-d02be1a elementor-widget elementor-widget-text-editor"
                                     data-id="d02be1a" data-element_type="widget" data-widget_type="text-editor.default">
                                     <div class="elementor-widget-container justify">
                                         {!! $post->content_block_1 !!}
                                     </div>
                                 </div>

                             </div>
                         </div>

                         <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-17aa2697 animated-fast elementor-invisible"
                             data-id="17aa2697" data-element_type="column"
                             data-settings="{&quot;animation&quot;:&quot;fadeIn&quot;,&quot;animation_delay&quot;:100}">
                             <div class="elementor-widget-wrap elementor-element-populated">

                                 <div class="elementor-element elementor-element-12ed96c2 wdt-custom-banner-border animated-fast elementor-invisible elementor-widget elementor-widget-spacer"
                                     data-id="12ed96c2" data-element_type="widget"
                                     data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:300}"
                                     data-widget_type="spacer.default">
                                     <div class="elementor-widget-container">
                                         <div class="elementor-spacer">
                                             <div class="elementor-spacer-inner"></div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="elementor-element elementor-element-164478d animated-fast wdt-custom-hover-image-style elementor-hidden-tablet  elementor-invisible elementor-widget elementor-widget-image"
                                     data-id="164478d" data-element_type="widget"
                                     data-settings="{&quot;_animation_delay&quot;:100,&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
                                     data-widget_type="image.default">
                                     <div class="elementor-widget-container">
                                         <img decoding="async" width="1707" height="1710"
                                             src="{{ getImageThumb($post->image_block_1) }}"
                                             class="attachment-full size-full wp-image-3006" alt=""
                                             srcset="{{ getImageThumb($post->image_block_1) }} 1707w,
                                       {{ getImageThumb($post->image_block_1, 300, 300) }} 300w, 
                                       {{ getImageThumb($post->image_block_1, 1022, 1024) }} 1022w, 
                                       {{ getImageThumb($post->image_block_1, 1000, 1002) }} 1000w, 
                                       {{ getImageThumb($post->image_block_1, 1533, 1536) }} 1533w, 
                                       {{ getImageThumb($post->image_block_1, 150, 150) }} 150w, 
                                       {{ getImageThumb($post->image_block_1, 100, 100) }} 100w"
                                             sizes="(max-width: 1707px) 100vw, 1707px" />
                                     </div>
                                 </div>
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
                                                 data-no-translation="true" data-layout-id="4"
                                                 data-layout-category="slider" data-set-id="light-background"
                                                 data-pid="" data-language="en" data-review-target-width="300"
                                                 data-css-version="2" data-review-text-mode="readmore"
                                                 data-reply-by-locale="Owner's reply" data-pager-autoplay-timeout="6"
                                                 data-trustindex-widget="true" style="">
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
                                                                                 alt="Google" width="17"
                                                                                 height="17" loading="lazy">
                                                                             <img class="ti-star"
                                                                                 src="{{ asset('images/f.svg') }}"
                                                                                 alt="Google" width="17"
                                                                                 height="17" loading="lazy"><img
                                                                                 class="ti-star"
                                                                                 src="{{ asset('images/f.svg') }}"
                                                                                 alt="Google" width="17"
                                                                                 height="17" loading="lazy"><img
                                                                                 class="ti-star"
                                                                                 src="{{ asset('images/f.svg') }}"
                                                                                 alt="Google" width="17"
                                                                                 height="17" loading="lazy"><img
                                                                                 class="ti-star"
                                                                                 src="{{ asset('images/f.svg') }}"
                                                                                 alt="Google" width="17"
                                                                                 height="17" loading="lazy"></span>
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
                                 class="top-0 left-0 w-full h-full absolute object-cover rounded"
                                 style="color:transparent" src="{!! getImageThumb($first->thumbnail) !!}">
                         </div>
                         <div class="relative w-full px-6 sm:px-12">
                             <div class="ant-carousel css-1kkcnz3">
                                 <div class="sliders-photo SectionFive__GalleryCarousel">
                                     @foreach ($photos as $k => $item)
                                         <div class="slide-item">
                                             <div class="item-block" tabindex="-1">
                                                 <img alt="Gallery {{ $k }} " loading="lazy" decoding="async"
                                                     data-nimg="1" style="color:transparent"
                                                     srcset="{!! getImageThumb($item->thumbnail) !!}" src="{!! getImageThumb($item->thumbnail, 300, 300) !!}">
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
                                         <span>Address: {{ $post->address }}</span>
                                         <span>Tel: {{ $post->phone ?? '' }} </span>
                                         @if (!empty($post->email))
                                             <span>Email: {{ $post->email }} </span>
                                         @endif

                                     </div>
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
                     {!! $post?->content !!}
                 </div>
             </section>

             @if (!empty($relates) && $relates->isNotEmpty())
                 <section class="e18e99my1 css-1600jh ehep9uj0">
                     <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                         <div class="auto-container">
                             <div class="sec-title ">
                                 <h4>Recommend Brand</h4> <span class="divider"></span>
                             </div>
                             <div class="row" id="list-recomend">
                                 @foreach ($relates as $item)
                                     <div class="listing-block col-lg-4 col-md-6 col-sm-12">
                                         <div class="inner-box">
                                             <a href="{{ route('post', ['slug' => $item->slug]) }}"
                                                 title="{{ $item->title }}">
                                                 <div class="image-box">
                                                     <figure class="image">
                                                         {!! getThumbnail($item, 600, 400) !!}
                                                     </figure>
                                                 </div>
                                                 <div class="lower-content">
                                                     <a style="font-weight: bold; font-size:16px;"
                                                         href="{{ route('post', ['slug' => $item->slug]) }}"
                                                         title="{{ $item->title }}">{{ $item->title }}</a>

                                                 </div>
                                             </a>
                                         </div>
                                     </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                 </section>
             @endif
         </div>
     </div>
     <style>
         .box-address {
             position: relative;
             display: block;
         }

         .inner-box {
             padding: 10px;
         }

         .elementor-2632 .elementor-element.elementor-element-164478d>.elementor-widget-container {
             margin: 0;
         }

         .text-xl {
             font-size: 1.25rem;
         }

         .font-semibold {
             font-weight: 600;
         }

         .mb-6 {
             margin-bottom: 1.5rem;
         }

         .box-item {
             border: 2px solid #fcca2c;
             padding: 2.5rem;
             width: 100%;
             background: #fff;
             border-radius: 20px;
             max-width: 550px;
             margin: 0 auto;
             margin-top: -30px;

             position: relative;
         }

         .box-item:before {
             content: "";
             border-bottom-color: #fecb2e;
             border-color: #00000000;
             border-right-width: 8px;
             border-left-width: 8px;
             border-bottom-width: 8px;
             display: block;
             z-index: 10;
             left: 50%;
             top: -7px;
             position: absolute;
         }

         .box-item:after {
             content: '';
             border-right-width: 8px;
             border-left-width: 8px;
             border-bottom-width: 8px;
             display: block;
             left: 50%;
             top: -10px;
             position: absolute;
             border-color: #00000000;
             border-bottom-color: #fecb2e;
         }


         .box-item strong {

             display: block;
             margin: 10px
         }

         .box-item span {
             display: block;
         }

         .slide-banners .block-item.slick-slide.slick-current {


             /* min-height: 440px; */
             height: 500px;
             overflow: hidden;
             width: 100%;

         }

         .slide-banners .block-item .elementor-container {
             width: 100%;
             height: 100%;
             position: relative;
         }

         .slide-banners .block-item .elementor-container img {

             object-fit: cover;
             max-width: 100%;
             width: 100%;
             height: 100%;
             top: 0px;
             left: 0;
             position: absolute;
         }

         .sliders-photo {
             margin: 10px 0px;
             height: 180px;
         }

         .box-map {
             height: 500px;
         }

         .elementor-padding {
             padding: 0 30px !important;
             margin-bottom: 30px !important;
         }

         .item-block {
             position: relative;
             cursor: pointer;
             height: 100%;
             width: 100%;
         }

         .slick-track,
         .slick-list.draggable {
             height: 100%;
         }

         .sliders-photo .slick-slide>div {
             gap: 1rem
         }

         @media (max-width: 992px) {
             .sliders-photo .slick-slide>div {
                 grid-template-columns: repeat(7, minmax(0px, 1fr));
             }
         }

         .elementor-widget-wrap.elementor-element-populated {
             position: relative;
         }

         .elementor-element.elementor-widget__width-auto.wdt-custom-menu-style.elementor-widget.elementor-widget-wdt-header-menu {
             position: absolute;
             right: 10px;
         }

         @media (max-width: 576px) {
             .box-item {
                 margin-top: 10px;
             }

             .auto-container {
                 padding: 0 20px;
             }

             .elementor-2632 .elementor-element.elementor-element-4af265a>.elementor-element-populated {
                 padding: 0;
             }

             .elementor-2632 .elementor-element.elementor-element-d820221>.elementor-element-populated {
                 margin: 0 0 30px 0;
             }

             .elementor-2632 .elementor-element.elementor-element-17aa2697>.elementor-element-populated {
                 margin: 0;
             }

             .box-map {
                 height: 300px;
             }

             .sliders-photo .slick-slide>div {
                 grid-template-columns: repeat(5, minmax(0px, 1fr));
             }

             .sliders-photo {
                 margin: 10px 0px;
                 height: 90px;
             }

             .elementor-2632 .elementor-element.elementor-element-3098152>.elementor-element-populated,
             .elementor-2632 .elementor-element.elementor-element-164478d>.elementor-widget-container,
             .elementor-2632 .elementor-element.elementor-element-c7f87b6>.elementor-widget-container {
                 padding: 0;
                 margin: 0;
             }

             .elementor-2632 .elementor-element.elementor-element-c7f87b6 img {
                 width: 100%;
             }

             .wdt-custom-banner-border .elementor-widget-container {
                 display: none;
             }

             h1.elementor-heading-title {
                 font-size: 27px !important;
                 font-weight: 700;
             }

             h2.elementor-heading-title {
                 font-size: 24px !important;
             }

             .elementor-element.elementor-widget__width-auto.wdt-custom-menu-style.elementor-widget.elementor-widget-wdt-header-menu {
                 width: auto;
             }

             .box-show-image-photo {
                 padding-top: 80%;
             }

             .elementor-column.elementor-col-100.elementor-top-column.elementor-element.elementor-element-3098152 {
                 margin-top: 50px;
             }
         }


         .box-show-image-photo {
             position: relative;
             /* min-height: 440px; */
             padding-top: 40%;
             overflow: hidden;
             width: 100%;
         }

         .box-show-image-photo img {
             object-fit: cover;
             max-width: 100%;
             width: 100%;
             height: 100%;
             top: 0px;
             left: 0;
             position: absolute;
         }

         .item-block img {
             position: absolute;
             left: 0px;
             top: 0px;
             height: 100%;
             width: 100%;
             object-fit: cover;
         }
     </style>
 @endsection
 @push('scripts')
     <script>
         jQuery(document).ready(function() {
             var bannerSlider = jQuery('.sliders-photo');
             if (bannerSlider.length > 0) {
                 // Ẩn slider lúc đầu (cũng có thể chỉ cần CSS thôi)
                 bannerSlider.on('init', function(event, slick) {
                     bannerSlider.css({
                         visibility: 'visible',
                         opacity: 1
                     });
                 });

                 bannerSlider.css({
                     visibility: 'hidden',
                     opacity: 0
                 });


                 // Khởi tạo slick slider cho slide-banners
                 bannerSlider.slick({
                     slidesToShow: 6,
                     slidesToScroll: 1,
                     dots: false,
                     autoplay: false,
                     arrows: true,
                     infinite: true,
                     responsive: [{
                             breakpoint: 800,
                             settings: {
                                 slidesToShow: 5,
                             }
                         },
                         {
                             breakpoint: 600,
                             settings: {
                                 slidesToShow: 4,
                             }
                         },
                         {
                             breakpoint: 400,
                             settings: {
                                 slidesToShow: 3,
                             }
                         }
                     ],
                 });
             }

             var slider = jQuery('#list-recomend');

             slider.slick({
                 slidesToShow: 6,
                 slidesToScroll: 1, // số slide scroll mỗi lần
                 dots: false,
                 autoplay: false,
                 autoplaySpeed: 0, // liên tục
                 speed: 100, // tốc độ chuyển slide (ms)
                 cssEase: 'linear', // mượt liên tục
                 arrows: true,
                 infinite: true,
                 pauseOnHover: false,
                 responsive: [{
                         breakpoint: 800,
                         settings: {
                             slidesToShow: 5,
                         },
                     },
                     {
                         breakpoint: 600,
                         settings: {
                             slidesToShow: 1,
                         },
                     },
                 ],
             });


             // Khi slider thay đổi ảnh
             slider.on('afterChange', function(event, slick, currentSlide) {
                 var newImage = jQuery('.sliders-photo .slick-slide[data-slick-index="' + currentSlide +
                     '"] img').attr('src');
                 jQuery('.box-show-image-photo img').attr('src', newImage + "?" + currentSlide);
             });

             // Khi click vào ảnh nhỏ, ảnh lớn thay đổi
             jQuery('.sliders-photo .slide-item img').on('click', function() {
                 var newImage = jQuery(this).attr('src');
                 jQuery('.box-show-image-photo img').attr('src', newImage);
             });
         });
     </script>
 @endpush
