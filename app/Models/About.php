<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';
    protected $fillable = ['title', 'slug', 'parent_id', 'relate_id', 'crawler_id'];
    public $timestamps = false;
}
