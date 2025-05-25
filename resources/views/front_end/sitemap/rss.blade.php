@php
    header('Content-type: text/xml');
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $date = \Carbon\Carbon::now(); // Lấy ngày hiện tại
@endphp
<?xml version = "1.0" encoding = "UTF-8"?>

<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/">

    <channel>
        <title>{{ $config_seo->meta_title  ?? ''}}</title>
        <atom:link href="{{ \Request::fullUrl() }}" rel="self" type="application/rss+xml" />


        <link>{{ env('APP_URL') }}</link>
        <description>{{ $config_seo->meta_description ?? '' }}</description>
        <lastBuildDate>{{ $date->format('D, d M Y H:i:s O') }}</lastBuildDate>
        <language>{{ app()->getLocale() }}</language>
        <sy:updatePeriod>
            hourly
        </sy:updatePeriod>
        <sy:updateFrequency>
            1
        </sy:updateFrequency>
        <image>
            <url>{{ getImageThumb($config_website->favicon ?? '') }}</url>
            <title>{{ $config_seo->meta_title  ?? ''}}</title>
            <link>{{ env('APP_URL') }}</link>
            <width>32</width>
            <height>32</height>
        </image>


        @foreach ($data as $item)
            @php
                $time = \Carbon\Carbon::parse($item->publish_at);
                $title = $item->meta_title;
                $sapo = $item->meta_description;
                $content = preg_replace('/<meta\b[^>]*>(.*?)<\/meta>/i', '', $item->content);
                $content = preg_replace('/<footnote\b[^>]*>(.*?)<\/footnote>/i', '', $content);
                $content = strip_tags($content, '<p><a><strong><em><ul><li><br><h1><h2><h3><img>');
            @endphp

            <item>
                <title>{{ $title }}</title>
                <link>{{ route('post', ['slug' => $item->slug]) }}</link>
                <dc:creator>
                    <![CDATA[{{ env('APP_NAME') }}]]>
                </dc:creator>
                <pubDate>{{ $time->format('D, d M Y H:i:s O') }}</pubDate>
                <guid isPermaLink="false">{{ route('post', ['slug' => $item->slug]) }}</guid>

                <description>
                    <![CDATA[{{ strip_tags($sapo) }}]]>
                </description>

                <content:encoded>
                    <![CDATA[
                        <img loading="lazy" decoding="async" class="size-large wp-image-37"
                             src="{{ getImageThumb($item->thumbnail) }}"
                             alt="{{ $title }}" width="1024"
                             height="991"
                             sizes="auto, (max-width: 1024px) 100vw, 1024px"/>
                    ]]>
                    <![CDATA[ {!! $content !!} ]]>
                </content:encoded>
            </item>
        @endforeach
    </channel>
</rss>
