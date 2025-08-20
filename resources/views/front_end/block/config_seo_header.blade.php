@php
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $favicon = !empty($SEO['favicon']) ? $SEO['favicon'] : convertPathImage($config_website->favicon ?? '');
@endphp

@if (!empty($SEO))
    <title>{{ !empty($SEO['title']) ? replace_title($SEO['title']) : '' }}</title>
    <meta name="keyword" content="{{ !empty($SEO['meta_description']) ? replace_title($SEO['meta_keyword']) : '' }}">
    <meta name="description"
        content="{{ !empty($SEO['meta_description']) ? replace_title($SEO['meta_description']) : '' }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ !empty($SEO['meta_title']) ? replace_title($SEO['meta_title']) : '' }}" />
    <meta property="og:description"
        content="{{ !empty($SEO['meta_description']) ? replace_title($SEO['meta_description']) : '' }}" />
    <meta property="og:image" content="{{ !empty($SEO['image']) ? convertPathImage($SEO['image']) : '' }}" />
    <meta property="og:url" content="{{ !empty($SEO['url']) ? $SEO['url'] : env('APP_URL') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{{ env('APP_URL') }}" />
    <meta name="twitter:creator" content="{{ env('APP_URL') }}">
    <meta name="twitter:title" content="{{ !empty($SEO['meta_title']) ? replace_title($SEO['meta_title']) : '' }}" />
    <meta name="twitter:description"
        content="{{ !empty($SEO['meta_description']) ? replace_title($SEO['meta_description']) : '' }}" />
    <meta name="twitter:image"
        content="{{ !empty($SEO['image']) ? convertPathImage($SEO['image']) : convertPathImage($config_website->logo ?? '') }}" />
    @if (!empty($post))
        @include('front_end.layout.schema')
    @endif
    @if (!empty($page->schema))
        {!! $page->schema ?? '' !!}
    @endif
@else
    @php
        $meta_title = $config_seo->meta_title ?? '';
        $meta_keyword = $config_seo->meta_keyword ?? '';
        $meta_description = $config_seo->meta_description ?? '';
    @endphp
    <title>{{ $meta_title }}</title>
    <meta name="keyword" content="{{ $meta_keyword ?? $meta_title }}">
    <meta name="description" content="{{ $meta_description }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
    <meta property="og:image" content="{{ convertPathImage($config_website->logo ?? '') }}" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{{ env('APP_URL') }}" />
    <meta name="twitter:creator" content="{{ env('APP_URL') }}">
    <meta name="twitter:title" content="{{ $meta_title }}" />
    <meta name="twitter:description" content="{{ $meta_description }}" />
    <meta name="twitter:image" content="{{ convertPathImage($config_website->logo ?? '') }}" />
    {!! $config_website->schema ?? '' !!}
@endif

<meta name="robots" content="{{ !empty($config_seo->index) ? 'index,follow' : 'noindex,nofollow' }}" />
<meta name="Googlebot-News" content="{{ !empty($config_seo->index) ? 'index,follow' : 'noindex,nofollow' }}">
<link rel="canonical" href="{{ url()->current() }}" />
{!! $config_website->config_header ?? '' !!}

@if (!empty($post->thumbnail))
    <link rel="shortcut icon" href="{{ getImageThumb($post->thumbnail, 100, 100) }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ getImageThumb($post->thumbnail, 100, 100) }}" sizes="32x32">
@else
    <link rel="shortcut icon" href="{{ convertPathImage($config_website->favicon ?? '') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ convertPathImage($config_website->favicon ?? '') }}" sizes="32x32">
@endif
