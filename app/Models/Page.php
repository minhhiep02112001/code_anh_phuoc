<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends AbstractModel
{
    use HasFactory;
    protected $table = 'st_page';
    protected $fillable = ['thumbnail', 'layout', 'schema', 'is_status', 'is_robot', 'title', 'slug', 'description', 'meta_title', 'meta_keyword', 'meta_description', 'content'];
    protected $primaryKey = 'id';
}
