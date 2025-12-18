<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'st_about';
    protected $fillable = ['title', 'slug', 'parent_id', 'relate_id', 'crawler_id'];
    public $timestamps = false; 

    public function post()
    {
        return $this->belongsTo(Post::class, 'relate_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(About::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(About::class, 'parent_id', 'id');
    }
}
