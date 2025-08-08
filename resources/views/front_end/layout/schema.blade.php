@if (!empty($post))
    @php
        $address = explode(',', str_replace(['Address', 'address'], '', $post->address));
        $addressRegion = explode(' ', trim($address[2] ?? ''));
        $timeopen = exportTimeOpen($post->time_open ?? '');

        $publish_at = \Carbon\Carbon::parse($post->publish_at);
        $updated_at = \Carbon\Carbon::parse($post->updated_at);

    @endphp
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Nail",
  "@id": "{{ route('post', [$post->slug]) }}",
  "name": "{{ $post->title }}",
  "url": "{{ route('post', [$post->slug]) }}",
  "image": "{{ convertPathImage($post->thumbnail) }}",
  "telephone": "{{ $post->phone }}",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "{{ trim($address[0]??'') }}",
    "addressLocality": "{{ trim($address[1]??'') }}",
    "addressRegion": "{{ trim($addressRegion[0] ?? '') }}",
    "postalCode": "{{ trim($addressRegion[1] ?? '') }}",
    "addressCountry": "{{ trim($addressRegion[3] ?? '') }}"
  },
  "priceRange": "$$",
  "servesCuisine": "{{ $post->title }} nail",
  "openingHoursSpecification": [
    @foreach ($timeopen as $k => $val)
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": "{{ $val['day'] ?? '' }}",
            @if(!empty($val['hours']) && strtolower($val['hours']) == 'closed')
                "opens": "closed"
            @else
                "opens": "{{ date('Y-m-d') }} {{ $val['hours'] }}"
            @endif 
        } {{ $k < count($timeopen) - 1 ? ',' : '' }}
    @endforeach
  ]
}
</script>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "@id": "{{ route('post', [$post->slug]) }}/#breadcrumb",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home"
    }
  ],
  "potentialAction": [
    {
      "@type": "SearchAction",
      "target": {
        "@type": "EntryPoint",
        "inLanguage": "en"
      }
    }
  ]
}
</script>


    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "@id": "{{ route('post', [$post->slug]) }}",
  "url": "{{ route('post', [$post->slug]) }}",
  "name": "{{ $post->title }}",
  "datePublished": "{{ $publish_at->format('Y-m-d\TH:i:sP') }}",
  "dateModified": "{{ $updated_at->format('Y-m-d\TH:i:sP') }}",
  "inLanguage": "en",
  "sameAs": []
}
</script>
@endif
