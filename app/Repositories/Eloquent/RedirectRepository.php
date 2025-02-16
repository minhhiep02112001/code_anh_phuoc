<?php

namespace App\Repositories\Eloquent;

use App\Models\Redirect;
use App\Repositories\Contracts\RedirectContracts;
use App\Repositories\Repository;

class RedirectRepository extends Repository implements RedirectContracts
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
        return Redirect::class;
    }
}