 <div id="header-full-top" class="section header-full-top fixdiv clearfix">
     <div class="container" style="display:flex;justify-content: space-between;">
         <div class="logo-in make-left">
             <a href="/" class="make-left" title="<?php echo $post->meta_title ?? ''; ?>">
                 {{ ucfirst($post->title ?? '') }}
             </a>
         </div>
         <div class="menu-top make-right">
             <ul class="rs make-right fs-16 tt-u top-nav-l">
                 <li class="margin-li-menu fwb">
                     <a class="menu-item" href="{{ route('post', [$post->slug]) }}"
                         title="{{ __('config_data.pages.menus._home') }}">
                         {{ __('config_data.pages.menus._home') }}
                     </a>
                 </li>
                 <li class="margin-li-menu fwb">
                     <a class="menu-item" href="{{ route('post', [$post->slug]) }}#about"
                         title="{{ __('config_data.pages.menus.about') }}">
                         {{ __('config_data.pages.menus.about') }}
                     </a>
                 </li>
                 <li class="margin-li-menu fwb">
                     <a class="menu-item" href="{{ route('post', [$post->slug]) }}#menu"
                         title="{{ __('config_data.pages.menus.menu') }}">
                         {{ __('config_data.pages.menus.menu') }}
                     </a>
                 </li>
                 <li class="margin-li-menu fwb">
                     <a class="menu-item" href="{{ route('post', [$post->slug]) }}#locations"
                         title="{{ __('config_data.pages.menus.location') }}">
                         {{ __('config_data.pages.menus.location') }}
                     </a>
                 </li>
                 <li class="margin-li-menu fwb">
                     <a class="menu-item" href="{{ route('post', [$post->slug]) }}#reviews"
                         title="{{ __('config_data.pages.menus.review') }}">
                         {{ __('config_data.pages.menus.review') }}
                     </a>
                 </li>
                 <li class="margin-li-menu fwb">
                     <a class="menu-item" href="{{ route('post', [$post->slug]) }}#contact"
                         title="{{ __('config_data.pages.menus.contact') }}">
                         {{ __('config_data.pages.menus.contact') }}
                     </a>
                 </li>

             </ul>
         </div>

     </div>
 </div>

 <div class="header-mobile fixdiv clearfix __web-inspector-hide-shortcut__">
     <div class="row">
         <div class="header__dropdown make-left">
             <a href="javascript:;" class="nav-icons">
                 <span></span>
                 <span></span>
                 <span></span>
             </a>
             <div class="overlay" id="overlay">
                 <nav class="overlay-menu">
                     <ul class="rs fs-25 fw-rb">

                         <li class="overlay-menu-itm border-top">
                             <a class="overlay-menu-itm-link" href="{{ route('post', [$post->slug]) }}"
                                 title="{{ __('config_data.pages.menus._home') }}">
                                 {{ __('config_data.pages.menus._home') }}
                             </a>
                         </li>
                         <li class="overlay-menu-itm border-top">
                             <a class="overlay-menu-itm-link" href="{{ route('post', [$post->slug]) }}#about"
                                 title="{{ __('config_data.pages.menus.about') }}">
                                 {{ __('config_data.pages.menus.about') }}
                             </a>
                         </li>
                         <li class="overlay-menu-itm border-top">
                             <a class="overlay-menu-itm-link" href="{{ route('post', [$post->slug]) }}#menu"
                                 title="{{ __('config_data.pages.menus.menu') }}">
                                 {{ __('config_data.pages.menus.menu') }}
                             </a>
                         </li>
                         <li class="overlay-menu-itm border-top">
                             <a class="overlay-menu-itm-link" href="{{ route('post', [$post->slug]) }}#locations"
                                 title="{{ __('config_data.pages.menus.location') }}">
                                 {{ __('config_data.pages.menus.location') }}
                             </a>
                         </li>
                         <li class="overlay-menu-itm border-top">
                             <a class="overlay-menu-itm-link" href="{{ route('post', [$post->slug]) }}#reviews"
                                 title="{{ __('config_data.pages.menus.review') }}">
                                 {{ __('config_data.pages.menus.review') }}
                             </a>
                         </li>
                         <li class="overlay-menu-itm border-top">
                             <a class="overlay-menu-itm-link" href="{{ route('post', [$post->slug]) }}#contact"
                                 title="{{ __('config_data.pages.menus.contact') }}">
                                 {{ __('config_data.pages.menus.contact') }}
                             </a>
                         </li>


                     </ul>
                 </nav>
             </div>
         </div>
         <a href="/" class="header__logo">
             {{ $post->title ?? '' }}
         </a>
     </div>
 </div>
