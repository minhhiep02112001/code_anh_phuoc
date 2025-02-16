<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoggedDevice extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address', 'user_id',  'device_code','user_agent', 'time'];
    protected $primaryKey = 'id';
    protected $table = 'st_login_attempts';
}
