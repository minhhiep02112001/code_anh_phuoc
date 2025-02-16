<?php

namespace App\Repositories\Eloquent;

use App\Models\Variant;
use App\Repositories\Contracts\VariantContracts;
use App\Repositories\Repository;

class VariantRepository extends Repository implements VariantContracts
{
    
    protected $fillSearch = [
        'id',
        'title',
        'product_id',
        'slug', 
        'is_status',
        'is_robot',
    ];
    public function model()
    {
        return Variant::class;
    }
}