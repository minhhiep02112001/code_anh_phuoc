<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crawler extends Model
{
    use HasFactory;
    protected $table = 'crawler_map';
    protected $fillable = [ 
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
    public $timestamps = false;
}
