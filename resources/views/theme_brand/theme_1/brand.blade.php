 @php
     $ver = 126;
     $config_website = getValueSetting('config_website');
     $banners = !empty($medias['banner']) ? $medias['banner'] : [];
     $photos = !empty($medias['photo']) ? $medias['photo'] : [];
 @endphp
 @extends('front_end._index')
 @section('content')
     <style>
         .wdt-elementor-container-fluid {
             max-width: 1200px;
             margin: 0 auto;

         }

         .line-clamp-3 {
             display: -webkit-box;
             -webkit-line-clamp: 3;
             /* Giới hạn tối đa 3 dòng */
             -webkit-box-orient: vertical;
             overflow: hidden;
         }

         #main,
         header#header,
         #footer {
             background: #E6DCC5;
         }

         .slide-banners .slick-arrow {
             display: none !important;
         }
     </style>
     <div class="wdt-elementor-container-fluid">
         <div class="elementor elementor-2632">
             <style>
                 .elementor-element-35535b0 {
                     margin-top: 0 !important;
                 }
             </style>
             <section class="elementor-section" data-id="35535b0" data-element_type="section">
                 <div class="slide-banners">
                     @foreach ($banners as $item)
                         <div>
                             <div class="elementor-container elementor-column-gap-default  ">
                                 {!! getThumbnail($item, '', '', 'attachment-large size-large wp-image-2835') !!}
                             </div>
                         </div>
                     @endforeach
                 </div>
             </section>

             <section
                 class="elementor-padding elementor-section elementor-top-section elementor-element   elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                 <div class="  elementor-column-gap-default">
                     <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3098152"
                         data-id="3098152" data-element_type="column">
                         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-efc34fb elementor-hidden-tablet  elementor-widget elementor-widget-heading"
                                 data-id="efc34fb" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                     <h1 class="elementor-heading-title elementor-size-default">
                                         {!! $post->title ?? '' !!}
                                     </h1>
                                 </div>
                             </div>
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
                                     <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-c92cbf2"
                                         data-id="c92cbf2" data-element_type="column">
                                         <div class="elementor-widget-wrap elementor-element-populated">
                                             <div class="elementor-element elementor-element-2b44697 elementor-hidden-tablet  elementor-widget elementor-widget-text-editor"
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
                                                                     {!! $post->content_about !!}
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="elementor-element elementor-element-a5f542d elementor-hidden-tablet  elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
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
                         </div>
                     </div>
                 </div>
             </section>

             @if (!empty($post->content_block_1) && !empty($post->image_block_1))
                 <section
                     class="elementor-section elementor-inner-section elementor-element elementor-element-6533d6c4 elementor-reverse-tablet elementor-reverse-mobile elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default"
                     data-id="6533d6c4" data-element_type="section"
                     data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                     <div class="elementor-container elementor-column-gap-no">
                         <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7ea6c594 animated-fast elementor-invisible"
                             data-id="7ea6c594" data-element_type="column"
                             data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;animation_delay&quot;:100}">
                             <div class="elementor-widget-wrap elementor-element-populated">

                                 <div class="elementor-element elementor-element-7b2894d elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                     data-id="7b2894d" data-element_type="widget" data-widget_type="divider.default">
                                     <div class="elementor-widget-container">
                                         <div class="elementor-divider">
                                             <span class="elementor-divider-separator">
                                             </span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="elementor-element elementor-element-d02be1a elementor-widget elementor-widget-text-editor"
                                     data-id="d02be1a" data-element_type="widget" data-widget_type="text-editor.default">
                                     <div class="elementor-widget-container">
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
             @if (!empty($post->content_block_2) && !empty($post->image_block_2))
                 <section
                     class="elementor-section elementor-inner-section elementor-element elementor-element-1694bb2 elementor-reverse-tablet elementor-reverse-mobile elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default"
                     data-id="1694bb2" data-element_type="section"
                     data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                     <div class="elementor-container elementor-column-gap-no">
                         <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d820221 animated-fast elementor-invisible"
                             data-id="d820221" data-element_type="column"
                             data-settings="{&quot;animation&quot;:&quot;fadeIn&quot;,&quot;animation_delay&quot;:100}">
                             <div class="elementor-widget-wrap elementor-element-populated">
                                 <div class="elementor-element elementor-element-779056b elementor-widget__width-inherit wdt-bg-mask-animation animated-slow elementor-hidden-tablet  elementor-invisible elementor-widget elementor-widget-image"
                                     data-id="779056b" data-element_type="widget"
                                     data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                     data-widget_type="image.default">
                                     <div class="elementor-widget-container">
                                         <img fetchpriority="high" fetchpriority="high" decoding="async" width="1019"
                                             height="709"
                                             src="{{ asset('images/grid-bg-Stroke-1_black_transparent.png') }}"
                                             class="attachment-full size-full wp-image-2696" alt=""
                                             sizes="(max-width: 1019px) 100vw, 1019px" />
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
                                 <div class="elementor-element elementor-element-c7f87b6 animated-fast wdt-custom-hover-image-style elementor-hidden-tablet  elementor-invisible elementor-widget elementor-widget-image"
                                     data-id="c7f87b6" data-element_type="widget"
                                     data-settings="{&quot;_animation_delay&quot;:100,&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
                                     data-widget_type="image.default">
                                     <div class="elementor-widget-container">
                                         <img decoding="async" width="1707" height="1710" loading="lazy"
                                             loading="lazy" src="{{ getImageThumb($post->image_block_2) }}"
                                             class="attachment-full size-full wp-image-3006" alt=""
                                             srcset="{{ getImageThumb($post->image_block_2) }} 1707w,
                                       {{ getImageThumb($post->image_block_2, 300, 300) }} 300w, 
                                       {{ getImageThumb($post->image_block_2, 1022, 1024) }} 1022w, 
                                       {{ getImageThumb($post->image_block_2, 1000, 1002) }} 1000w, 
                                       {{ getImageThumb($post->image_block_2, 1533, 1536) }} 1533w, 
                                       {{ getImageThumb($post->image_block_2, 768, 769) }} 768w, 
                                       {{ getImageThumb($post->image_block_2, 150, 150) }} 150w, 
                                       {{ getImageThumb($post->image_block_2, 100, 100) }} 100w"
                                             sizes="(max-width: 1707px) 100vw, 1707px" />
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4af265a animated-fast elementor-invisible"
                             data-id="4af265a" data-element_type="column"
                             data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;animation_delay&quot;:100}">
                             <div class="elementor-widget-wrap elementor-element-populated">

                                 <div class="elementor-element elementor-element-85fd512 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                     data-id="85fd512" data-element_type="widget" data-widget_type="divider.default">
                                     <div class="elementor-widget-container">
                                         <div class="elementor-divider">
                                             <span class="elementor-divider-separator">
                                             </span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="elementor-element elementor-element-24b208f elementor-widget elementor-widget-text-editor"
                                     data-id="24b208f" data-element_type="widget" data-widget_type="text-editor.default">
                                     <div class="elementor-widget-container">
                                         {!! $post->content_block_2 !!}
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </section>
             @endif
             @if (!empty($photos))
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

                                 <section
                                     class="elementor-section elementor-inner-section elementor-element elementor-element-b658847 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                     data-id="b658847" data-element_type="section">
                                     <div class="elementor-container elementor-column-gap-default sliders-brands">
                                         @foreach ($photos as $item)
                                             <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-e87d1b5"
                                                 data-id="e87d1b5" data-element_type="column">
                                                 <div class="elementor-widget-wrap elementor-element-populated">
                                                     <div class="elementor-element elementor-element-9f6740d elementor-widget elementor-widget-image"
                                                         data-id="9f6740d" data-element_type="widget"
                                                         data-widget_type="image.default">
                                                         <div class="elementor-widget-container">
                                                             {!! getThumbnail($item, 300, 300, 'attachment-large size-large wp-image-2835') !!}
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>

                                 </section>
                             </div>
                         </div>
                     </div>
                 </section>
             @endif
             <section
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
                                                                         <div class="ti-profile-img">
                                                                             {!! getThumbnail($item, 50, 50, 'attachment-large size-large wp-image-2835') !!}
                                                                         </div>
                                                                         <div class="ti-profile-details">
                                                                             <div class="ti-name">{{ $item->fullname }}
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
                                                                     <div class="ti-review-text-container ti-review-content line-clamp-3"
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

             <section
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
                     <div class="pt-[56%] relative mx-6 sm:mx-12 mb-4 box-show-image-photo">
                         <img alt="Gallery" loading="lazy" width="739" height="783" decoding="async"
                             data-nimg="1" class="top-0 left-0 w-full h-full absolute object-cover rounded"
                             style="color:transparent"
                             srcset="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F6.c2a3c601.jpg&amp;w=750&amp;q=75 1x, https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F6.c2a3c601.jpg&amp;w=1920&amp;q=75 2x"
                             src="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F6.c2a3c601.jpg&amp;w=1920&amp;q=75">
                     </div>
                     <div class="relative w-full px-6 sm:px-12">
                         <div class="ant-carousel css-1kkcnz3">
                             <div class="sliders-photo SectionFive__GalleryCarousel">
                                 <div class="slide-item">
                                     <div class="item-block" tabindex="-1">
                                         <img alt="Gallery 0" loading="lazy" decoding="async" data-nimg="1"
                                             style="color:transparent"
                                             srcset="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg&amp;w=1080&amp;q=75 1x, https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg&amp;w=2048&amp;q=75 2x"
                                             src="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg">
                                     </div>
                                 </div>
                                 <div class="slide-item">
                                     <div class="item-block" tabindex="-1">
                                         <img alt="Gallery 1" decoding="async" data-nimg="1" style="color:transparent"
                                             srcset="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg&amp;w=256&amp;q=75 1x, https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg&amp;w=640&amp;q=75 2x"
                                             src="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg">
                                     </div>
                                 </div>
                                 <div class="slide-item">
                                     <div class="item-block" tabindex="-1">
                                         <img alt="Gallery 0" loading="lazy" decoding="async" data-nimg="1"
                                             style="color:transparent"
                                             srcset="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg&amp;w=1080&amp;q=75 1x, https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg&amp;w=2048&amp;q=75 2x"
                                             src="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg">
                                     </div>
                                 </div>
                                 <div class="slide-item">
                                     <div class="item-block" tabindex="-1">
                                         <img alt="Gallery 1" decoding="async" data-nimg="1" style="color:transparent"
                                             srcset="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg&amp;w=256&amp;q=75 1x, https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg&amp;w=640&amp;q=75 2x"
                                             src="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg">
                                     </div>
                                 </div>
                                 <div class="slide-item">
                                     <div class="item-block" tabindex="-1">
                                         <img alt="Gallery 0" loading="lazy" decoding="async" data-nimg="1"
                                             style="color:transparent"
                                             srcset="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg&amp;w=1080&amp;q=75 1x, https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg&amp;w=2048&amp;q=75 2x"
                                             src="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F1.3941f49d.jpg">
                                     </div>
                                 </div>
                                 <div class="slide-item">
                                     <div class="item-block" tabindex="-1">
                                         <img alt="Gallery 1" decoding="async" data-nimg="1" style="color:transparent"
                                             srcset="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg&amp;w=256&amp;q=75 1x, https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg&amp;w=640&amp;q=75 2x"
                                             src="https://www.usastarnailskilburn.co.uk/_next/image?url=%2F_next%2Fstatic%2Fmedia%2F2.c9b7a379.jpg">
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </section>

             <section
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

                 <div style="border-radius: 5px;" class="box-map">
                     <iframe
                         src="https://maps.google.com/maps?q=270 Belsize Road, Kilburn&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                         width="100%" height="100%" style="border:0px" allowfullscreen="" loading="eager"
                         referrerpolicy="no-referrer-when-downgrade" class="mx-auto rounded max-w-full"
                         title="USA Star Nails Kilburn's map"></iframe>
                 </div>
             </section>
         </div>
         <style>
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
                 top: 20px;
                 right: 10px;
             }

             @media (max-width: 576px) {
                 .elementor-2632 .elementor-element.elementor-element-4af265a>.elementor-element-populated {
                     padding: 0;
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
             jQuery('.sliders-photo').slick({
                 slidesToShow: 6,
                 slidesToScroll: 1,
                 dots: false,
                 autoplay: false,
                 autoplaySpeed: 2000, // Chuyển ảnh sau mỗi 2 giây
                 arrows: true,
                 infinite: true,
                 responsive: [{
                         breakpoint: 800, // Khi màn hình nhỏ hơn hoặc bằng 1000px
                         settings: {
                             slidesToShow: 6, // Hiển thị 5 ảnh
                         },
                     },
                     {
                         breakpoint: 600, // Khi màn hình nhỏ hơn hoặc bằng 600px
                         settings: {
                             slidesToShow: 4, // Hiển thị 4 ảnh
                         },
                     },
                     {
                         breakpoint: 400, // Khi màn hình nhỏ hơn hoặc bằng 400px
                         settings: {
                             slidesToShow: 3, // Hiển thị 3 ảnh
                         },
                     },
                 ],
             });
         </script>
     @endpush
