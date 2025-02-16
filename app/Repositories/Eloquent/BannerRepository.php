<?php

namespace App\Repositories\Eloquent;

use App\Models\Banner;
use App\Repositories\Contracts\BannerContracts;
use App\Repositories\Repository;

class BannerRepository extends Repository implements BannerContracts
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
        return Banner::class;
    }
}