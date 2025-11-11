@php
    header('Content-type: text/xml');
@endphp
<?xml version = "1.0"?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:media="http://search.yahoo.com/mrss/" xml:lang="en" version="2.0">
    <channel>
        <lastBuildDate>{{ now() }}</lastBuildDate>
        <title>RSS prabez.com</title>
        <description>Google News RSS Prabez.com</description>
        <link>{{ url('/') }}</link>
        @foreach ($data as $item)
            @php
                $time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);
            @endphp
            <item>
                <guid isPermaLink="true">{{ route('detail', ['slug' => $item->slug, 'id' => $item->id]) }}</guid>
                <title>{{ $item->title }}</title>
                <description>
                    <![CDATA[ <a title="{{$item->title}}" href="{{ route('detail', ['slug' => $item->slug, 'id' => $item->id]) }}"><img src="{{convertPathImage($item->thumbnail) }}" alt="{{$item->title}}"></a></br>{!! $item->description !!} ]]>
                </description>
                <content:encoded>
                    <![CDATA[ {!! $item->description !!} ]]>
                </content:encoded>
                <pubDate>{{ $time->format('Y-m-d\TH:i:sP') }}</pubDate>
                <link>{{ route('detail', ['slug' => $item->slug, 'id' => $item->id]) }}</link>
                <guid>{{ route('detail', ['slug' => $item->slug, 'id' => $item->id]) }}</guid>
                <author>9ManhWa</author>
            </item>
        @endforeach
    </channel>
</rss>
