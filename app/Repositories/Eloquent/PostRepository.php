<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostContracts;
use App\Repositories\Repository;

class PostRepository extends Repository implements PostContracts
{
    
    protected $fillSearch = [
        'id',
        'title',
        'slug', 
        'is_status',
        'is_robot',
        'type'
    ];
    public function model()
    {
        return Post::class;
    }
}