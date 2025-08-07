<?= '<' . '?' . 'xml version="1.0" encoding="UTF-8"?>' . "\n" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach ($datas as $item)
        @php
            $time = \Carbon\Carbon::parse($item['public_at']);
        @endphp
        <url>
            <loc>{{ $item['url'] }}</loc>
            <lastmod>{{ $time->format('Y-m-d\TH:i:sP') }}</lastmod>
            <changefreq>always</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
</urlset>
