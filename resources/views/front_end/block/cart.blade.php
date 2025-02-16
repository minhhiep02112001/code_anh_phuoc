@if(!empty($cartItems))

    <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer" style="bottom: 151px;">
        @foreach($cartItems as $item)

            <div class="ajaxcart__product" data-id="{{ $item->id }}">
                <div class="ajaxcart__row">
                    <div class="grid">
                        <div class="grid__item one-quarter">
                            <a href=" " class="ajaxcart__product-image">
                                <img src="assets/images/cart3_100x100.jpg" alt="Samsung Galaxy S7"></a>
                        </div>
                        <div class="grid__item three-quarters">
                            <div class="ajaxcart__product-name--wrapper">
                                {{--                                        {{route('product', ['slug'=> $item->attributes->slug, 'id'=> $item->attributes->id])}}--}}
                                <a href="" class="ajaxcart__product-name">{{$item->name}}</a>
                                <span class="ajaxcart__product-meta">Large</span>
                            </div>
                            <div class="grid--full row">
                                <div class="grid__item display-table-cell col-5">
                                    <div class="ajaxcart__qty">
                                        <button type="button"
                                                class="ajaxcart__qty-adjust ajaxcart__qty--minus icon-fallback-text"
                                                data-id="33071117382:7d2ab1761e034b0686ddc4923db9563d"
                                                data-qty="{{$item->quantity -1}}"
                                                aria-label="Reduce item quantity by one">
                                            <span class="icon icon-minus" aria-hidden="true"></span>
                                            <span class="fallback-text" aria-hidden="true">−</span>
                                        </button>
                                        <input type="text" name="updates[]" class="ajaxcart__qty-num"
                                               value="{{$item->quantity}}"
                                               data-id="33071117382:7d2ab1761e034b0686ddc4923db9563d"
                                               data-line="3" aria-label="quantity" pattern="[0-9]*">
                                        <button type="button"
                                                class="ajaxcart__qty-adjust ajaxcart__qty--plus icon-fallback-text"
                                                data-id="33071117382:7d2ab1761e034b0686ddc4923db9563d"
                                                data-qty="{{$item->quantity -1}}"
                                                aria-label="Increase item quantity by one">
                                            <span class="icon icon-plus" aria-hidden="true"></span>
                                            <span class="fallback-text" aria-hidden="true">+</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="grid__item display-table-cell col-7 text-right">
                                    <span class="ajaxcart__price">{{format_price($item->price)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="ajaxcart__footer ajaxcart__footer--fixed" style="height: 151px;">
        <div class="row">
            <div class="grid__item col-4">
                <p class="">
                    Tổng tiền:
                </p>
            </div>
            <div class="grid__item col-8 text-right">
                <p class="ajaxcart__subtotal" style="white-space: nowrap">
                    {{format_price($total)}}
                </p>
            </div>
        </div>
        <p class="ajaxcart__note text-center">
            {{--            Shipping, taxes, and discounts calculated at checkout.--}}
        </p>
        <a  href="{{route('payment')}}" class="btn--secondary btn--full cart__checkout" name="checkout">
            Thanh toán<span class="icon icon-arrow-right" aria-hidden="true"></span>
        </a>
    </div>
@else

@endif
