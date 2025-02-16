<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends AbstractModel
{
    use HasFactory;

    // status post
    const DRAFT = 0;
    const DRAFT_ALIAS = 'Bài nháp';
    const APPROVED = 1;
    const APPROVED_ALIAS = 'Đã xuất bản';

    const IS_MOST = 1;
    const IS_NOT_MOST = 2;
    const VIEW_HOT = 1000;

    protected $table = 'st_products';
    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'slug',
        'description',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'is_status',
        'is_robot',
        'category_id',
        'viewed' ,
        'schema',
        'avg_vote',
        'total_vote',
        'brand',
        'origin',
        'producer',
        'price',
        'price_out',
        'params',
        'unit',
        'code',
        'sell_number',
        'quantity',
        'intended_for',
        'publish_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'st_products_categorys', 'product_id', 'category_id',);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'data_id', 'id');
    }

    public function displayStatus()
    {
        $status = '';
        switch ($this->is_status) {
            case self::DRAFT;
                $status = self::DRAFT_ALIAS;
                break;
            case self::PENDING;
                $status = self::PENDING_ALIAS;
                break;
            case self::REJECT;
                $status = self::REJECT_ALIAS;
                break;
            case self::APPROVED;
                $status = self::APPROVED_ALIAS;
        }
        return $status;
    }
}
