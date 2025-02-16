<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDetail extends Model
{
    use HasFactory;
    protected $table = 'st_config_page_detail';
    protected $fillable = ['form_type', 'key', 'page_id', 'group', 'value', 'title'];
    public $timestamps = false;
    public static function get_data_by_lang($code , $config_key = '' , $group = '' , $lang = ''){
        $query = self::query()->leftJoin('st_config_page','st_config_page.id', '=', 'st_config_page_detail.page_id');
        if(!empty($code)) $query->where('st_config_page.code', $code);
        if(!empty($config_key)) $query->where('st_config_page_detail.key', $config_key);
        if(!empty($group)) $query->where('st_config_page_detail.group', $group);
        // if(!empty($lang)) $query->where('page_detail_lang.language', $lang);
        return $query->select([  'st_config_page_detail.form_type' ,'st_config_page_detail.group' , 'st_config_page_detail.key' , 'st_config_page_detail.value'])->get();
    }
}
