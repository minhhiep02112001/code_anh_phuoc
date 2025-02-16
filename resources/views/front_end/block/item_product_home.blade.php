@if(!empty($product))
    @php
        $params = !empty($product->params) ? json_decode($product->params,true) : [];
    @endphp
    <div class="grid__item small--one-half medium-up--one-quarter one-quarter">
        <div class="grid-view-item home">
            <div class="grid-normal-display">
                <div class="grid__image product-image">
                    <a class="grid-view-item__link"
                       href="{{route('product', ['id' => $product['id'], 'slug' => $product['slug']])}}">

                        <img class="grid-view-item__image" src="{{getImageThumb($product->thumbnail, 400,400)}}"
                             alt="{{$product->title}}">
                    </a>
                    <div class="product-label">
                        @if($product->price_out < $product->price)
                            <div class="label-element deal-label">
                                <span style="color:#ffffff; background-color: #00d5d5;">Sale</span>
                            </div>
                        @endif
                    </div>
                    <ul class="action-button">
                        <li class="add-to-cart-form">
                            <div class="effect-ajax-cart">
                                <button type="button" name="add"
                                        class="btn btn-1 AddToCart add-to-cart"
                                        data-product-id="{{$product->id}}"
                                        data-qty="1" title="Buy Now"><span
                                        id="AddToCartText"><i
                                            class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                            </div>
                        </li>
                        <li class="wishlist">
                            <a class="wish-list btn wishlist" href="Javascript:void(0)"
                               data-product-id="{{$product->id}}"><i class="fa fa-heart"
                                                                     title="Wishlist"></i></a>
                        </li>
                        <li>
                            <div class="quickview">
                                <div class="product-ajax-cart hidden-xs hidden-sm">
                                    <div class="quick_shop-div">
                                        <a class="btn"
                                           href="{{route('product', ['slug' => $product->slug, 'id' => $product->id])}}">
                                            <i class="fa fa-eye" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="h4 grid-view-item__title line-two">
                <a href="{{route('product', ['id' => $product['id'], 'slug' => $product['slug']])}}">{{$product['title']}}</a>
            </div>
            {!! format_vote($product['avg_vote'] ?? 0, $product['viewed'] ?? 0) !!}

            <div class="grid-view-item__meta grid-view-price">
                @if($product->price_out < $product->price)
                    <span class="product-price__price ">
                                <span class="money" doubly-currency-usd="{{format_price($product->price_out)}}"
                                      doubly-currency="VNĐ">{{format_price($product->price_out)}}</span>
                                <span class="product-price__sale-label">Sale</span>
							</span>
                    <span class="product-price__price product-price__sale">
                                <span class="money" doubly-currency-usd="{{format_price($product->price)}}"
                                      doubly-currency="VNĐ"><del>{{format_price($product->price)}}</del></span>
                            </span>
                @else
                    <span class="product-price__price">
                                <span class="money" doubly-currency-usd="{{format_price($product->price_out)}}"
                                      doubly-currency="VNĐ">{{format_price($product->price_out)}}</span>
                            </span>
                @endif
            </div>
        </div>
    </div>
@endif
