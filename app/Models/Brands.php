<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Brands extends Model
{
    use HasFactory;
    protected $table = 'st_brands';
    protected $fillable = [
        'title',  'slug', 'position',  'description'
    ];
    public static function getAll()
    {
        $key_cache = "banner_st_brands";
        if (Cache::has($key_cache) ) return Cache::get($key_cache);
        $query = self::query()->orderBy('st_brands.position', 'asc');
        $data = $query->get();
        if (!empty(env('RESPONSE_CACHE_ENABLED'))) Cache::put($key_cache, $data, 24 * 60 * 60);
        return $data;
    }
}
