@php
    header('Content-type: text/xml');
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $date = \Carbon\Carbon::now(); // Lấy ngày hiện tại
@endphp
<?xml version = "1.0" encoding = "UTF-8"?>

<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">

    <channel>
        <title>
            <![CDATA[ {{$config_seo->meta_title ?? ''}} ]]>
        </title>
        <description>
            <![CDATA[ {{$config_seo->meta_description ?? ''}} ]]>
        </description>
        <link>{{env('APP_URL')}}</link>
        <image>
            <url>{{ getImageThumb($config_website->favicon ?? '') }}</url>
            <title>{{$config_seo->meta_title ?? ''}}</title>
            <link>{{env('APP_URL')}}</link>
        </image>
        <generator>https://rss.app</generator>
        <lastBuildDate>{{$date->format('D, d M Y H:i:s O')}}</lastBuildDate>
        <atom:link href="{{ \Request::fullUrl() }}" rel="self" type="application/rss+xml"/>
        <language>
            <![CDATA[ {{ app()->getLocale() }} ]]>
        </language>

        @foreach ($data as $item)

            @php
                $time = \Carbon\Carbon::parse($item->publish_at);
                $title = $item->meta_title;
                $sapo = $item->meta_description;
                $content = preg_replace('/<meta\b[^>]*>(.*?)<\/meta>/i', '', $item->content);
                $content = preg_replace('/<footnote\b[^>]*>(.*?)<\/footnote>/i', '',  $content);
                $content = strip_tags($content, '<p><a><strong><em><ul><li><br><h1><h2><h3><img>');
            @endphp

            <item>
                <title>
                    <![CDATA[ {{ $title}} ]]>
                </title>
                <description>
                    <![CDATA[ <div> <img loading="lazy" decoding="async" class="size-large wp-image-37"
                                         src="{{ getImageThumb($item->thumbnail) }}"
                                         alt="{{ $title }}" width="1024"
                                         height="991"
                                         sizes="auto, (max-width: 1024px) 100vw, 1024px"/>
                        <div>{{ $sapo}}</div></div> ]]>
                </description>
                <link>{{ route('post', ['slug' => $item->slug]) }}</link>
                <guid isPermaLink="false">{{ route('post', ['slug' => $item->slug]) }}</guid>
                <dc:creator><![CDATA[{{env('APP_NAME')}}]]></dc:creator>
                <pubDate>{{  $time->format('D, d M Y H:i:s O') }}</pubDate>
                <media:content medium="image" url="{{ getImageThumb($item->thumbnail) }}"/>
            </item>
        @endforeach
    </channel>
</rss>