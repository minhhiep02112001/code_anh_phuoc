<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigPage extends Model
{
    use HasFactory;
    protected $table = 'st_config_page';
    protected $fillable = ['title', 'slug', 'group', 'layout', 'code'];
    public $timestamps = false;
    public function page_details()
    {
        return $this->hasMany(PageDetail::class, 'page_id', 'id');
    }

}
