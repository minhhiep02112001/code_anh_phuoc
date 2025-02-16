@if(!empty($product))
    @php
        $params = !empty($product->params) ? json_decode($product->params,true) : [];
    @endphp

    <div class="item_product_main">
        <form class="variants product-action" data-cart-form="" data-id="{{$product->id}}"
              enctype="multipart/form-data">
            <div class="product-thumbnail">
                <a class="image_thumb scale_hover"
                   href="{{ route('product', ['id' => $product['id'], 'slug' => $product['slug']]) }}"
                   title="{{ $product->title }}">

                    {!! getThumbnail($product, 234, 234, 'lazyload loaded') !!}
                </a>
                @if ($product->price > $product->price_out)
                    <span class="smart">-
                    {{ round((($product->price - $product->price_out) / $product->price) * 100) }}%
                </span>
                @endif

                <a href="javascript:void(0)" class="setWishlist btn-wishlist"
                   data-wish="nuoc-uong-hong-sam-kgc-cheong-kwan-jang-tonic"
                   tabindex="0" title="Thêm vào yêu thích">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M244 84L255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84C243.1 84 244 84.01 244 84L244 84zM255.1 163.9L210.1 117.1C188.4 96.28 157.6 86.4 127.3 91.44C81.55 99.07 48 138.7 48 185.1V190.9C48 219.1 59.71 246.1 80.34 265.3L256 429.3L431.7 265.3C452.3 246.1 464 219.1 464 190.9V185.1C464 138.7 430.4 99.07 384.7 91.44C354.4 86.4 323.6 96.28 301.9 117.1L255.1 163.9z">
                        </path>
                    </svg>
                </a>
            </div>

            <div class="product-info">
                <h3 class="product-name">
                    <a class="line-clamp line-clamp-2"
                       href="{{ route('product', ['id' => $product['id'], 'slug' => $product['slug']]) }}"
                       title="{{ $product->title }}">{{ $product->title }}</a>
                </h3>
                <div class="price-box">
                    {{ format_price($product->price_out) }}
                    @if ($product->price > $product->price_out)
                        <span
                            class="compare-price">{{ format_price($product->price) }}</span>
                    @endif
                </div>

                <button class="btn-cart btn-views AddToCart" type="button" title="Mua ngay">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </div>

    {{--
        <div class="grid__item  medium-up--one-quarter ">
            <div class="grid-view-item">
                <div class="grid-normal-display">
                    <div class="grid__image product-image">
                        <a class="grid-view-item__link"
                           href="{{route('product', ['slug' => $product->slug, 'id' => $product->id])}}"
                           title="{{$product->title}}">
                            <img class="grid-view-item__image"
                                 src="{{getImageThumb($product->thumbnail, 400,400)}}"
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
                <div class="h4 grid-view-item__title  line-two">
                    <a href="{{route('product', ['slug' => $product->slug, 'id' => $product->id])}}"
                       title="{{$product->title}}">{{$product->title}}</a>
                </div>

                {!! format_vote($product->avg_vote ?? 0, $product->viewed ?? 0) !!}

                <div class="grid-view-item__meta grid-view-price"  >
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
        </div> --}}
@endif
