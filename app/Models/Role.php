<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'st_roles';
    protected $guarded = [];
    protected $fillable = ['title', 'code'];
    public $timestamps = false;
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'st_permissions_role', 'role_id', 'permission_id');
    }
}
