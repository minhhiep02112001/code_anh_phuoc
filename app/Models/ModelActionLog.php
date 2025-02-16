<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelActionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid', 'action', 'module', 'module_id', 'data', 'ip', 'note', 'user_agent',
    ];
    protected $table = 'st_log_action';
    public $timestamps = false;
}
