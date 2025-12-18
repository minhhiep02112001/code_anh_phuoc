<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Product extends AbstractModel
{
    use HasFactory;
 

    protected $table = 'st_product';
    protected $fillable = [
        'title',
        'thumbnail',
        'slug',
        'description',
        'price',
        'parent_id',
        'category_id',
        'relate_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    

    public function post()
    {
        return $this->belongsTo(Post::class, 'relate_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Product::class, 'parent_id', 'id');
    }

}
