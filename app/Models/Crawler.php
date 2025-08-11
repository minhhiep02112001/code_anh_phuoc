<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crawler extends Model
{
    use HasFactory; 
    protected $table = 'datacenter.crawler_map';
    protected $fillable = [

        'domain',
        'type',
        'key_word',
        'slug',
        'link_google_map',
        'iframe_map',
        'address',
        'phone',
        'email',
        'time_open',
        'is_crawler',
        'is_status',
        'crawler_id',
        'relate_id',
        'google_review',
        'avg_vote',
        'is_status',
        'crawler_id',
        'is_convert',
        'is_crawler_iframe_map',
        'thumbnail'

    ];

    function keyword()
    {
        return $this->belongsTo(Keyword::class, 'crawler_id', 'id');
    }
}
