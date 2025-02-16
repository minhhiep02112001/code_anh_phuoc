<?php

namespace App\Repositories\Eloquent;

use App\Models\Page;
use App\Repositories\Contracts\PageContracts;
use App\Repositories\Repository;

class PageRepository extends Repository implements PageContracts
{
    protected $fillSearch = [
        'id',
        'title',
        'slug', 
        'is_status',
        'is_robot',
    ];
    public function model()
    {
        return Page::class;
    }
}