<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Permission extends Model
{
    //
    protected $table = 'st_permissions';
    protected $fillable = [
        'title', 'code', 'parent_id',
    ];
    public function permissionsChildren()
    {
        // code...
        return $this->hasMany(Permission::class, 'parent_id', 'id');
    }

    public static function get_all()
    {
        if (Cache::has('cache_permissions')) return Cache::get('cache_permissions');
        $data = self::query()->get()->toArray();
        Cache::put('cache_permissions', $data, 365 * 24 * 60 * 60);
        return $data;
    }
}
