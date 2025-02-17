<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'st_banner';
    protected $fillable = [
        'title',
        'thumbnail',
        'thumbnail_mobile',
        'youtobe',
        'type',
        'target',
        'position',
        'is_status',
        'description',
        'link_redirect'
    ];
    public static function getType($type)
    {
        $query = self::query();
        $key_cache = "banner_{$type}";
        if (Cache::has($key_cache) && !empty(env('RESPONSE_CACHE_ENABLED'))) return Cache::get($key_cache);

        $query->where('st_banner.type', $type)
            ->where('st_banner.is_status', 1)
            ->orderBy('st_banner.position', 'asc');
        $data = $query->get();
        if (!empty(env('RESPONSE_CACHE_ENABLED'))) Cache::put($key_cache, $data, 24 * 60 * 60);
        return $data;
    }
    public static function getTypeArr($arr)
    {
        $query = self::query();
        $key_cache = "banner_" . json_encode($arr);
        if (Cache::has($key_cache) && !empty(env('RESPONSE_CACHE_ENABLED'))) return Cache::get($key_cache);

        $query->whereIn('st_banner.type', $arr)
            ->where('st_banner.is_status', 1)
            ->orderBy('st_banner.position', 'asc');
        $data = $query->get();
        if (!empty(env('RESPONSE_CACHE_ENABLED'))) Cache::put($key_cache, $data, 24 * 60 * 60);
        return $data;
    }
}
