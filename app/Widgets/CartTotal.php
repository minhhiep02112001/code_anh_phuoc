<?php

namespace App\Widgets;

use App\Models\Coupon;
use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;

class CartTotal extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $cartItems = \Cart::getContent();
        $conditions = \Cart::getConditions();

        // Tính tổng tiền trước khi áp dụng điều kiện
        $subtotal = \Cart::getSubTotal();

        // Tính tổng tiền sau khi áp dụng điều kiện
        $total = \Cart::getTotal();

        // Tìm phí vận chuyển nếu có
        $shippingCondition = $conditions->first(function ($condition) {
            return $condition->getType() == 'shipping';
        });
        
        $coupons = Coupon::all();

        return view('widgets.cart_total', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'total' => $total,
            'conditions' => $conditions,
            'coupons' => $coupons,
            'shippingCondition' => $shippingCondition,
        ]);
     
    }
}
