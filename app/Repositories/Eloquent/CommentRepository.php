<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Contracts\CommentContracts;
use App\Repositories\Repository;

class CommentRepository extends Repository implements CommentContracts
{
    protected $fillSearch  = [
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
    public function model()
    {
        return Comment::class;
    }
}