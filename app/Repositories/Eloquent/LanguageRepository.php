<?php

namespace App\Repositories\Eloquent;
 
use App\Models\Language;
use App\Repositories\Contracts\CategoryContracts;
use App\Repositories\Repository;

class LanguageRepository extends Repository implements CategoryContracts
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
        return Language::class;
    }
    public function findCode($code){
        return $this->model->where('code', $code)->first();
    }
}
