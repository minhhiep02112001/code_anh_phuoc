@if(!empty($product))
    @php
        $params = !empty($product->params) ? json_decode($product->params,true) : [];
    @endphp
    <div class="grid-element grid__item medium-up--one-quarter one-quarter">
        <div class="grid-view-item">
            <div class="grid-normal-display">
                <div class="grid__image product-image">
                    <a class="grid-view-item__link"
                       href="{{route('product', ['slug' => $product->slug, 'id' => $product->id])}}"
                       title="{{$product->title}}">
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

                        <li class="wishlist">
                            <a class="wish-list btn wishlist" href="Javascript:void(0)"
                               data-product-id="{{$product->id}}"><i class="fa fa-heart"
                                                                     title="Wishlist"></i></a>
                        </li>
                        <li class="add-to-cart-form">
                            <div class="effect-ajax-cart">
                                <input type="hidden" name="quantity"
                                       value="1">
                                <button class="btn btn-1 select-option"
                                        type="button"
                                        onclick="javascript:location.href='product.html'"
                                        title="Select Options"><i
                                        class="fa fa-bars"></i> Options
                                </button>
                            </div>
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
                        <li class="email">
                            <a target="_blank" class="btn email-to-friend" href="#"><i class="fa fa-envelope"
                                                                                       title="Email to friend"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="grid__layout grid__information product-information">
                    <div class="h4 grid-view-item__title  line-two">
                        <a href="{{route('product', ['slug' => $product->slug, 'id' => $product->id])}}">{{$product->title}}</a>
                    </div>

                    {!! format_vote($product->avg_vote ?? 0, $product->viewed ?? 0) !!}

                    <div class="grid-view-item__meta" style="display: flex; justify-content: space-between;">
                        @if($product->price_out != $product->price)
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
            <div class="grid__layout">
                <div class="grid-hover-display">
                    <div class="top-info grid__item one-whole">
                        <div class="left-area h4  line-two">
                            <a href="{{route('product', ['slug' => $product->slug, 'id' => $product->id])}}">{{$product->title}}</a>
                        </div>
                    </div>
                    <div class="bottom-info grid__item one-whole">
                        @if(!empty($params))
                            <div class="left-area h4 grid-view-item__desc grid__item two-thirds">
                                <ul class="spec">
                                    @foreach($params as $k => $v)
                                        <li><b>{{$k}}</b>: {{$v}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        @endif
                        <div class="right-area grid-view-item__action grid__item one-third">
                            <ul class="action-button">
                                <li class="add-to-cart-form grid__item one-whole">
                                    <div class="effect-ajax-cart">
                                        <button type="button" name="add"
                                                class="btn btn-1 AddToCart add-to-cart"
                                                data-product-id="{{$product->id}}"
                                                data-qty="1" title="Buy Now"><span
                                                id="AddToCartText"><i
                                                    class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                    </div>
                                </li>

                                <li class="quick-shop grid__item one-whole">
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
                                <li class="wishlist grid__item one-whole">
                                    <a class="wish-list btn wishlist" href="Javascript:void(0)"
                                         data-product-id="{{$product->id}}"><i class="fa fa-heart"
                                                                               title="Wishlist"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-layout">
                <div class="h4 grid-view-item__title  line-two">
                    <a href="{{route('product', ['slug' => $product->slug, 'id' => $product->id])}}">{{$product->title}}</a>
                </div>
                {!! format_vote($product->avg_vote ?? 0, $product->viewed ?? 0) !!}
                <div class="grid-view-item__meta">
                    @if($product->price_out != $product->price)
                        <span class="product-price__price"><span class="money"
                                                                 doubly-currency-usd="{{format_price($product->price)}}"
                                                                 doubly-currency="VNĐ">{{format_price($product->price)}}</span>
                    </span>
                        <span class="product-price__price product-price__sale">
															<span class="money"
                                                                  doubly-currency-usd="{{format_price($product->price_out)}}"
                                                                  doubly-currency="VNĐ">{{format_price($product->price_out)}}</span>
															<span class="product-price__sale-label">Sale</span>
															</span>
                    @else
                        <span class="product-price__price product-price__sale">
															<span class="money"
                                                                  doubly-currency-usd="{{format_price($product->price_out)}}"
                                                                  doubly-currency="VNĐ">{{format_price($product->price_out)}}</span>
															<span class="product-price__sale-label">Sale</span>
															</span>
                    @endif
                </div>
                <div class="grid-description">
                    @if(!empty($params))
                        <ul class="spec">
                            @foreach($params as $k => $v)
                                <li><b>{{$k}}</b>: {{$v}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
