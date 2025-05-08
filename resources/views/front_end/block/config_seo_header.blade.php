@php
    $config_website = getValueSetting('config_website');
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
    <meta name="twitter:image" content="{{ !empty($SEO['image']) ? convertPathImage($SEO['image']) : '' }}" />
    <meta name="robots" content="{{ !empty($SEO['is_robot']) ? 'index, follow' : 'noindex,nofollow' }}" />
    <meta name="Googlebot-News" content="{{ !empty($SEO['is_robot']) ? 'index, follow' : 'noindex,nofollow' }}">
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
    <meta property="og:image"
        content="{{ !empty(config('data.cms_setting.logo')) ? convertPathImage(config('data.cms_setting.logo')) : '' }}" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{{ env('APP_URL') }}" />
    <meta name="twitter:creator" content="{{ env('APP_URL') }}">
    <meta name="twitter:title" content="{{ $meta_title }}" />
    <meta name="twitter:description" content="{{ $meta_description }}" />
    <meta name="twitter:image"
        content="{{ !empty(config('data.cms_setting.logo')) ? convertPathImage(config('data.cms_setting.logo')) : '' }}" />
    <meta name="robots" content="{{ !empty($config_seo->index) ? 'index,follow' : 'noindex,nofollow' }}" />
    <meta name="Googlebot-News" content="{{ !empty($config_seo->index) ? 'index,follow' : 'noindex,nofollow' }}">
@endif
 
<link rel="canonical" href="{{ url()->current() }}" />
<link rel="shortcut icon" href="{{ convertPathImage($config_website->favicon ?? '') }}" sizes="32x32">
<link rel="apple-touch-icon" href="{{ convertPathImage($config_website->favicon ?? '') }}" sizes="32x32">
{!! $config_website->schema ?? '' !!}
{!! $config_website->config_header ?? '' !!}
