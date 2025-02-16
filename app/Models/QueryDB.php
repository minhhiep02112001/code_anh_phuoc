<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class QueryDB
{
    public static function all($table, $params = [], $options = [])
    {
        $query = \DB::table($table);
        if ($params) {
            foreach ($params as $k => $v) {
                if (is_array($v)) {
                    // kiem tra mang nhieu chieu hay 1 chieu
                    if (array_keys($v) !== range(0, count($v) - 1)) { // nhieu chieu
                        foreach ($v as $condition => $v) {
                            switch ($condition) {
                                case 'gt':
                                    $query->where($k, '>', $v);
                                    break;
                                case 'gte':
                                    $query->where($k, '>=', $v);
                                    break;
                                case 'lt':
                                    $query->where($k, '<', $v);
                                    break;
                                case 'lte':
                                    $query->where($k, '<=', $v);
                                    break;
                                case 'ne':
                                    $query->where($k, '<>', $v);
                                    break;
                                case 'like':
                                    $query->where($k, 'like', "%" . $v . "%");
                                    break;
                                default:
                            }
                        }
                    } else {
                        $query->whereIn($k, $v);
                    }
                } else {
                    $query->where($k, $v);
                }
            }
        }
        if (!empty($options['order_by']) && is_array($options['order_by'])) {
            array_map(function ($item) use ($query) {
                return $query->orderBy(...$item);
            }, $options['order_by']);
        }

        if (!empty($options['select'])) {
            $query->select($options['select']);
        }
        if (!empty($options['pagination'])) {
            return $query->simplePaginate($options['limit'] ?? config('data.default_limit_pagination'));
        } else {
            return $query->limit($options['limit'] ?? 500)->offset($options['offset'] ?? 0)->get();
        }
    }

    public static function getDetailBySlug($table, $slug, $params = [])
    {
        $query = DB::table($table);
    }
    
}
