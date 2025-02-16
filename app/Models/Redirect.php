<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    use HasFactory;
    protected $table ='st_redirect';  
    protected $fillable = ['type', 'url_old', 'url_new','slug', 'is_status','is_robot', 'key_id'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
