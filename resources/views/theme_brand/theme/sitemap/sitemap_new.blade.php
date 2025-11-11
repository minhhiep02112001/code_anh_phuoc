<?= '<' . '?' . 'xml version="1.0" encoding="UTF-8"?>' . "\n" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach ($data as $key => $item)
        @php
            $time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);
        @endphp
        <url>
            <loc>{{ route('detail', ['slug' => $item->slug, 'id' => $item->id]) }}</loc>
            <news:news>
                <news:publication>
                    <news:name>Prabez</news:name>
                    <news:language>en-us</news:language>
                </news:publication>
                <news:geo_locations>United States</news:geo_locations>
                <news:publication_date>{{ $time->format('Y-m-d\TH:i:sP') }}</news:publication_date>
                <news:title>{{ $item->title }}</news:title>
            </news:news>
        </url>
    @endforeach
</urlset>
