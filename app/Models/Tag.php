<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends AbstractModel
{ 
    use HasFactory;
    protected $table = 'st_tags';
    protected $fillable = ['title', 'content', 'thumbnail', 'is_status', 'slug' , 'description', 'meta_description', 'meta_title', 'meta_keyword' , 'crawler_href' , 'is_robot' , 'type', 'is_home'];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'g_post_tag', 'tag_id', 'post_id');
    }
}
