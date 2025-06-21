<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'st_post_images';
    protected $fillable = [  'thumbnail', 'post_id', 'position', 'type' ];
    public $timestamps = false;
}
