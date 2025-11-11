 <footer id="footer" class="footer-wrapper">
     <section class="section" id="section_942100954">
         <div class="bg section-bg fill bg-fill bg-loaded">
             <div class="is-border" style="border-color:rgb(211, 170, 0);border-width:5px 0px 5px 0px;">
             </div>
         </div>
         <div class="container  relative">
             <div class="row row-full-width align-center" id="row-810533686">
                 <div id="col-1322828753" class="col-12 col-md-4 logo-footer">
                     <div class="col-inner">
                         <div id="text-2430507398" class="text">
                             <h2><strong>
                                     <span>
                                         <a href="{{ url('/') }}"
                                             data-wpel-link="internal">{{ ucfirst($post->title ?? '') }}
                                         </a>
                                     </span>
                                 </strong>
                             </h2>
                             <div class="content_footer">{!! $post->content_footer ?? '' !!}</div>
                         </div>


                     </div>
                 </div>
                 <div id="contact" class="item-col col-12 col-md-4 " style="padding: 0px 10px;">
                     <div class="col-inner text-center">
                         <div id="text-3157123385" class="text">
                             <h2 class="uppercase">{{ __('config_data.pages.brand.footer_contact_detail') }}</h2>
                         </div>

                         <div id="text-611929157" class="text text-white">
                             @if (!empty($post->address))
                                 <p>
                                     <span>{{ $post->address }}</span>
                                 </p>
                             @endif
                             @if (!empty($post->phone))
                                 <p>
                                     <span>{{ $post->phone }}</span>
                                 </p>
                             @endif
                         </div>

                         <div class="social-icons follow-icons full-width text-center">
                             @include('theme_brand.theme.block.share_social', [
                                 'config_social' => json_decode($post->config_social),
                             ])
                         </div>
                     </div>
                 </div>

                 <div id="time-open" class="col-12 col-md-4">
                     <div class="col-inner">
                         <div class="text text-center">
                             <h2 class="uppercase">{{ __('config_data.pages.brand.footer_hour_open') }}</h2>
                         </div>

                         <div class="text-white" style="padding: 0px 5px;">
                             {!! $post->time_open ?? '' !!}
                         </div>

                     </div>
                 </div>
             </div>

         </div>
     </section>

     <div class="absolute-footer dark medium-text-center small-text-center">
         <div class="container clearfix">
             <div class="footer-primary pull-left">
                 <div class="copyright-footer">
                 </div>
             </div>
         </div>
     </div>
 </footer>

 <style>
     .img-inner.dark {
         width: 300px;
         margin: 0 auto;
     }

     @media (min-width: 550px) {
         .img-inner.dark {
             width: 250px;
             margin: 0 auto;
         }
     }

     table.table-restaurant-time-open {
         width: 100%;
         text-align: center;
     }
 </style>
 <style>


 </style>
