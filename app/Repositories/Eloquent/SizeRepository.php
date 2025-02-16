<?php

namespace App\Repositories\Eloquent;

use App\Models\Size;
use App\Repositories\Contracts\SizeContracts;
use App\Repositories\Repository;

class SizeRepository extends Repository implements SizeContracts
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
        return Size::class;
    }
}