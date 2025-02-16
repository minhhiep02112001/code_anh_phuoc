<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "st_users";
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkPermissionAccess($key_permission)
    {

        if (Auth::user()->is_supper_admin) {
            return true;
        }

        $user_id = Auth::id();
        $key_role = "role_permission_user_{$user_id}";
        if (Cache::has($key_role)) {
            $permission = Cache::get($key_role);
        } else {
            $role = Role::findOrFail(Auth::user()->role_id);
            $permission = $role->permissions->toArray();
            Cache::put($key_role, $permission, 365 * 24 * 60 * 60);
        }
        if (collect($permission)->contains('key_code', $key_permission)) {
            return true;
        }
        return false;
    }

    function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
