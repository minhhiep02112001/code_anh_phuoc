@php
    $menus_footer = getMenuParent(0, 1);
    $title = $SEO['title'] ?? ($config_website->website ?? '');
@endphp

<footer class="mj-footer" role="contentinfo">
    <div class="container-xxl">
        <div class="mj-footer-top">
            <div class="row g-5">
                <div class="col-lg-4">
                    <a class="mj-brand mj-brand-light" href="{{ $SEO['url'] ?? '/' }}"
                        aria-label="{{ $title }} home">
                        <img class="mj-brand-img"
                            src="{{ getImageThumb($config_website->logo_footer ? $config_website->logo_header : '') }}"
                            alt="{{ $title }}" width="165" height="44" />
                    </a>
                    <div class="mj-footer-blurb"> {!! $config_website->content_footer !!} </div>
                    <form class="mj-footer-news" onsubmit="return false;"
                        aria-label="Subscribe to {{ $title }} updates">
                        <label for="footerEmail" class="visually-hidden">Email</label>
                        <input type="email" id="footerEmail" placeholder="Your email" required />
                        <button type="submit" class="mj-btn mj-btn-gold">Subscribe</button>
                    </form>
                    @if (!empty($config_website->email))
                        <p class="mj-footer-contact"> <i class="bi bi-envelope" aria-hidden="true"></i> <a
                                href="mailto:{{ $config_website->email }}">{{ $config_website->email }}</a>
                        </p>
                    @endif
                </div>
                @if (!empty($menus_footer))
                    @foreach ($menus_footer as $menu)
                        @php
                            $childs = getMenuParent($menu->id, 0);
                        @endphp
                        <div class="col-6 col-md-3 col-lg-2">
                            <h3 class="mj-footer-title">{{ $menu->title }}</h3>
                            @if (!empty($childs))
                                <ul class="mj-footer-links">
                                    @foreach ($childs as $child)
                                        <li>
                                            <a href="{{ $child->link }}" title="{{ $child->title }}">
                                                {{ $child->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                @endif
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

        <div class="mj-footer-bottom">
            <p class="mj-footer-copy">© <span id="mjYear">2026</span> Menujoys. Menus That Spark Joy.</p>
            <ul class="mj-footer-legal" aria-label="Legal">
                <li><a href="privacy-policy.html" title="Privacy Policy">Privacy Policy</a></li>
                <li><a href="terms-of-service.html" title="Terms of Service">Terms of Service</a></li>
                <li><a href="content-policy.html" title="Content Policy">Content Policy</a></li>
            </ul>
            @if (!empty($config_social))
                @include('front_end.block.share_social', [
                    'config_social' => !empty($config_social) ? json_decode($config_social) : null,
                ])
            @endif
        </div>
    </div>
</footer>
