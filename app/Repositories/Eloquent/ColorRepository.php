<?php

namespace App\Repositories\Eloquent;

use App\Models\Color;
use App\Repositories\Contracts\ColorContracts;
use App\Repositories\Repository;

class ColorRepository extends Repository implements ColorContracts
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
        return Color::class;
    }
}