<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function loadBlockCart()
    {
        $cartItems = \Cart::getContent();

        $total = \Cart::getSubTotal(0, ',', '');
        return view('front_end.block.cart', compact('cartItems', 'total'));
    }


    public function reloadCartContent()
    {
        $cartItems = \Cart::getContent();
        $currentDate = \Carbon\Carbon::now();

        foreach ($cartItems as $item) {
            $couponCode = $item->attributes->coupon_code ?? null;

            if ($couponCode) {
                $coupon = Coupon::where('coupon_code', $couponCode)->first();

                // Nếu mã giảm giá không tồn tại hoặc đã hết hạn
                if (!$coupon || \Carbon\Carbon::parse($coupon->valid_to)->lt($currentDate)) {
                    // Cập nhật thuộc tính của sản phẩm để xóa mã giảm giá
                    \Cart::update($item->id, array(
                        'attributes' => array('coupon_code' => null, 'coupon_code_old' => $couponCode, 'coupon_message' => 'Mã giảm giá của bạn đã hết !!!',)
                    ));
                }
            }
        }

        return redirect()->back()->with('success', 'Cart content reloaded and coupons validated!');
    }


    public function cartList()
    {
        $cartItems = \Cart::getContent();
        $total = \Cart::getTotal();

        // Lấy các điều kiện (conditions) đã được áp dụng trong giỏ hàng
        $conditions = \Cart::getConditions();

        $breadcrumbs = [array('url' => '', 'title' => 'Giỏ hàng')];
        return view('front_end.cart', compact('cartItems', 'total', 'conditions', 'breadcrumbs'));
    }


    public function getToCart()
    {
        $cartItems = \Cart::getContent();

        $total = \Cart::getSubTotal(0, ',', '');
        return response()->json([
            'items' => $cartItems,
            'total' => $total,
            'template' => view('front_end.block.cart', compact('cartItems', 'total'))->render(),
        ]);
    }


    public function addToCart(Request $request)
    {
        try {

            $action = $request->action ?? '';

            switch ($action) {
                case "ajax_add_to_cart":
                    $product = Product::find($request->id ?? -1);

                    \Cart::add([
                        'id' => $request->id,
                        'name' => $product->title,
                        'price' => $product->price_out,
                        'quantity' => $request->qty ?? 1,
                        'attributes' => array(
                            'image' => $product->thumbnail,
                            'unit' => $product->unit,
                            'slug' => $product->slug,
                            'id' => $product->id,
                            'currency' => config('data.currency'),
                        )
                    ]);
                    $data = [
                        'total_quantity' => \Cart::getTotalQuantity(),
                        'total_cart' => \Cart::getTotal(),
                        'currency' => config('data.currency'),
                        //                        'html' => view('front_end._layout_order.block.list_cart')->render(),
                    ];
                    return $this->responsiveSuccess('Successfully', 'success', $data);
                    break;
                case "ajax_edit_to_cart":
                    $cart_id = $request->cart_id;
                    $item = \Cart::get($request->cart_id);
                    if (!empty($request->cart_id)) {
                        if ($request->qty == 0) {
                            \Cart::remove($cart_id);
                        } else {
                            \Cart::update(
                                $cart_id,
                                [
                                    'quantity' => array(
                                        'relative' => false,
                                        'value' => (int)$request->qty ?? 0,
                                    ),
                                    //                                    'quantity' => (int)$request->qty ?? 0,
                                ]
                            );
                        }
                    }

                    $data = [
                        'total_quantity' => \Cart::getTotalQuantity(),
                        'total_cart' => number_format(\Cart::getTotal(), 0, ',', '.'),
                        'quantity_item' => $request->qty,
                        'price' => number_format($item->price ?? 0, 0, ',', '.'),
                        'total_price' => number_format(($item->price ?? 0) * $request->qty ?? 0, 0, ',', '.'),
                        'currency' => config('data.currency'),
                        //                        'html' => view('front_end._layout_order.block.list_cart')->render(),
                    ];
                    return $this->responsiveSuccess('Successfully', 'success', $data);
                    break;
                case "ajax_delete_to_cart":
                    $item = \Cart::get($request->cart_id);
                    \Cart::remove($request->cart_id);

                    $data = [
                        'total_quantity' => \Cart::getTotalQuantity(),
                        'total_cart' => \Cart::getTotal(),
                        'currency' => $item->attributes->currency ?? '',
                        //                        'html' => view('front_end._layout_order.block.list_cart')->render(),
                    ];
                    return $this->responsiveSuccess('Successfully', 'success', $data);
                    break;

                case "ajax_clear_to_cart":
                    \Cart::clear();
                    return $this->responsiveSuccess('Successfully', 'success');
                    break;
            }

            return $this->responsiveSuccess('Warning, method false', 'warning');
        } catch (\Exception $ex) {
            return $this->responsiveError($ex->getMessage());
        }
    }


    public function order(Request $request)
    {
        if (!Auth::guard('web')->check()) {
            return response()->json(['message' => 'Bạn chưa đăng nhập !!!'], 403);
        }

        // Retrieve and validate the billing_address data
        $validArr = [
            'billing_address.full_name' => 'required|string|max:255',
            'billing_address.email' => 'required|email|max:255',
            'billing_address.phone' => 'required|string|max:15',
            'billing_address.address' => 'required|string|max:255',
            'billing_address.province_id' => 'required',
            'billing_address.district_id' => 'required',
            'billing_address.ward_id' => 'required',
        ];

        // Validate the request based on the rules defined
        $validator = \Validator::make($request->all(), $validArr);
        if ($validator->fails()) {
            return response()->json(["status" => 'error', 'message' => $validator->errors()->first(), 'error' => $validator->errors()]);
        }

        // Extract billing address and additional data
        $billingAddress = $request->input('billing_address');
        $note = $request->input('note', '');
        $orderStatusId = 1; // Assuming 1 is the default order status
       
        // Retrieve discount and shipping information from cart conditions
        $discountCondition = \Cart::getCondition('Discount');
        $shippingCondition = \Cart::getCondition('Shipping Fee');

        $discountAmount = $discountCondition ? abs($discountCondition->getValue()) : 0;
        $shippingFee = $shippingCondition ? $shippingCondition->getValue() : 0;
        $couponCode = $discountCondition ? $discountCondition->getName() : null;

        // Calculate the total amount after discount and adding the shipping fee
        $totalAmount = \Cart::getTotal() + $shippingFee;


        // Tính tổng số tiền trước khi áp dụng giảm giá
        $subtotal = \Cart::getSubTotal(0, ',', ''); 


        // Prepare order data
        $orderData = [
            'ip' => $request->ip(),
            'total' => $totalAmount,
            'subtotal' => $subtotal ,
            'code' => "MH-" . rand(10000000, 99999999) . '-' . time(),
            'discount' => $discountAmount,
            'shipping_fee' => $shippingFee,
            'coupon_code' => $couponCode,
            'fullname' => $billingAddress['full_name'],
            'email' => $billingAddress['email'],
            'address' => $billingAddress['address'],
            'phone' => $billingAddress['phone'],
            'note' => $note,
            'coupon' => $couponCode,
            'user_id' => Auth::id(),
            'order_status_id' => $orderStatusId, 
            'zip_code' => $billingAddress['zip_code'] ?? '',
            'city' => $billingAddress['city'] ?? '',
            'province_id' => $billingAddress['province_id'],
            'district_id' => $billingAddress['district_id'],
            'ward_id' => $billingAddress['ward_id'],
            'payment_id' => $billingAddress['payment_method_id'],
        ]; 
        // Check if the cart is empty
        $cartItems = \Cart::getContent();
        if (empty($cartItems) || $cartItems->count() == 0) {
            return response()->json(["status" => 'error', 'message' => "Bạn chưa mua sản phẩm nào !!!"], 200);
        }

        try {
            DB::beginTransaction();

            // Insert the order data and get the order ID
            $order_id = Order::insertGetId($orderData);

            // Prepare and insert order details
            $orderDetails = [];
            foreach ($cartItems as $cartItem) {
                $orderDetails[] = [
                    'product_id' => $cartItem->id,
                    'order_id' => $order_id,
                    'total' => $cartItem->price * $cartItem->quantity,
                    'price' => $cartItem->price,
                    'qty' => $cartItem->quantity,
                ];
            }

            if (!empty($orderDetails)) {
                OrderDetail::insert($orderDetails);
            }

            DB::commit(); // Commit the transaction

            \Cart::clear(); // Clear the cart after successful order

            return response()->json(["status" => 'success', 'message' => "Thành công, cảm ơn bạn đã mua hàng của chúng tôi !!!"], 200);
        } catch (\Exception $ex) {
            DB::rollBack(); // Rollback the transaction on error
            return response()->json(["status" => 'error', 'message' => "Lỗi hệ thống, vui lòng liên hệ với chúng tôi để được thanh toán đơn hàng này!!!"], 200);
        }
    }



    public function applyCoupon(Request $request)
    {
        $couponCode = $request->get('discount_code');
        $currentDate = \Carbon\Carbon::now();

        // Kiểm tra xem mã giảm giá có hợp lệ không
        $coupon = Coupon::where('code', $couponCode)
            ->where('is_status', 1)
            ->where('from_date', '<=', $currentDate)
            ->where('to_date', '>=', $currentDate)
            ->first();

        if (!$coupon) {
            if ($request->ajax()) {
                return response()->json(['status' => 'error', 'message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn.']);
            }
            return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ hoặc đã hết hạn.');
        }

        // Xóa tất cả các mã giảm giá hiện tại trong giỏ hàng
        \Cart::removeConditionsByType('coupon');

        // Tính toán số tiền giảm giá
        $discountAmount = 0;

        if ($coupon->calculation_unit === 'percent') {
            $discountAmount = \Cart::getSubTotal() * ($coupon->discount_percentage / 100);

            // Áp dụng giới hạn giảm giá tối đa nếu có
            if ($coupon->discount_max && $discountAmount > $coupon->discount_max) {
                $discountAmount = $coupon->discount_max;
            }
        } else {
            $discountAmount = $coupon->discount_money;

            // Áp dụng giới hạn giảm giá tối đa nếu có
            if ($coupon->discount_max && $discountAmount > $coupon->discount_max) {
                $discountAmount = $coupon->discount_max;
            }
        }

        // Thêm điều kiện giảm giá vào giỏ hàng
        \Cart::condition(new \Darryldecode\Cart\CartCondition([
            'name' => 'Discount (' . $coupon->code . ')',
            'type' => 'coupon',
            'target' => 'total',
            'value' => '-' . $discountAmount,
            'attributes' => [
                'coupon_code' => $coupon->code,
                'coupon_id' => $coupon->id,
            ]
        ]));

        // Lưu mã giảm giá vào thuộc tính của các sản phẩm trong giỏ hàng
        $cartItems = \Cart::getContent();
        foreach ($cartItems as $item) {
            \Cart::update($item->id, [
                'attributes' => array_merge($item->attributes->toArray(), ['coupon_code' => $coupon->code])
            ]);
        }

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => 'Mã giảm giá đã được áp dụng.']);
        }
        return redirect()->back()->with('success', 'Mã giảm giá đã được áp dụng.');
    }

    public function payment(Request $request)
    {
        $cartItems = \Cart::getContent();
        $coupons = Coupon::all();

        // Tính tổng số tiền trước khi áp dụng giảm giá
        $subtotal = \Cart::getSubTotal(0, ',', '');

        // Lấy các điều kiện (conditions) đã được áp dụng trong giỏ hàng
        $conditions = \Cart::getConditions();

        // Thêm phí vận chuyển nếu chưa được thêm vào
        if (!$conditions->has('Shipping Fee')) {
            $shippingFee = new \Darryldecode\Cart\CartCondition([
                'name' => 'Shipping Fee',
                'type' => 'shipping',
                'target' => 'total',
                'value' => '20000', // Giả sử phí vận chuyển là 20,000₫
            ]);
            \Cart::condition($shippingFee);
        }

        // Tính tổng số tiền sau khi đã áp dụng giảm giá và các điều kiện khác
        $total = \Cart::getTotal(0, ',', '');

        // Tính toán số tiền đã được giảm giá
        $discountAmount = $subtotal - $total + 20000; // Cộng lại phí vận chuyển vào discountAmount nếu cần

        if (empty($cartItems) || $cartItems->count() == 0) {
            return redirect()->route('dashboard')->with('notification_error', "Bạn chưa mua sản phẩm nào");
        }
        $paymentMethods = PaymentMethod::where('is_active', true)->get();
        return view('front_end.payment', compact('cartItems', 'paymentMethods', 'subtotal', 'discountAmount', 'total', 'coupons', 'conditions', 'discountAmount'));
    }


    public function updateShippingFee($newAmount)
    {
        // Get the existing conditions in the cart
        $conditions = \Cart::getConditions();

        // Check if the 'Shipping Fee' condition already exists
        if ($conditions->has('Shipping Fee')) {
            // Remove the old shipping fee condition
            \Cart::removeCartCondition('Shipping Fee');
        }

        // Add the new shipping fee condition
        $shippingFee = new \Darryldecode\Cart\CartCondition([
            'name' => 'Shipping Fee',
            'type' => 'shipping',
            'target' => 'total',
            'value' => $newAmount,
        ]);

        \Cart::condition($shippingFee);

        // Optionally, save the new shipping fee to the database
        $this->saveShippingFee($newAmount);
    }

    public function removeCoupon(Request $request)
    {
        // Lấy mã giảm giá từ request
        $couponCode = $request->get('coupon_code');

        // Lấy các điều kiện (conditions) đã được áp dụng trong giỏ hàng
        $conditions = \Cart::getConditions();

        // Tìm và loại bỏ condition có chứa mã giảm giá tương ứng
        foreach ($conditions as $condition) {
            if ($condition->getType() == 'coupon' && $condition->getAttributes()['coupon_code'] == $couponCode) {
                \Cart::removeCartCondition($condition->getName());
                break;
            }
        }

        // Thông báo cho người dùng rằng mã giảm giá đã được xóa
        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => 'Mã giảm giá đã được xóa.']);
        }

        return redirect()->back()->with('success', 'Mã giảm giá đã được xóa.');
    }
}
