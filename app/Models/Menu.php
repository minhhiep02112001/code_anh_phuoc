<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'st_menus';
    protected $fillable = ['title', 'link', 'parent_id', 'position', 'class',   'type'];

    public static function getAllMenu($location = 0)
    {
        return self::query()->where('type', $location)->select(['id', 'title', 'parent_id', 'link', 'position', 'class'])->orderBy('position','asc')->get()->toArray();
    }
}
