<?php

namespace App\Repositories\Eloquent;

use App\Models\Coupon;
use App\Repositories\Contracts\CouponContracts;
use App\Repositories\Repository;

class CouponRepository extends Repository implements CouponContracts
{
    protected $fillSearch = [
        'id',
        'code',
        'slug',
        'is_status',
        'is_robot',
    ];
    public function model()
    {
        return Coupon::class;
    }
}
