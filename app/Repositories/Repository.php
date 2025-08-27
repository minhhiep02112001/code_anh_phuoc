<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

abstract class Repository extends BaseRepository
{

    /**
     * Đặt lại model về trạng thái ban đầu.
     *
     * @return $this
     * @throws RepositoryException
     */
    public function resetModel()
    {
        $this->makeModel();
        return $this;
    }

    /**
     * Lấy model hiện tại.
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Build query with search parameters.
     */
    protected function buildSearchQuery($query, array $params)
    {
        foreach ($params as $k => $v) {
            if ($v === '' || $v == null) continue;

            if ($k === 'title') {
                $query->where(function ($subQuery) use ($k, $v) {
                    $subQuery->where($k, 'like', "%{$v}%")
                        ->orWhere('id', 'like', "%{$v}%");
                });
            } elseif ($k === 'ne') {
                $query->whereNotIn($k, $v);
            } elseif (is_array($v)) {
                $query->whereIn($k, $v);
            } else {
                $query->where($k, $v);
            }
        }

        return $query;
    }

    /**
     * Đếm số bản ghi theo điều kiện, có thể ghi đè trong model con.
     */
    public function count_customer(array $where = [], $columns = '*')
    {
        $params = \Arr::only($where, $this->getCustomFillable() ?? []);

        return $this->buildSearchQuery($this->model->newQuery(), $params)->count($columns);
    }
    public function getCustomFillable()
    {
        return $this->model->getFillable();
    }
    /**
     * Lấy tất cả các bản ghi theo điều kiện tìm kiếm, có thể ghi đè trong model con.
     */
    public function getAll(array $params = [], $options = [])
    {
        $params = \Arr::only($params, $this->getCustomFillable() ?? []);
        $this->applyCriteria();
        // Sử dụng `findWhere` hoặc `all` từ BaseRepository để cache tự động được áp dụng
        $queryBuilder = $this->buildSearchQuery($this->model->newQuery(), $params);

        if (!empty($options['with'])) $queryBuilder->with($options['with']);
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

    public function deleteAll(array $ids)
    {
        return $this->model->whereIn('id', $ids)->delete();
    }
}
