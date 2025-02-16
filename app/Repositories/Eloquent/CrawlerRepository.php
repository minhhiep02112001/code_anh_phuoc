<?php

namespace App\Repositories\Eloquent;

use App\Models\Crawler;
use App\Repositories\Contracts\CrawlerContracts;
use App\Repositories\Repository;

class CrawlerRepository extends Repository implements CrawlerContracts
{
    protected $fillSearch = [
        'key_word',
        'slug',
        'link_google_map',
        'iframe_map',
        'address',
        'phone',
        'email',
        'time_open',
        'is_crawler',
        'relate_id',
        'google_review',
        'avg_vote',
        'is_status',
        'is_convert',
        'is_crawler_iframe_map',
        'thumbnail'
    ];
    public function model()
    {
        return Crawler::class;
    }
}