<?= '<' . '?' . 'xml version="1.0" encoding="UTF-8"?>' . "\n" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach ($data as $key => $item)
        @php
            $time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->publish_at);
        @endphp
        <url>
            <loc>{{ route('post', ['slug' => $item->slug]) }}</loc>
            <news:news>
                <news:publication>
                    <news:name>{{ env('APP_NAME')}}</news:name>
                    <news:language>{{ app()->getLocale() }}</news:language>
                </news:publication>
                <news:geo_locations>{{ env('APP_LOCATION')}}</news:geo_locations>
                <news:publication_date>{{ $time->format('Y-m-d\TH:i:sP') }}</news:publication_date>
                <news:title>{{ $item->title }}</news:title>
            </news:news>
        </url>
    @endforeach
</urlset>
