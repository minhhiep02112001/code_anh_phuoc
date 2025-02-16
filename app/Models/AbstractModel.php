<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AbstractModel extends Model
{
    protected static function booted()
    {
        static::created(function ($model) {
            self::logAction('created', $model, $model->getAttributes());
        });


        static::updated(function ($model) {
            self::logAction('updated', $model,   $model->getAttributes());
        });


        static::deleted(function ($model) {
            self::logAction('deleted', $model, $model->getAttributes());
        });
    }

    protected static function logAction($action, $model, $value)
    {
        $user = Auth::guard('admin')->user();
        ModelActionLog::create([
            'uid' => $user ? $user->id : null,
            'action' => $action,
            'note' => ucfirst($action) . " {$model->table} " . (!empty($model->id) ? ' có id là:' .  $model->id : ''),
            'module' => $model->table,
            'module_id' => $model->id,
            'data' =>  json_encode($value),
            'ip' => request()->ip(),
            'device_code' => request()->header('Device-Code'),
            'user_agent' => request()->header('User-Agent'),
            'time' => now(),
        ]);
    }

    public function getData($key, $data = [], $delete_cache = false, $time_cache = 60 * 60)
    {
        $config_cache =  env("CONFIG_CACHE_MODEL", "file");
        $key = env("APP_NAME") . "_$key";
        // Kiểm tra xem dữ liệu đã được lưu trong cache chưa
        if (Cache::store($config_cache)->has($key)) {
            if ($delete_cache) Cache::store($config_cache)->delete($key);
            else return Cache::store($config_cache)->get($key);
        }
        if (empty(env('APP_MODEL_CACHE'))) {
            Cache::store($config_cache)->delete($key);
        }
        // Nếu không, thực hiện công việc để lấy dữ liệu

        $result = $this->fetchData($data['where'] ?? [], $data['option'] ?? []);

        // Lưu dữ liệu vào cache để sử dụng sau này
        if (!empty(env('APP_MODEL_CACHE'))) {
            Cache::store($config_cache)->put($key, $result, $time_cache); // Lưu dữ liệu trong 60 phút (có thể điều chỉnh thời gian tùy ý)
        }

        return $result;
    }

    public function fetchData($params = [], $options = [], $table = '')
    {
        $table = !empty($table) ? $table : $this->table;
        $query = DB::table($table);
        $limit = $options['limit'] ?? 100;
        if (!empty($params['join'])) {
            $join = $params['join'];
            $query->join($join['table'], "{$table}.{$this->primaryKey}", '=', "{$join['table']}.{$join['foreign_key']}");
            unset($params['join']);
        }

        if (!empty($params['left_join'])) {
            $join = $params['left_join'];
            $query->leftJoin($join['table'], "{$table}.{$this->primaryKey}", '=', "{$join['table']}.{$join['foreign_key']}");
            unset($params['left_join']);
        }

        if (!empty($params['right_join'])) {
            $join = $params['right_join'];
            $query->rightJoin($join['table'], "{$table}.{$this->primaryKey}", '=', "{$join['table']}.{$join['foreign_key']}");
            unset($params['right_join']);
        }

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

        $query->orderBy("{$this->table}." . ($options['order_by'] ?? "updated_at"), 'desc');

        if (!empty($options['select'])) {
            $query->select($options['select']);
        }
        if (!empty($options['pagination'])) {
            return $query->simplePaginate($limit, $options['select'] ?? ['*'], 'page', $options['pagination']);
        } else {
            $offset = (($options['page'] ?? 1) - 1) * $limit;
            return $query->limit($limit)->offset($offset)->get();
        }
    }
}
