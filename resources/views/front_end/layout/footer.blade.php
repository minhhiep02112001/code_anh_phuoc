@php
    $menus_footer = getMenuParent(0, 1);
@endphp
<footer class="main-footer">
    <div class="auto-container">
        <div class="box-footer">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="logo-footer">
                        <a href="{{ env('APP_URL', '/') }}" title="{{ $config_website->website ?? '' }}">
                            <img src="{{ getImageThumb($config_website->logo_footer ?? '') }}" width="150"
                                alt="{{ $config_website->website ?? '' }}">
                        </a>
                        @if (!empty($config_website->content_footer))
                            <div class="text-white">
                                {!! $config_website->content_footer !!}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="footer-list">
                        <h5 class="title-footer">About Us</h5>
                        <ul class="footer-nav">
                            @foreach ($menus_footer as $menu)
                                <li><a href="{{ $menu->link }}" class="text-white"
                                        title="{{ $menu->title }}">{{ $menu->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <h5 class="title-footer">Do Business With Us</h5>
                    <ul class="footer-nav">
                        <li class="text-white">Email : {{ $config_website->email ?? '' }}</li>
                    </ul>
                    <ul class="social-icon-one">
                        <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fab fa-pinterest"></span></a></li>
                        <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                        <li><a href="#"><span class="fab fa-google"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="text  text-white">© 2025 {{ $config_website->website ?? '' }}. All rights reserved.</div>
    </div>
</footer>


<footer class="mj-footer" role="contentinfo">
    <div class="container-xxl">
        <div class="mj-footer-top">
            <div class="row g-5">
                <div class="col-lg-4"> <a class="mj-brand mj-brand-light" href="index.html"
                        aria-label="Menujoys home"> <img class="mj-brand-img"
                            src="public/images/logo/menujoys-logo-light.png" alt="Menujoys" width="165"
                            height="44" /> </a>
                    <p class="mj-footer-blurb"> A global food atlas where people taste the world before ordering.
                        Local menus, city by city, dish by dish. </p>
                    <form class="mj-footer-news" aria-label="Subscribe to Menujoys updates"> <label
                            for="footerEmail" class="visually-hidden">Email</label> <input type="email"
                            id="footerEmail" placeholder="Your email" required /> <button type="submit"
                            class="mj-btn mj-btn-gold">Subscribe</button> </form>
                    <p class="mj-footer-contact"> <i class="bi bi-envelope" aria-hidden="true"></i> <a
                            href="mailto:contact@menujoys.com">contact@menujoys.com</a> </p>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h3 class="mj-footer-title">Menujoys</h3>
                    <ul class="mj-footer-links">
                        <li><a href="about.html" title="About">About</a></li>
                        <li><a href="contact.html" title="Contact">Contact</a></li>
                        <li><a href="add-your-menu.html" title="Add Your Menu">Add Your Menu</a></li>
                        <li><a href="for-restaurants.html" title="For Restaurants">For Restaurants</a></li>
                        <li><a href="suggest-an-update.html" title="Suggest an Update">Suggest an Update</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h3 class="mj-footer-title">Explore</h3>
                    <ul class="mj-footer-links">
                        <li><a href="index.html#explore">Discover</a></li>
                        <li><a href="index.html#countries">Countries</a></li>
                        <li><a href="index.html#cities">Cities</a></li>
                        <li><a href="index.html#cuisines">Cuisines</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h3 class="mj-footer-title">Popular Countries</h3>
                    <ul class="mj-footer-links">
                        <li><a href="index.html#countries">United States</a></li>
                        <li><a href="index.html#countries">United Kingdom</a></li>
                        <li><a href="index.html#countries">Canada</a></li>
                        <li><a href="index.html#countries">Australia</a></li>
                        <li><a href="index.html#countries">Singapore</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h3 class="mj-footer-title">Popular Cuisines</h3>
                    <ul class="mj-footer-links">
                        <li><a href="index.html#cuisines">Pizza</a></li>
                        <li><a href="index.html#cuisines">Coffee</a></li>
                        <li><a href="index.html#cuisines">Burgers</a></li>
                        <li><a href="index.html#cuisines">Sushi</a></li>
                        <li><a href="index.html#cuisines">Vegan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mj-footer-mid">
            <h3 class="mj-footer-title mj-footer-title-row"> <i class="bi bi-globe2" aria-hidden="true"></i>
                Cities
                on Menujoys </h3>
            <ul class="mj-footer-tags">
                <li><a href="index.html#cities">New York</a></li>
                <li><a href="index.html#cities">London</a></li>
                <li><a href="index.html#cities">Toronto</a></li>
                <li><a href="index.html#cities">Sydney</a></li>
                <li><a href="index.html#cities">Los Angeles</a></li>
                <li><a href="index.html#cities">Melbourne</a></li>
                <li><a href="index.html#cities">Chicago</a></li>
                <li><a href="index.html#cities">Singapore</a></li>
                <li><a href="index.html#cities">Vancouver</a></li>
                <li><a href="index.html#cities">Manchester</a></li>
                <li><a href="index.html#cities">Edinburgh</a></li>
                <li><a href="index.html#cities">Brisbane</a></li>
                <li><a href="index.html#cities">Dublin</a></li>
                <li><a href="index.html#cities">Auckland</a></li>
                <li><a href="index.html#cities">Cape Town</a></li>
            </ul>
        </div>
        <div class="mj-footer-bottom">
            <p class="mj-footer-copy">© <span id="mjYear">2026</span> Menujoys. Menus That Spark Joy.</p>
            <ul class="mj-footer-legal" aria-label="Legal">
                <li><a href="privacy-policy.html" title="Privacy Policy">Privacy Policy</a></li>
                <li><a href="terms-of-service.html" title="Terms of Service">Terms of Service</a></li>
                <li><a href="content-policy.html" title="Content Policy">Content Policy</a></li>
            </ul>
            <ul class="mj-footer-social" aria-label="Social media">
                <li><a href="https://www.instagram.com/menujoys/" target="_blank" rel="noopener"
                        aria-label="Instagram"><i class="bi bi-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://x.com/menujoys" target="_blank" rel="noopener"
                        aria-label="X / Twitter"><i class="bi bi-twitter-x" aria-hidden="true"></i></a></li>
                <li><a href="https://www.tiktok.com/@menujoys" target="_blank" rel="noopener"
                        aria-label="TikTok"><i class="bi bi-tiktok" aria-hidden="true"></i></a></li>
                <li><a href="https://www.youtube.com/@menujoys" target="_blank" rel="noopener"
                        aria-label="YouTube"><i class="bi bi-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
