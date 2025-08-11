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
        'crawler_id',
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

   public function count_customer(array $where = [], $columns = '*')
    {
        $where['domain'] = env('APP_URL'); 
        return parent::count_customer($where, $columns);
    }
    public function getAll(array $params = [], $options = [])
    {
        $params['domain'] = env('APP_URL');
        return parent::getAll($params, $options);
    }
    
    public function create(array $attributes)
    {
        $attributes['domain'] = env('APP_URL');
        $attributes['type'] = env('APP_TYPE', 'restaurant');
        return parent::create($attributes);
    }
}
