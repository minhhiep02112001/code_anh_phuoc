<?php

namespace App\Services;

use Spatie\Sitemap\Sitemap;

class CustomerSitemap extends Sitemap
{
    public function render(): string
    {
        $tags = collect($this->tags)->unique('url')->filter();

        return view('front_end.sitemap.sitemap')
            ->with(compact('tags'))
            ->render();
    }
}
