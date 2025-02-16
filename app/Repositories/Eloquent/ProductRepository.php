<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductContracts;
use App\Repositories\Repository;

class ProductRepository extends Repository implements ProductContracts
{
    protected $fillSearch = [
        'id',
        'title',
        'slug',
        'category_id',
        'is_status',
        'is_robot',
    ];

    public function model()
    {
        return Product::class;
    }


    public function getListProductVariant(array $params = [], $options = [])
    {
        $this->applyCriteria();
        $params = \Arr::only($params, $this->fillSearch ?? []);

        $query = $this->with(['variants' => function ($query) {
            $query->select('id', 'product_id', 'sku', 'color_id', 'size_id', 'thumbnail', 'price', 'title', 'original_price')
                ->where('is_status', 1); // Chỉ lấy các biến thể active
        }]);

        $queryBuilder = $this->buildSearchQuery($query, $params);

        if (!empty($options['order_by'])) {
            $queryBuilder->orderBy($options['order_by'][0], $options['order_by'][1] ?? 'ASC');
        } else {
            $queryBuilder->orderBy('id', 'desc');
        }

        $select = $options['select'] ?? ['*'];
        $limit = $options['limit'] ?? config('data.limit_paginate_admin', 15);
        $offset = $options['offset'] ?? 0;

        if (!empty($options['pagination'])) {
            return $queryBuilder->paginate($limit, $select);
        }

        return $queryBuilder->select($select)->offset($offset)->limit($limit)->get();
    }
}
