@php
    header('Content-type: text/xml');
    $config_website = getValueSetting('config_website');
    $config_seo = getValueSetting('config_seo');
    $date = \Carbon\Carbon::now(); // Lấy ngày hiện tại
@endphp
<?xml version = "1.0" encoding = "UTF-8"?>

<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">

    <channel>
        <title>
            <![CDATA[ {{ $config_seo->meta_title  ?? ''}} ]]>
        </title>
        <description>{{ $config_seo->meta_description  ?? ''}}</description>
        <link>{{ env('APP_URL') }}</link>


        <image>
            <url>{{ getImageThumb($config_website->logo ?? '') }}</url>
            <title>{{ $config_seo->meta_title  ?? ''}}</title>
            <link>{{ getImageThumb($config_website->logo ?? '') }}</link>
        </image>

        <atom:link href="{{ route('pinterestxxx') }}" rel="self" type="application/rss+xml" />

        <lastBuildDate>{{ $date->format('D, d M Y H:i:s \G\M\T') }}</lastBuildDate>
        <language>
            <![CDATA[ {{ app()->getLocale() }} ]]>
        </language>


        @foreach ($data as $item)
            @php
                $time = \Carbon\Carbon::parse($item->publish_at);
                $title = $item->meta_title;
                $sapo = $item->meta_description;
            @endphp

            <item>
                <title>
                    <![CDATA[ {{ $title }} ]]>
                </title>
                <link>{{ route('post', ['slug' => $item->slug]) }}</link>
                <description>
                    <![CDATA[ <div><img src="{{ getImageThumb($item->thumbnail) }}" loading="lazy" decoding="async"  class="size-large wp-image-37"
                                        alt="{{ $title }}" width="1024" height="991" sizes="auto, (max-width: 1024px) 100vw, 1024px"/> </div> ]]>
                </description>
                <guid isPermaLink="false">{{ route('post', ['slug' => $item->slug]) }}</guid>
                <dc:creator>
                    <![CDATA[{{ env('APP_NAME') }}]]>
                </dc:creator>
                <pubDate>{{ $time->format('D, d M Y H:i:s \G\M\T') }}</pubDate>

                <media:content medium="image" url="{{ getImageThumb($item->thumbnail) }}" />
            </item>
        @endforeach
    </channel>
</rss>
