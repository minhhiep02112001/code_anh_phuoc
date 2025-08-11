<?php

namespace App\Repositories\Eloquent;

use App\Models\Keyword;
use App\Repositories\Contracts\KeywordContracts;
use App\Repositories\Repository;

class KeywordRepository extends Repository implements KeywordContracts
{
    public function model()
    {
        return Keyword::class;
    }

    public function count_customer(array $where = [], $columns = '*')
    {
        $where['domain'] = env('APP_URL'); 
        return parent::count_customer($where, $columns);
    }
    public function getAll(array $params = [], $options = [])
    {
        $params['domain'] = env('APP_URL');
        return parent::getAll($params, $options);
    }

    public function create(array $attributes)
    {
        $attributes['domain'] = env('APP_URL');
        $attributes['type'] = env('APP_TYPE', 'restaurant');
        return parent::create($attributes);
    }
}
