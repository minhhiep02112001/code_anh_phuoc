<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Language extends AbstractModel
{
    protected $is_cache = 1;

    use HasFactory;
    protected $table = 'st_language';
    protected $fillable = [
        'title',
        'slug',
        'code',
        'icon',
        'is_status',
        'content',
        'meta_title',
        'meta_description',
        'thumbnail',
        'lang'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'language_code', 'code');
    }

    public static function getLanguage()
    {
        $key = "languages"; 
        if (Cache::has($key)) return Cache::get($key);
        $language = self::query()->where('is_status', 1)->select(['id', 'slug', 'title', 'code', 'lang', 'thumbnail'])->get();
        Cache::put($key, $language, 60 * 60 * 24);
        return $language;       
    }
}
