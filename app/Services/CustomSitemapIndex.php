<?php

namespace App\Services;

use Spatie\Sitemap\SitemapIndex;

class CustomSitemapIndex extends SitemapIndex
{
    function render(): string
    {
        $tags = $this->tags;
        return view('front_end.sitemap.sitemapIndex')
            ->with(compact('tags'))
            ->render();
    }
}
