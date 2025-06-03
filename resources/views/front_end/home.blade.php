 @php
     $banner = collect($banners['home'] ?? [])->first();
     $banner_brands = $banners['home_brand'] ?? [];
     $banner_posts = $banners['home_brand_1'] ?? [];
 @endphp

 @php

     $config_home = getValueSetting('config_home');
 @endphp

 @extends('front_end._index')
 @section('content')
     <div class="wdt-elementor-container-fluid">
         <div class="elementor elementor-2632">
             @if (!empty($banner))
                 <section
                     class="elementor-section elementor-top-section elementor-element elementor-element-35535b0 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                     data-id="35535b0" data-element_type="section"
                     data-settings="{
                    &quot;background_background&quot;:&quot;video&quot;,
                    &quot;background_video_link&quot;:&quot;{{ $banner->youtobe ?? '' }}&quot;
                    }">
                     <div class="elementor-background-video-container elementor-hidden-mobile">
                         <div class="elementor-background-video-embed"></div>
                     </div>
                     <div class="elementor-background-overlay"></div>
                     <div class="elementor-container elementor-column-gap-default">
                         <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5b5f6aa"
                             data-id="5b5f6aa" data-element_type="column">
                             <div class="elementor-widget-wrap elementor-element-populated">
                                 <div class="elementor-element elementor-element-29e057c elementor-widget elementor-widget-heading"
                                     data-id="29e057c" data-element_type="widget" data-widget_type="heading.default">
                                     <div class="elementor-widget-container">
                                         <h2 class="elementor-heading-title elementor-size-default">
                                             {{ $banner->title }}
                                         </h2>
                                     </div>
                                 </div>
                                 <section
                                     class="elementor-section elementor-inner-section elementor-element elementor-element-317c170 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                     data-id="317c170" data-element_type="section">
                                     <div class="elementor-container elementor-column-gap-default">
                                         <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d77349c"
                                             data-id="d77349c" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                 <div class="elementor-element elementor-element-2b53d80 elementor-align-right elementor-mobile-align-center elementor-widget elementor-widget-button"
                                                     data-id="2b53d80" data-element_type="widget"
                                                     data-widget_type="button.default">
                                                     <div class="elementor-widget-container">
                                                         <div class="elementor-button-wrapper">
                                                             <a class="elementor-button elementor-button-link elementor-size-sm"
                                                                 href="{{ url('/') }}">
                                                                 <span class="elementor-button-content-wrapper">
                                                                     <span class="elementor-button-text">Book
                                                                         Appointment</span>
                                                                 </span>
                                                             </a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-f66efed"
                                             data-id="f66efed" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                 <div class="elementor-element elementor-element-41f81f7 elementor-mobile-align-center elementor-widget elementor-widget-button"
                                                     data-id="41f81f7" data-element_type="widget"
                                                     data-widget_type="button.default">
                                                     <div class="elementor-widget-container">
                                                         <div class="elementor-button-wrapper">
                                                             <a class="elementor-button elementor-button-link elementor-size-sm"
                                                                 href="{{ url('/') }}">
                                                                 <span class="elementor-button-content-wrapper">
                                                                     <span class="elementor-button-text"> Visit
                                                                         our salon </span>
                                                                 </span>
                                                             </a>
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
             @endif
             <section
                 class="elementor-section elementor-top-section elementor-element elementor-element-df4d261 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                 data-id="df4d261" data-element_type="section"
                 data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                 <div class="elementor-container elementor-column-gap-default">
                     <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3098152"
                         data-id="3098152" data-element_type="column">
                         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-efc34fb elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-heading"
                                 data-id="efc34fb" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                     <h5 class="elementor-heading-title elementor-size-default">
                                         {!! $config_home->title_home ?? '' !!}
                                     </h5>
                                 </div>
                             </div>
                             <div class="elementor-element elementor-element-02779b3 elementor-hidden-tablet elementor-hidden-mobile elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
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
                                     <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-c92cbf2"
                                         data-id="c92cbf2" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                             <div class="elementor-element elementor-element-2b44697 elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-text-editor"
                                                 data-id="2b44697" data-element_type="widget"
                                                 data-widget_type="text-editor.default">
                                                 <div class="elementor-widget-container">
                                                     <div class="flex max-w-full flex-col flex-grow">
                                                         <div class="min-h-8 text-message flex w-full flex-col items-end gap-2 whitespace-normal break-words [.text-message+&amp;]:mt-5"
                                                             dir="auto" data-message-author-role="assistant"
                                                             data-message-id="6561a84e-b3c8-4f76-afa3-9a10e5873873">
                                                             <div
                                                                 class="flex w-full flex-col gap-1 empty:hidden first:pt-[3px]">
                                                                 <div
                                                                     class="markdown prose w-full break-words dark:prose-invert dark">
                                                                     {!! $config_home->content_title ?? '' !!}
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="elementor-element elementor-element-a5f542d elementor-hidden-tablet elementor-hidden-mobile elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                                 data-id="a5f542d" data-element_type="widget"
                                                 data-widget_type="divider.default">
                                                 <div class="elementor-widget-container">
                                                     <div class="elementor-divider">
                                                         <span class="elementor-divider-separator">
                                                         </span>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </section>
                             @if (!empty($banner_posts))
                                 <section
                                     class="elementor-section elementor-inner-section elementor-element elementor-element-6d3b147 elementor-reverse-mobile elementor-hidden-tablet elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                     data-id="6d3b147" data-element_type="section">
                                     <div class="elementor-container elementor-column-gap-default">
                                         <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-11ae3cf"
                                             data-id="11ae3cf" data-element_type="column">
                                             <div class="elementor-widget-wrap elementor-element-populated">
                                                 @foreach ($banner_posts as $item)
                                                     <div
                                                         class="elementor-element elementor-element-6836990 elementor-widget__width-initial elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box">
                                                         <div class="elementor-widget-container">
                                                             <div class="elementor-icon-box-wrapper">
                                                                 <div class="elementor-icon-box-icon">
                                                                     <span class="elementor-icon">
                                                                         {!! getThumbnail($item, 50, 50, 'attachment-large size-large wp-image-2835') !!}
                                                                     </span>
                                                                 </div>
                                                                 <div class="elementor-icon-box-content">
                                                                     <p class="elementor-icon-box-description">
                                                                         {{ $item->title }}
                                                                     </p>
                                                                 </div>
                                                             </div>
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
                 </div>
             </section>

             @if ($pages->isNotEmpty())
                 @foreach ($pages as $k => $item)
                     @if ($k % 2 == 0)
                         <section
                             class="elementor-section elementor-inner-section elementor-element elementor-element-6533d6c4 elementor-reverse-tablet elementor-reverse-mobile elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default"
                             data-id="6533d6c4" data-element_type="section"
                             data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                             <div class="elementor-container elementor-column-gap-no">
                                 <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7ea6c594 animated-fast elementor-invisible"
                                     data-id="7ea6c594" data-element_type="column"
                                     data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;animation_delay&quot;:100}">
                                     <div class="elementor-widget-wrap elementor-element-populated">
                                         <div class="elementor-element elementor-element-331fd8d elementor-widget elementor-widget-heading"
                                             data-id="331fd8d" data-element_type="widget"
                                             data-widget_type="heading.default">
                                             <div class="elementor-widget-container">
                                                 <h2 class="elementor-heading-title elementor-size-default">
                                                     {{ $item->title }}
                                                 </h2>
                                             </div>
                                         </div>
                                         <div class="elementor-element elementor-element-7b2894d elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                             data-id="7b2894d" data-element_type="widget"
                                             data-widget_type="divider.default">
                                             <div class="elementor-widget-container">
                                                 <div class="elementor-divider">
                                                     <span class="elementor-divider-separator">
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="elementor-element elementor-element-d02be1a elementor-widget elementor-widget-text-editor"
                                             data-id="d02be1a" data-element_type="widget"
                                             data-widget_type="text-editor.default">
                                             <div class="elementor-widget-container">
                                                 {!! $item->content !!}
                                             </div>
                                         </div>
                                         <div class="elementor-element elementor-element-080ffdf elementor-widget elementor-widget-button"
                                             data-id="080ffdf" data-element_type="widget"
                                             data-widget_type="button.default">
                                             <div class="elementor-widget-container">
                                                 <div class="elementor-button-wrapper">
                                                     <a class="elementor-button elementor-button-link elementor-size-sm"
                                                         href="{{ url('/') }}">
                                                         <span class="elementor-button-content-wrapper">
                                                             <span class="elementor-button-text">Explore Our
                                                                 Services</span>
                                                         </span>
                                                     </a>
                                                 </div>
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
                                         <div class="elementor-element elementor-element-164478d animated-fast wdt-custom-hover-image-style elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image"
                                             data-id="164478d" data-element_type="widget"
                                             data-settings="{&quot;_animation_delay&quot;:100,&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
                                             data-widget_type="image.default">
                                             <div class="elementor-widget-container">
                                                 <img decoding="async" width="1707" height="1710"
                                                     src="{{ getImageThumb($item->thumbnail) }}"
                                                     class="attachment-full size-full wp-image-3006" alt=""
                                                     srcset="{{ getImageThumb($item->thumbnail) }} 1707w,
                                            {{ getImageThumb($item->thumbnail, 300, 300) }} 300w, 
                                            {{ getImageThumb($item->thumbnail, 1022, 1024) }} 1022w, 
                                            {{ getImageThumb($item->thumbnail, 1000, 1002) }} 1000w, 
                                            {{ getImageThumb($item->thumbnail, 1533, 1536) }} 1533w, 
                                            {{ getImageThumb($item->thumbnail, 768, 769) }} 768w, 
                                            {{ getImageThumb($item->thumbnail, 150, 150) }} 150w, 
                                            {{ getImageThumb($item->thumbnail, 100, 100) }} 100w"
                                                     sizes="(max-width: 1707px) 100vw, 1707px" />
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
                     @else
                         <section
                             class="elementor-section elementor-inner-section elementor-element elementor-element-1694bb2 elementor-reverse-tablet elementor-reverse-mobile elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default"
                             data-id="1694bb2" data-element_type="section"
                             data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                             <div class="elementor-container elementor-column-gap-no">
                                 <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d820221 animated-fast elementor-invisible"
                                     data-id="d820221" data-element_type="column"
                                     data-settings="{&quot;animation&quot;:&quot;fadeIn&quot;,&quot;animation_delay&quot;:100}">
                                     <div class="elementor-widget-wrap elementor-element-populated">
                                         <div class="elementor-element elementor-element-779056b elementor-widget__width-inherit wdt-bg-mask-animation animated-slow elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image"
                                             data-id="779056b" data-element_type="widget"
                                             data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                             data-widget_type="image.default">
                                             <div class="elementor-widget-container">
                                                 <img fetchpriority="high" fetchpriority="high" decoding="async"
                                                     width="1019" height="709"
                                                     src="{{ asset('images/grid-bg-Stroke-1_black_transparent.png') }}"
                                                     class="attachment-full size-full wp-image-2696" alt=""  sizes="(max-width: 1019px) 100vw, 1019px" />
                                             </div>
                                         </div>
                                         <div class="elementor-element elementor-element-010b115 wdt-custom-banner-border animated-fast elementor-invisible elementor-widget elementor-widget-spacer"
                                             data-id="010b115" data-element_type="widget"
                                             data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:300}"
                                             data-widget_type="spacer.default">
                                             <div class="elementor-widget-container">
                                                 <div class="elementor-spacer">
                                                     <div class="elementor-spacer-inner"></div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="elementor-element elementor-element-c7f87b6 animated-fast wdt-custom-hover-image-style elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image"
                                             data-id="c7f87b6" data-element_type="widget"
                                             data-settings="{&quot;_animation_delay&quot;:100,&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
                                             data-widget_type="image.default">
                                             <div class="elementor-widget-container">
                                                 <img decoding="async" width="1707" height="1710" loading="lazy"
                                                     loading="lazy" src="{{ getImageThumb($item->thumbnail) }}"
                                                     class="attachment-full size-full wp-image-3006" alt=""
                                                     srcset="{{ getImageThumb($item->thumbnail) }} 1707w,
                                            {{ getImageThumb($item->thumbnail, 300, 300) }} 300w, 
                                            {{ getImageThumb($item->thumbnail, 1022, 1024) }} 1022w, 
                                            {{ getImageThumb($item->thumbnail, 1000, 1002) }} 1000w, 
                                            {{ getImageThumb($item->thumbnail, 1533, 1536) }} 1533w, 
                                            {{ getImageThumb($item->thumbnail, 768, 769) }} 768w, 
                                            {{ getImageThumb($item->thumbnail, 150, 150) }} 150w, 
                                            {{ getImageThumb($item->thumbnail, 100, 100) }} 100w"
                                                     sizes="(max-width: 1707px) 100vw, 1707px" />
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4af265a animated-fast elementor-invisible"
                                     data-id="4af265a" data-element_type="column"
                                     data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;animation_delay&quot;:100}">
                                     <div class="elementor-widget-wrap elementor-element-populated">
                                         <div class="elementor-element elementor-element-db709eb elementor-widget elementor-widget-heading"
                                             data-id="db709eb" data-element_type="widget"
                                             data-widget_type="heading.default">
                                             <div class="elementor-widget-container">
                                                 <h2 class="elementor-heading-title elementor-size-default">
                                                     {{ $item->title }}</h2>
                                             </div>
                                         </div>
                                         <div class="elementor-element elementor-element-85fd512 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                             data-id="85fd512" data-element_type="widget"
                                             data-widget_type="divider.default">
                                             <div class="elementor-widget-container">
                                                 <div class="elementor-divider">
                                                     <span class="elementor-divider-separator">
                                                     </span>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="elementor-element elementor-element-24b208f elementor-widget elementor-widget-text-editor"
                                             data-id="24b208f" data-element_type="widget"
                                             data-widget_type="text-editor.default">
                                             <div class="elementor-widget-container">
                                                 {!! $item->content !!}
                                             </div>
                                         </div>
                                         <div class="elementor-element elementor-element-f6b7dca elementor-widget elementor-widget-button"
                                             data-id="f6b7dca" data-element_type="widget"
                                             data-widget_type="button.default">
                                             <div class="elementor-widget-container">
                                                 <div class="elementor-button-wrapper">
                                                     <a class="elementor-button elementor-button-link elementor-size-sm"
                                                         href="{{ url('/') }}">
                                                         <span class="elementor-button-content-wrapper">
                                                             <span class="elementor-button-text">Visit Our Salon</span>
                                                         </span>
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
                     @endif
                 @endforeach
             @endif
             
             <section
                 class="elementor-section elementor-top-section elementor-element elementor-element-37adf8a elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                 data-id="37adf8a" data-element_type="section"
                 data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                 <div class="elementor-container elementor-column-gap-default">
                     <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1451955"
                         data-id="1451955" data-element_type="column">
                         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-ca9e945 elementor-widget elementor-widget-heading"
                                 data-id="ca9e945" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                     <h2 class="elementor-heading-title elementor-size-default">
                                         Our Trusted Products Range</h2>
                                 </div>
                             </div>
                             <div class="elementor-element elementor-element-7dce78c elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                 data-id="7dce78c" data-element_type="widget" data-widget_type="divider.default">
                                 <div class="elementor-widget-container">
                                     <div class="elementor-divider">
                                         <span class="elementor-divider-separator">
                                         </span>
                                     </div>
                                 </div>
                             </div>
                             @if (!empty($banner_brands))
                                 <section
                                     class="elementor-section elementor-inner-section elementor-element elementor-element-b658847 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                     data-id="b658847" data-element_type="section">
                                     <div class="elementor-container elementor-column-gap-default sliders-brands">
                                         @foreach ($banner_brands as $item)
                                             <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-e87d1b5"
                                                 data-id="e87d1b5" data-element_type="column">
                                                 <div class="elementor-widget-wrap elementor-element-populated">
                                                     <div class="elementor-element elementor-element-9f6740d elementor-widget elementor-widget-image"
                                                         data-id="9f6740d" data-element_type="widget"
                                                         data-widget_type="image.default">
                                                         <div class="elementor-widget-container">
                                                             {!! getThumbnail($item, '', '', 'attachment-large size-large wp-image-2835') !!}
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                 </section>
                             @endif
                         </div>
                     </div>
                 </div>
             </section>
             <section
                 class="elementor-section elementor-top-section elementor-element elementor-element-affcef2 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                 data-id="affcef2" data-element_type="section"
                 data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                 <div class="elementor-background-overlay"></div>
                 <div class="elementor-container elementor-column-gap-no">
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
                                                                         <div class="ti-profile-img">
                                                                             {!! getThumbnail($item, 50, 50, 'attachment-large size-large wp-image-2835') !!}
                                                                         </div>
                                                                         <div class="ti-profile-details">
                                                                             <div class="ti-name">{{ $item->fullname }}
                                                                             </div>
                                                                             <div class="ti-date">{{ format_date($item->created_at, 'd-m-Y') }}</div>
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
                                                                     <div class="ti-review-text-container ti-review-content"
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
         </div>
     </div>
 @endsection 