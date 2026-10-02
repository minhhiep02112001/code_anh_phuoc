@php
    $menus_footer = getMenuParent(0, 1);
    $brandName = 'MENUDY';
    $title = preg_replace('/menujoys/i', $brandName, $SEO['title'] ?? ($config_website->website ?? $brandName));
    $logoPath = $config_website->logo_header ?? '';
    $useWordmark = empty($logoPath) || stripos(basename($logoPath), 'menujoys') !== false;
    $logoUrl = $useWordmark
        ? ''
        : getImageThumb($config_website->logo_footer ? $config_website->logo_header : $logoPath);
    if ($useWordmark && file_exists(public_path('assets/images/logo/menudy-logo-light.png'))) {
        $logoUrl = asset('assets/images/logo/menudy-logo-light.png');
        $useWordmark = false;
    }
@endphp

<footer class="mt-16 border-t border-purple-100 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-1"><a class="flex items-center gap-2.5 mb-4" href="/" data-discover="true">
                    @if (!empty($post))
                        <span class="text-xl font-bold tracking-tight text-slate-900">{{ $post->title }}</span>
                    @else
                        <span
                            class="text-xl font-bold tracking-tight text-slate-900">{{ $config_website->website ?? '' }}</span>
                    @endif
                </a>
                <p class="text-sm text-slate-500 leading-relaxed max-w-xs"> {!! $config_website->content_footer ?? '' !!} </p>
                @if (!empty($config_social))
                    <div class="flex items-center gap-3 mt-5">
                        @include('front_end.block.share_social', [
                            'config_social' => !empty($config_social) ? $config_social : null,
                        ])
                    </div>
                @endif
            </div>
            @if (!empty($menus_footer))
                @foreach ($menus_footer as $menu)
                    @php
                        $childs = getMenuParent($menu->id, 1);
                    @endphp

                    <div>
                        <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wide mb-4">{{ $menu->title }}
                        </h4>
                        @if (!empty($childs))
                            <ul class="space-y-2.5">
                                @foreach ($childs as $child)
                                    <li><a class="text-sm text-slate-500 hover:text-purple-800 transition-colors duration-200"
                                            href="{{ $child->link }}"
                                            title="{{ $child->title }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>

        <div class="mj-footer-bottom">
            <p class="mj-footer-copy">© <span id="mjYear">2026</span> {{ $config_website->website ?? '' }}. Discover
                local menus.</p>
        </div>
    </div>
</footer>
