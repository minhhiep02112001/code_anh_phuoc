<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'st_orders';
    protected $fillable = [
        'code',
        'fullname',
        'email',
        'address',
        'phone',
        'discount',
        'note',
        'coupon',
        'shipping',
        'subtotal',
        'total',
        'user_id',
        'order_status_id',
        'zip_code',
        'province',
        'nationality',
        'payment_id'
    ];

    public function detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
