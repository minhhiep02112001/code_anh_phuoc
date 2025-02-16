<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'st_order_detail';
    protected $fillable = [
        'name',
        'color_id',
        'size_id',
        'image',
        'sku',
        'user_id',
        'order_id',
        'product_id',
        'price',
        'qty',
        'total'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
