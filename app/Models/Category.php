<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends AbstractModel
{
    protected $is_cache = 1;

    use HasFactory;

    protected $table = 'st_categories';
    protected $fillable = [
        'title',
        'slug',
        'crawler_href',
        'meta_title',
        'type',
        'is_status',
        'parent_id',
        'type',
        'content',
        'is_robot',
        'is_home',
        'meta_keyword',
        'meta_description',
        'thumbnail',
        'icon',
        'language_code',
        'show_content'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'st_post_categorys', 'category_id', 'post_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }


    // get product By Category:
    public static function getProductByCate($cate_id)
    {
        $select = ['title', 'create_by',
            'content',
            'viewed',
            'thumbnail',
            'is_status',
            'slug',
            'description',
            'meta_title',
            'meta_description',
            'meta_keyword',
            'is_robot',
            'internal_arr',
            'avg_vote',
            'total_vote',
            'schema',
        ];
        $story = self::query()->join('st_products', 'st_products.category_id', '=', 'st_categories.id')->where([
            'st_products.is_status' => 1,
        ])->select($select)->first();
        return $story;
    }

    public static function getCategoryChild($cate_id)
    {
        $key = "category_childs_$cate_id";
        if (Cache::has($key)) return Cache::get($key);
        $cates = self::query()->where('parent_id', $cate_id)->where('is_status', 1)->select(['id', 'slug', 'title', 'thumbnail'])->get();
        Cache::put($key, $cates, 60 * 60 * 24);
        return $cates;
    }
}
