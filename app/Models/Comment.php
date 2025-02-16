<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Comment extends AbstractModel
{
    protected $is_cache = 1;

    use HasFactory;

    protected $table = 'st_comment';
    protected $fillable = [
        'fullname',
        'like',
        'title',
        'thumbnail',
        'content',
        'parent_id',
        'data_id',
        'type',
        'is_status',
        'total_reply',
        'user_id',
        'is_content',
        'show_home'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
}
