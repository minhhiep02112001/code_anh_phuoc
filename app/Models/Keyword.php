<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Keyword extends AbstractModel
{
    protected $is_cache = 1;

    use HasFactory;
    protected $table = 'datacenter.crawler';
    protected $fillable = [
        'key_word',
        'domain',
        'type',
        'is_status',
        'count',
    ];

    public function crawler()
    {
        return $this->hasMany(Crawler::class, 'crawler_id', 'id');
    }
}
