<?php

namespace App\Repositories\Eloquent;

use App\Models\About; 
use App\Repositories\Contracts\BannerContracts;
use App\Repositories\Repository;

class AboutRepository extends Repository implements BannerContracts
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
        return About::class;
    }
}