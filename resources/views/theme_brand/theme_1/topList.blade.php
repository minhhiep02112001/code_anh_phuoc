@php
    $ver = 128;
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $config_home = getValueSetting('config_home');

    $menus_header = getMenuParent(0, 0);
    $menus_footer = getMenuParent(0, 1);
@endphp


<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.bookwell.com.au/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 15:23:10 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta name="viewport" content="width=device-width" />
    <meta charSet="utf-8" />
    <meta name="google-site-verification" content="XIP1nLPnmhXza-MULIlMIwPmXZ_m3YxV336RlJt51Ng" />
    <meta name="theme-color" content="white" />
    @include('front_end.block.config_seo_header')

    <link href="{{ asset('assets/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link rel="preload" href="{{ convertPathImage('/assets/css/fonts.css') }}?ver={{ $ver }}" as="style"
        onload="this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ convertPathImage('/assets/css/fonts.css') }}?ver={{ $ver }}">
    </noscript>

    <link rel="stylesheet" href="{{ convertPathImage('/assets/css/topList.css') }}?ver={{ $ver }}">
 
</head>

<body>
    <div id="__next">
        <div class="css-j64p7l e15axdxf1">
            <header class="e18e99my1 css-1nl879o ehep9uj0">
                <div class="e18e99my0 css-a14gsd css-1iiv58m e1xmv6f40">
                    <div class="css-1l7k9wm ehep9uj0">

                        <a href="/" class="e1g407rp0 css-mwwny2 eh0fvrz0">
                            <img style="max-height: 50px;" src="{!! getImageThumb($config_website?->logo) !!}" id="logo"
                                alt="{{ $config_website?->website }}">
                        </a>

                    </div>
                </div>
            </header>

            <div class="css-mkkf9p e15axdxf0">
                <section class="e18e99my1 css-ah6yll ehep9uj0">
                    <div class="e18e99my0 css-a14gsd css-1iiv58m e1xmv6f40">
                        <div class="css-tw4vmx css-1iiv58m e1xmv6f40">
                            <div class="css-jo2aaq elovojj0">
                                <nav>
                                    <ol class="e1n50ka2 css-esfoir e1xmv6f40">
                                        <li class="e1n50ka1 css-1nvsk3n e1xmv6f40"><a href="/"
                                                class="e1n50ka0 css-1bxmhsp eh0fvrz0">Home</a></li>
                                        <li class="e1n50ka1 css-1nvsk3n e1xmv6f40"> <a
                                                href="/venues/hairdressing/melbourne"
                                                class="e1n50ka0 css-1bxmhsp eh0fvrz0">{{ $post->title }}</a>
                                        </li>
                                    </ol>
                                </nav>
                                <h1 class="css-1xy5o1q eh0fvrz0">
                                    <div class="css-1f3l2hr elovojj0">{{ $post->title }}<!-- -->
                                        <div class="css-squ00q text-content eh0fvrz0">{{ $post->description }}</div>
                                    </div>
                                </h1>
                                <div id="collapsible-region_undefined" aria-hidden="false" role="region"
                                    style="overflow:visible;display:block;height:auto" class="css-d75zvh e1xmv6f40">
                                    <div class="css-zkadht e1xmv6f40">

                                        <div class="css-e2vg5q elovojj0">
                                            <div class="css-bjn8wh e1f2m6p01">
                                                <div id="service-category-or-tag-picker-field-group"
                                                    class="e1yxb4jn0 css-173p03h e1xmv6f40">
                                                    <div class="css-p2z5vl elovojj0">
                                                        <div class="css-kjafn5 ehep9uj0"><input type="text"
                                                                id="service-category-or-tag-picker-field-input"
                                                                placeholder="Service or Treatment"
                                                                value="Haircut and Hairdressing" autoComplete="off"
                                                                class="exhzwka0 css-ve357d ehep9uj0" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-bjn8wh e1f2m6p01">
                                                <div id="suburb-or-venue-picker-field-group"
                                                    class="e1yxb4jn0 css-173p03h e1xmv6f40">
                                                    <div class="css-p2z5vl elovojj0">
                                                        <div class="css-kjafn5 ehep9uj0"><input type="text"
                                                                id="suburb-or-venue-picker-field-input"
                                                                placeholder="Postcode, Suburb or Venue" value=""
                                                                autoComplete="off"
                                                                class="exhzwka0 css-ve357d ehep9uj0" /></div>
                                                    </div>
                                                </div>
                                            </div><button class="disabled e46r4ae0 css-fn2um eqqze3d0" disabled=""
                                                type="submit">Search<!-- --> </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="css-1a43lhx e1xmv6f40">
                            <div transform="translate(400px, -30px)" class="ep2hkag0 css-fhxwc e1xmv6f40"></div>
                            <div transform="translate(560px, -170px)" class="ep2hkag0 css-12og2a1 e1xmv6f40"></div>
                            <div transform="translate(640px, 140px)" class="ep2hkag0 css-1labv9h e1xmv6f40"></div>
                        </div>
                    </div>
                </section>
                <section class="e18e99my1 css-hq14lp ehep9uj0">
                    <div class="e18e99my0 css-a14gsd e1xmv6f40">
                        <div class="css-1pgqhx0 elovojj0">

                            <div class="container css-1iiv58m  flex  ">
                                <div class="w-full lg:w-3/5 xl:w-2/3 xl:pe-20">
                                    <div class="relative">
                                        <div class="nc-SingleContent space-y-10">
                                            <div id="single-entry-content"
                                                class="prose lg:prose-lg !max-w-screen-md mx-auto dark:prose-invert"
                                                data-content-ads-inserted="true">
                                                <div class="news-content">
                                                    {!! $post?->content !!}
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
            <footer id="footer" class="e18e99my1 css-126zv25 ehep9uj0">
                <div class="e18e99my0 css-1iiv58m e1xmv6f40">
                    <div class="css-jo2aaq elovojj0">

                        <div class="FooterLinks_innerContent__8anC0 row">
                            <div class="col col-12 col-lg-2">
                                <a href="/"
                                    class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX"
                                    aria-label="{{ $config_website?->website }}"><img style="max-height: 50px;"
                                        src="{!! getImageThumb($config_website?->logo) !!}" id="logo"
                                        alt="{{ $config_website?->website }}">
                                </a>
                            </div>
                            <div class="col col-12 col-lg-2">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">About Beyout</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-careers" id="footer-careers"
                                                target="_blank">Careers</a>
                                        </p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-customer-support" id="footer-customer-support"
                                                target="_blank">Customer Support</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-blog" id="footer-blog" target="_self">Blog</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-sitemap" id="footer-sitemap">Sitemap</a></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-12 col-lg-2">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">For business</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-partners" id="footer-partners" target="_self">For
                                                partners</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-pricing" id="footer-pricing"
                                                target="_self">Pricing</a>
                                        </p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-partners-support" id="footer-partners-support"
                                                target="_blank">Support</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-status" id="footer-status" target="_blank">Status</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-12 col-lg-2">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">Legal</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-privacy-policy" id="footer-privacy-policy"
                                                target="_blank">Privacy Policy</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-service-terms" id="footer-service-terms"
                                                target="_blank">Terms of service</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX c2bV0y POrP8y"
                                                data-qa="footer-use-terms" id="footer-use-terms"
                                                target="_blank">Terms of
                                                use</a></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-12 col-lg-2">
                                <ul
                                    class="_5zC0N5 gap-default-150 direction-default-vertical display-default-inline-flex FooterLinks_gridItem__SwRrK">
                                    <li class="p_ehs5 title">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-m-semibold">Find us on social</p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                                target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                        class="_-6pfzC I-8PaC" aria-hidden="true"><span
                                                            class="rtl-icon"><svg fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span><span class="ltr-icon"><svg
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span></span></span>Facebook</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                                target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                        class="_-6pfzC I-8PaC" aria-hidden="true"><span
                                                            class="rtl-icon"><svg fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span><span class="ltr-icon"><svg
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span></span></span>Twitter</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                                target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                        class="_-6pfzC I-8PaC" aria-hidden="true"><span
                                                            class="rtl-icon"><svg fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span><span class="ltr-icon"><svg
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span></span></span>Linkedin</a></p>
                                    </li>
                                    <li class="p_ehs5">
                                        <p class="_-wKyRQ rfrdHQ font-default-body-s-regular"><a href="#"
                                                class="BaseAnchor_i-anh__wrapper__guUVX _Xd4TX util-focusRing-overrides _0HRiNX FooterLinks_socialCopyLink__cI3Pa"
                                                target="_blank"><span class="FooterLinks_socialIcon__MdMqQ"><span
                                                        class="_-6pfzC I-8PaC" aria-hidden="true"><span
                                                            class="rtl-icon"><svg fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M14.707 6.293a1 1 0 0 1 0 1.414L7.414 15H27a1 1 0 1 1 0 2H7.414l7.293 7.293a1 1 0 0 1-1.414 1.414l-9-9a1 1 0 0 1 0-1.414l9-9a1 1 0 0 1 1.414 0"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span><span class="ltr-icon"><svg
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 32 32">
                                                                <path fill-rule="evenodd"
                                                                    d="M17.293 6.293a1 1 0 0 1 1.414 0l9 9a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-1.414-1.414L24.586 17H5a1 1 0 1 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 0-1.414"
                                                                    clip-rule="evenodd"></path>
                                                            </svg></span></span></span>Instagram</a></p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
