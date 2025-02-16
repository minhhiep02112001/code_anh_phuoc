<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryContracts;
use App\Repositories\Repository;

class CategoryRepository extends Repository implements CategoryContracts
{
    protected $fillSearch = [
        'id',
        'title',
        'slug',
        'parent_id',
        'type',
        'is_status',
        'is_robot',
    ];

    public function model()
    {
        return Category::class;
    }
}
