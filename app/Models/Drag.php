<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Drag extends Model
{
    use HasFactory;

    protected $table = 'st_drag';
    protected $fillable = ['data_id', 'type', 'key', 'order'];

    public function related()
    {
        switch ($this->type) {
            case 'products':
                return $this->belongsTo(Product::class, 'data_id');
            case 'categories':
                return $this->belongsTo(Category::class, 'data_id');
            case 'posts':
                return $this->belongsTo(Post::class, 'data_id');
            case 'banners':
                return $this->belongsTo(Banner::class, 'data_id');
            default:
                return null;
        }
    }

    public static function getAllDataId($key, $type, $limit = 100)
    {

        $query = self::query();
        $key_cache = "drag_" . json_encode($key) . "_{$type}";

        if (Cache::has($key_cache) && !empty(env('RESPONSE_CACHE_ENABLED'))) {
            dd(1);
            return Cache::get($key_cache);
        }

        switch ($type) {
            case 'category':
                $query = $query->join('st_categories as c', 'c.id', '=', 'st_drag.data_id');
                $select = ['c.id', 'c.title', 'c.slug', 'c.parent_id', 'c.thumbnail', 'c.icon'];
                break;
            case 'product':
                $query = $query->join('st_products as p', 'p.id', '=', 'st_drag.data_id');
                $select = ['p.id', 'p.title', 'p.slug', 'p.price',  'p.price_out',  'p.viewed', 'p.quantity', 'p.sell_number', 'p.total_vote', 'p.avg_vote', 'p.description'];
                break;
            case 'post':
                $query = $query->join('st_post as n', 'n.id', '=', 'st_drag.data_id');
                $select = ['n.id', 'n.title', 'n.slug', 'n.description', 'n.thumbnail'];
                break;
            case 'page':
                $query = $query->join('st_page as n', 'n.id', '=', 'st_drag.data_id');
                $select = ['n.id', 'n.title', 'n.slug', 'n.content','n.description', 'n.thumbnail'];
                break;
            case 'banner':
                $query = $query->join('st_banners as bn', 'bn.id', '=', 'st_drag.data_id');
                break;
            default:
                return [];
        }

        if (is_array($key)) $query->whereIn('st_drag.key', $key);
        else $query->where('st_drag.key', $key);
        $query->where('st_drag.type', $type)
            ->orderBy('st_drag.order', 'asc')
            ->select($select ?? '*');
        $data = $query->get();
        if (!empty(env('RESPONSE_CACHE_ENABLED'))) Cache::put($key_cache, $data, 24 * 60 * 60);
        return $data;
    }

    public static function getAllData($key, $type, $limit = 100)
    {
        $query = self::query();
        $key_cache = "drag_" . json_encode($key) . "_{$type}";
        if (Cache::has($key_cache) && !empty(env('RESPONSE_CACHE_ENABLED'))) return Cache::get($key_cache);
        switch ($type) {
            case 'categories':
                $query = $query->join('st_categories as c', 'c.id', '=', 'st_drag.data_id')
                    ->select(['c.id', 'c.slug', 'c.title', 'c.thumbnail', 'c.parent_id']);
                break;
            case 'products':
                $query = $query->join('st_products as p', 'p.id', '=', 'st_drag.data_id')
                    ->select(['p.id', 'p.title', 'p.description', 'p.thumbnail', 'p.slug']);
                break;
            case 'posts':
                $query = $query->join('st_posts as n', 'n.id', '=', 'st_drag.data_id')
                    ->select(['n.id', 'n.title', 'n.content', 'n.thumbnail', 'n.slug']);
                break;
            case 'banners':
                $query = $query->join('st_banners as bn', 'bn.id', '=', 'st_drag.data_id')
                    ->select(['bn.id', 'bn.title', 'bn.image_url', 'bn.link']);
                break;
            default:
                return [];
        }
        if (is_array($key)) $query->whereIn('st_drag.key', $key);
        else $query->where('st_drag.key', $key);

        $query->where('st_drag.type', $type)
            ->orderBy('st_drag.order', 'asc');

        $data = $query->get();
        if (!empty(env('RESPONSE_CACHE_ENABLED'))) Cache::put($key_cache, $data, 24 * 60 * 60);
        return $data;
    }
}
