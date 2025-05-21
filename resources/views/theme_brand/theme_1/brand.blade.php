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
                         <div class="block-item">
                             <div class="elementor-container elementor-column-gap-default  ">
                                 {!! getThumbnail($item, '', '', 'attachment-large size-large wp-image-2835') !!}
                             </div>
                         </div>
                     @endforeach
                 </div>
             </section>

             <section id="about"
                 class="elementor-padding elementor-section elementor-top-section elementor-element   elementor-section-full_width elementor-section-height-default elementor-section-height-default">
                 <div class="  elementor-column-gap-default">
                     <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3098152"
                         data-id="3098152" data-element_type="column">
                         <div class="elementor-widget-wrap elementor-element-populated">
                             <div class="elementor-element elementor-element-efc34fb elementor-hidden-tablet  elementor-widget elementor-widget-heading"
                                 data-id="efc34fb" data-element_type="widget" data-widget_type="heading.default">
                                 <div class="elementor-widget-container">
                                     <h1 class="elementor-heading-title elementor-size-default">
                                         {!! "Welcome To {$post->title}" !!}
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
                                                                     {!! $post->description !!}
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
                                             <span class="elementor-icon">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                                     height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                                     preserveAspectRatio="xMidYMid meet">
                                                     <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                         fill="#000000" stroke="none">
                                                         <path
                                                             d="M1766 5110 c-416 -66 -754 -363 -870 -764 -37 -127 -51 -275 -36 -398 52 -452 353 -804 790 -926 86 -24 111 -27 270 -27 198 0 273 15 430 84 484 212 741 761 594 1267 -105 363 -396 646 -759 740 -112 28 -315 40 -419 24z m363 -231 c311 -78 563 -342 626 -658 23 -111 16 -294 -14 -399 -82 -282 -301 -502 -586 -588 -80 -24 -106 -27 -235 -27 -129 0 -155 3 -235 27 -232 70 -419 226 -525 437 -58 115 -81 204 -87 345 -11 248 64 449 236 627 213 222 522 311 820 236z">
                                                         </path>
                                                         <path
                                                             d="M793 2545 c-201 -36 -365 -124 -513 -274 -129 -130 -211 -275 -257 -457 -16 -62 -18 -125 -18 -591 l0 -523 28 -27 27 -28 993 -3 c904 -3 995 -2 1023 13 58 31 73 112 30 162 l-24 28 -934 5 -933 5 0 425 c0 367 3 434 18 492 57 227 212 414 423 509 145 66 85 62 1230 69 1000 5 1043 6 1063 24 33 30 45 78 27 119 -29 71 38 67 -1093 66 -788 -1 -1034 -4 -1090 -14z">
                                                         </path>
                                                         <path
                                                             d="M3645 2546 c-65 -21 -99 -42 -142 -89 -85 -92 -93 -132 -93 -477 l0 -270 -270 0 c-286 0 -349 -7 -416 -45 -57 -33 -118 -103 -140 -161 -16 -42 -19 -76 -19 -229 0 -168 2 -183 24 -233 29 -65 112 -143 178 -168 41 -16 89 -19 346 -22 l297 -3 0 -269 c0 -286 7 -349 45 -416 33 -57 103 -118 161 -140 42 -16 76 -19 229 -19 168 0 183 2 233 24 65 29 143 112 168 178 16 41 19 89 22 345 l3 297 297 3 c256 3 304 6 345 22 66 25 149 103 178 168 23 50 24 65 24 238 0 173 -1 188 -24 238 -29 65 -112 143 -178 168 -41 16 -89 19 -345 22 l-297 3 -3 297 c-5 342 -8 357 -89 446 -80 87 -120 100 -324 103 -119 2 -182 -1 -210 -11z m339 -210 c67 -28 66 -23 66 -404 0 -383 2 -396 65 -426 28 -14 84 -16 377 -16 381 0 376 1 404 -66 19 -45 19 -243 0 -288 -28 -67 -23 -66 -404 -66 -383 0 -396 -2 -426 -65 -14 -28 -16 -84 -16 -377 0 -381 1 -376 -66 -404 -45 -19 -243 -19 -288 0 -67 28 -66 23 -66 404 0 293 -2 349 -16 377 -30 63 -43 65 -426 65 -381 0 -376 -1 -404 66 -19 45 -19 243 0 288 28 67 23 66 404 66 293 0 349 2 377 16 63 30 65 43 65 426 0 379 -1 376 64 404 43 18 245 19 290 0z">
                                                         </path>
                                                     </g>
                                                 </svg> </span>
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
                                             <span class="elementor-icon">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                                     height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                                     preserveAspectRatio="xMidYMid meet">
                                                     <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                         fill="#000000" stroke="none">
                                                         <path
                                                             d="M695 5107 c-50 -19 -99 -54 -123 -87 -53 -71 -52 -58 -52 -839 0 -861 7 -973 85 -1296 90 -376 195 -625 344 -819 106 -139 549 -615 594 -638 30 -16 60 -22 108 -23 l65 0 70 -64 c38 -34 106 -88 152 -118 l82 -55 0 -131 c0 -107 -4 -140 -19 -172 -20 -44 -62 -90 -101 -110 -14 -7 -194 -63 -400 -124 -430 -128 -481 -147 -570 -206 -75 -50 -106 -92 -118 -156 -19 -103 26 -195 117 -242 l55 -27 1576 0 1576 0 55 27 c91 47 135 139 117 242 -20 116 -146 202 -400 276 -93 27 -98 27 -123 11 -38 -25 -50 -57 -34 -92 12 -26 30 -34 149 -74 135 -45 210 -81 242 -116 28 -32 27 -75 -2 -104 -20 -20 -33 -20 -1580 -20 -1547 0 -1560 0 -1580 20 -31 31 -30 72 2 107 43 47 146 85 537 202 223 67 425 131 448 142 63 30 134 104 169 174 26 53 29 72 33 172 2 62 6 113 9 113 3 0 38 -11 77 -25 200 -69 429 -71 619 -5 33 11 62 20 66 20 4 0 9 -48 11 -107 4 -95 8 -115 33 -168 35 -71 104 -143 166 -173 60 -28 305 -102 342 -102 15 0 37 9 48 20 25 25 26 81 2 103 -9 8 -80 34 -157 57 -159 48 -179 57 -219 97 -54 53 -66 95 -66 233 l0 125 78 52 c42 28 114 84 160 124 81 70 85 72 140 74 97 3 118 20 388 316 269 293 337 376 409 499 82 141 160 353 231 629 75 292 94 487 94 964 l0 358 -25 24 c-31 32 -69 32 -100 0 -22 -22 -25 -32 -25 -105 l0 -80 -315 0 -315 0 0 446 c0 286 4 452 10 465 24 44 55 49 311 49 l241 0 34 -34 34 -34 0 -231 c0 -150 4 -239 11 -255 23 -51 103 -55 128 -7 7 12 11 109 11 259 0 271 -6 305 -69 370 -74 76 -80 77 -401 77 l-285 0 -46 -27 c-53 -31 -92 -74 -116 -127 -15 -31 -18 -91 -21 -479 l-3 -443 -75 70 c-222 212 -479 341 -779 393 -154 26 -408 21 -550 -11 -283 -63 -513 -186 -720 -382 l-75 -72 0 154 c0 204 -14 248 -80 248 -67 0 -80 -43 -80 -261 l0 -168 -315 0 -315 0 0 446 0 446 34 34 34 34 243 0 c328 0 315 7 321 -194 3 -104 5 -109 31 -132 34 -29 56 -30 91 -3 26 20 26 21 26 157 0 130 -2 139 -28 187 -31 56 -95 109 -150 125 -53 14 -538 12 -577 -3z m2081 -752 c108 -19 205 -47 302 -87 71 -30 85 -48 35 -48 -52 0 -279 -52 -396 -91 -166 -55 -327 -134 -601 -296 -313 -185 -398 -249 -525 -403 -30 -36 -59 -65 -65 -65 -5 0 -24 22 -40 49 -30 47 -30 51 -34 205 l-4 156 53 70 c200 264 504 450 834 509 109 19 331 20 441 1z m701 -352 c50 -49 111 -116 136 -150 l47 -61 0 -169 0 -169 -30 -47 c-16 -26 -34 -47 -39 -47 -5 0 -16 11 -25 25 -28 43 -126 148 -190 203 -210 182 -508 300 -764 303 l-77 1 60 29 c179 88 508 163 727 168 l66 1 89 -87z m-2175 -350 c6 -244 14 -274 102 -382 102 -124 101 -119 104 -476 3 -304 3 -312 -18 -338 -12 -15 -27 -27 -35 -27 -16 0 -133 205 -159 280 -13 39 -20 93 -24 190 -4 119 -7 138 -25 158 -28 30 -71 29 -104 -4 l-26 -26 6 -141 c8 -216 10 -222 327 -767 290 -499 294 -509 244 -549 -39 -31 -69 -26 -114 17 -84 81 -474 518 -529 591 -118 159 -205 370 -291 706 -66 257 -90 466 -90 778 l0 197 314 0 314 0 4 -207z m3148 10 c0 -312 -24 -522 -90 -778 -86 -334 -174 -548 -289 -702 -56 -77 -446 -512 -531 -595 -45 -43 -75 -48 -114 -17 -50 40 -46 50 244 549 317 545 319 551 327 767 l6 141 -26 26 c-33 33 -76 34 -104 4 -18 -20 -21 -39 -25 -158 -4 -97 -11 -151 -24 -190 -26 -75 -143 -280 -159 -280 -8 0 -23 12 -35 27 -21 26 -21 34 -18 338 3 357 2 352 104 476 88 108 96 138 102 382 l4 207 314 0 314 0 0 -197z m-1692 62 c148 -28 286 -84 412 -167 87 -57 229 -195 285 -277 l45 -66 -20 -63 c-18 -58 -20 -92 -20 -375 0 -307 1 -313 24 -362 22 -48 61 -92 98 -111 14 -8 -7 -50 -155 -304 -164 -281 -172 -298 -175 -356 -3 -46 1 -73 16 -107 l21 -47 -62 -56 c-74 -67 -195 -148 -294 -198 -197 -98 -427 -112 -634 -36 -99 36 -269 136 -369 216 -43 35 -82 68 -85 74 -4 6 1 30 10 55 12 30 16 63 13 103 -4 54 -16 78 -175 352 l-171 294 27 17 c39 23 76 72 96 122 14 38 16 84 13 368 -3 279 -6 330 -21 369 l-18 44 45 66 c99 144 293 301 463 374 70 30 196 66 273 79 65 11 284 6 358 -8z">
                                                         </path>
                                                         <path
                                                             d="M1800 2530 c-12 -12 -20 -33 -20 -55 0 -29 6 -40 41 -65 121 -87 289 -101 424 -35 95 46 124 94 88 143 -29 39 -65 39 -141 0 -55 -27 -77 -33 -132 -33 -55 0 -77 5 -128 33 -72 37 -104 40 -132 12z">
                                                         </path>
                                                         <path
                                                             d="M2791 2524 c-47 -60 -7 -113 122 -166 39 -16 74 -21 142 -21 101 -1 171 20 244 73 35 25 41 36 41 65 0 42 -29 75 -65 75 -14 0 -53 -15 -87 -32 -52 -28 -73 -33 -128 -33 -56 0 -77 5 -130 33 -77 40 -111 41 -139 6z">
                                                         </path>
                                                         <path
                                                             d="M2295 1780 c-24 -26 -23 -74 0 -100 29 -32 134 -79 203 -91 45 -8 79 -8 125 0 68 12 173 59 202 91 40 44 10 120 -46 120 -16 0 -57 -14 -91 -32 -88 -45 -167 -45 -255 0 -72 37 -112 40 -138 12z">
                                                         </path>
                                                     </g>
                                                 </svg> </span>
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
                                             <span class="elementor-icon">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                                     height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                                     preserveAspectRatio="xMidYMid meet">
                                                     <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                         fill="#000000" stroke="none">
                                                         <path
                                                             d="M1205 4951 c-92 -24 -173 -90 -215 -176 -20 -42 -25 -68 -28 -172 l-4 -121 -247 -4 -247 -3 -76 -37 c-91 -45 -147 -103 -191 -196 l-32 -67 0 -1696 0 -1695 37 -76 c45 -91 103 -147 196 -191 l67 -32 1183 -3 1183 -2 24 24 c33 33 33 79 0 111 l-24 25 -1152 0 c-875 0 -1162 3 -1193 12 -55 16 -138 99 -154 154 -9 32 -12 340 -12 1298 l0 1256 2240 0 2240 0 0 -695 0 -696 25 -24 c32 -33 78 -33 111 0 l24 25 -2 1102 -3 1103 -32 67 c-44 93 -100 151 -191 196 l-76 37 -247 3 -247 4 -4 121 c-4 116 -6 125 -38 185 -36 69 -79 109 -150 144 -66 32 -196 31 -265 -2 -64 -31 -124 -91 -155 -155 -20 -43 -25 -68 -28 -172 l-4 -123 -318 0 -318 0 -4 123 c-4 116 -6 125 -38 185 -36 69 -79 109 -150 144 -66 32 -196 31 -265 -2 -64 -31 -124 -91 -155 -155 -20 -43 -25 -68 -28 -172 l-4 -123 -318 0 -318 0 -4 123 c-4 116 -6 125 -38 185 -55 104 -142 160 -259 167 -36 2 -79 1 -96 -4z m163 -178 c14 -10 35 -32 46 -47 20 -26 21 -40 21 -326 0 -286 -1 -300 -21 -326 -39 -53 -71 -69 -134 -69 -63 0 -95 16 -134 69 -20 26 -21 43 -24 299 -2 150 0 286 3 304 7 40 49 91 90 109 40 19 120 12 153 -13z m1280 0 c14 -10 35 -32 46 -47 20 -26 21 -40 21 -326 0 -286 -1 -300 -21 -326 -39 -53 -71 -69 -134 -69 -63 0 -95 16 -134 69 -20 26 -21 43 -24 299 -2 150 0 286 3 304 7 40 49 91 90 109 40 19 120 12 153 -13z m1280 0 c14 -10 35 -32 46 -47 20 -26 21 -40 21 -326 0 -286 -1 -300 -21 -326 -39 -53 -71 -69 -134 -69 -63 0 -95 16 -134 69 -20 26 -21 43 -24 299 -2 150 0 286 3 304 7 40 49 91 90 109 40 19 120 12 153 -13z m-2966 -575 c4 -100 9 -132 26 -168 34 -71 75 -113 144 -151 58 -31 70 -34 148 -34 78 0 90 3 148 34 70 38 101 70 139 145 23 45 27 66 31 174 l4 122 318 0 318 0 4 -122 c4 -100 9 -132 26 -168 34 -71 75 -113 144 -151 58 -31 70 -34 148 -33 72 0 93 4 136 26 76 40 107 70 144 140 32 60 34 69 38 186 l4 122 318 0 318 0 4 -122 c4 -100 9 -132 26 -168 34 -71 75 -113 144 -151 58 -31 70 -34 148 -34 78 0 90 3 148 34 70 38 101 70 139 145 23 45 27 66 31 174 l4 122 216 0 c139 0 229 -4 256 -12 55 -16 138 -99 154 -154 8 -28 12 -134 12 -338 l0 -296 -2240 0 -2240 0 0 296 c0 204 4 310 12 338 15 51 99 137 148 153 21 6 126 11 256 12 l222 1 4 -122z">
                                                         </path>
                                                         <path
                                                             d="M895 2946 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -165 8 -180 72 -227 26 -20 41 -21 246 -21 205 0 220 1 246 21 67 49 69 58 69 254 0 165 -2 181 -21 206 -50 67 -55 69 -282 71 -157 2 -214 0 -237 -11z m385 -266 l0 -120 -160 0 -160 0 0 120 0 120 160 0 160 0 0 -120z">
                                                         </path>
                                                         <path
                                                             d="M1855 2946 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -165 8 -180 72 -227 26 -20 41 -21 246 -21 205 0 220 1 246 21 67 49 69 58 69 254 0 165 -2 181 -21 206 -50 67 -55 69 -282 71 -157 2 -214 0 -237 -11z m385 -266 l0 -120 -160 0 -160 0 0 120 0 120 160 0 160 0 0 -120z">
                                                         </path>
                                                         <path
                                                             d="M2815 2946 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -165 8 -180 72 -227 26 -20 41 -21 246 -21 205 0 220 1 246 21 67 49 69 58 69 254 0 165 -2 181 -21 206 -50 67 -55 69 -282 71 -157 2 -214 0 -237 -11z m385 -266 l0 -120 -160 0 -160 0 0 120 0 120 160 0 160 0 0 -120z">
                                                         </path>
                                                         <path
                                                             d="M3775 2946 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -165 8 -180 72 -227 26 -20 41 -21 246 -21 205 0 220 1 246 21 67 49 69 58 69 254 0 165 -2 181 -21 206 -50 67 -55 69 -282 71 -157 2 -214 0 -237 -11z m385 -266 l0 -120 -160 0 -160 0 0 120 0 120 160 0 160 0 0 -120z">
                                                         </path>
                                                         <path
                                                             d="M895 2226 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -165 8 -180 72 -227 26 -20 41 -21 246 -21 205 0 220 1 246 21 67 49 69 58 69 254 0 165 -2 181 -21 206 -50 67 -55 69 -282 71 -157 2 -214 0 -237 -11z m385 -266 l0 -120 -160 0 -160 0 0 120 0 120 160 0 160 0 0 -120z">
                                                         </path>
                                                         <path
                                                             d="M1855 2226 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -165 8 -180 72 -227 26 -20 41 -21 246 -21 205 0 220 1 246 21 67 49 69 58 69 254 0 165 -2 181 -21 206 -50 67 -55 69 -282 71 -157 2 -214 0 -237 -11z m385 -266 l0 -120 -160 0 -160 0 0 120 0 120 160 0 160 0 0 -120z">
                                                         </path>
                                                         <path
                                                             d="M2815 2226 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -135 5 -155 24 -179 32 -44 68 -66 117 -71 39 -5 49 -2 71 20 34 34 34 79 1 112 -13 14 -31 25 -40 25 -13 0 -15 18 -15 120 l0 120 175 0 c173 0 176 0 200 25 16 15 25 36 25 55 0 19 -9 40 -25 55 -24 25 -25 25 -217 25 -138 -1 -202 -5 -223 -14z">
                                                         </path>
                                                         <path
                                                             d="M3748 2225 c-370 -62 -688 -330 -809 -683 -75 -216 -76 -460 -4 -671 118 -349 412 -610 770 -687 280 -60 586 4 820 171 71 50 191 171 240 239 88 124 161 308 184 463 38 257 -36 551 -192 759 -54 71 -183 196 -249 242 -214 147 -502 210 -760 167z m387 -173 c325 -89 554 -320 641 -648 27 -103 26 -312 -3 -419 -87 -320 -318 -551 -638 -638 -107 -29 -316 -30 -419 -3 -386 103 -648 416 -673 805 -16 248 77 490 257 671 132 131 282 211 465 246 94 18 278 11 370 -14z">
                                                         </path>
                                                         <path
                                                             d="M4410 1553 c-8 -3 -158 -148 -332 -322 l-318 -316 -147 147 c-171 170 -191 181 -244 129 -54 -55 -45 -70 169 -284 171 -170 191 -187 222 -187 32 0 61 27 383 348 192 191 355 359 363 374 20 39 18 56 -15 89 -28 28 -49 34 -81 22z">
                                                         </path>
                                                         <path
                                                             d="M895 1506 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -165 8 -180 72 -227 26 -20 41 -21 246 -21 205 0 220 1 246 21 67 49 69 58 69 254 0 165 -2 181 -21 206 -50 67 -55 69 -282 71 -157 2 -214 0 -237 -11z m385 -266 l0 -120 -160 0 -160 0 0 120 0 120 160 0 160 0 0 -120z">
                                                         </path>
                                                         <path
                                                             d="M1855 1506 c-41 -18 -83 -69 -90 -109 -4 -18 -5 -101 -3 -184 3 -165 8 -180 72 -227 26 -20 41 -21 246 -21 205 0 220 1 246 21 67 49 69 58 69 254 0 165 -2 181 -21 206 -50 67 -55 69 -282 71 -157 2 -214 0 -237 -11z m385 -266 l0 -120 -160 0 -160 0 0 120 0 120 160 0 160 0 0 -120z">
                                                         </path>
                                                     </g>
                                                 </svg> </span>
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
                                                 <svg aria-hidden="true" class="e-font-icon-svg e-fas-gift"
                                                     viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                     <path
                                                         d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z">
                                                     </path>
                                                 </svg> </span>
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
                                 <h2 class="elementor-heading-title elementor-size-default">
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

                 <div id="content">
                     {!! $post?->content !!}
                 </div>
         </div>
     </div>
     <style>
         .box-address {
             position: relative;
             display: block;
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
             var slider = jQuery('.sliders-photo');

             slider.slick({
                 slidesToShow: 6,
                 slidesToScroll: 1,
                 dots: false,
                 autoplay: false,
                 autoplaySpeed: 2000,
                 arrows: true,
                 infinite: true,
                 responsive: [{
                         breakpoint: 800,
                         settings: {
                             slidesToShow: 5,
                         },
                     },
                     {
                         breakpoint: 600,
                         settings: {
                             slidesToShow: 4,
                         },
                     },
                     {
                         breakpoint: 400,
                         settings: {
                             slidesToShow: 3,
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
