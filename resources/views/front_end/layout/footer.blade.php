@php
    $menus_footer = getMenuParent(0, 1);
    $brandName = 'MENUDY';
    $_title = !empty($post)
        ? $post->title
        : preg_replace('/menujoys/i', $brandName, $config_website->website ?? $brandName);
    $logoPath = $config_website->logo_footer ?? $config_website->logo_header ?? '';
    $useWordmark = empty($logoPath) || stripos(basename($logoPath), 'menujoys') !== false;
    $logoUrl = $useWordmark
        ? ''
        : getImageThumb($config_website->logo_footer ? $config_website->logo_header : $logoPath);
    if ($useWordmark && file_exists(public_path('assets/images/logo/menudy-logo-light.png'))) {
        $logoUrl = asset('assets/images/logo/menudy-logo-light.png');
        $useWordmark = false;
    }
@endphp

<footer class="mj-footer" role="contentinfo">
    <div class="container-xxl">
        <div class="mj-footer-top">
            <div class="row g-5">
                <div class="col-lg-4">

                    <a class="mj-brand mj-brand-light" href="{{ $SEO['url'] ?? '/' }}"
                        aria-label="{{ $brandName }} home">
                            <img class="mj-brand-img" src="{{ $logoUrl }}" alt="{{ $brandName }}" width="165"
                                height="44" />

                    </a>

                    <p class="text-sm text-slate-500 leading-relaxed max-w-xs"> {!! $config_website->content_footer ?? '' !!} </p>

                    <form class="mj-footer-news mt-2" onsubmit="return false;"
                        aria-label="Subscribe to {{ $_title }} updates">
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
                            $childs = getMenuParent($menu->id, 1);
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
            </div>
        </div>

        <div class="mj-footer-bottom">
            <p class="mj-footer-copy">© <span id="mjYear">2026</span> MENUDY. Discover local menus.</p>
            <ul class="mj-footer-legal" aria-label="Legal">
                <li><a href="https://menudyy.com/privacy-policy.html" title="Privacy Policy">Privacy Policy</a></li>
                <li><a href="https://menudyy.com/terms-of-service.html" title="Terms of Service">Terms of Service</a>
                </li>
                <li><a href="https://menudyy.com/content-policy.html" title="Content Policy">Content Policy</a></li>
            </ul>
            @if (!empty($config_social))
                @include('front_end.block.share_social', [
                    'config_social' => !empty($config_social) ? $config_social : null,
                ])
            @endif
        </div>
    </div>
</footer>
<style>
    .mj-brand-wordmark--light {
        color: #fff;
    }
</style>
