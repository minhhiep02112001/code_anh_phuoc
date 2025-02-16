<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class CustomerSitemapGenerator extends SitemapGenerator
{
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;

        $this->sitemaps = new Collection([new CustomerSitemap()]);

        $this->hasCrawled = fn (Url $url, ResponseInterface $response = null) => $url;
    }
}
