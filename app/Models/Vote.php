<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address', 'post_id', 'rating' ];
    protected $primaryKey = 'id';
    protected $table = 'g_vote';
}
