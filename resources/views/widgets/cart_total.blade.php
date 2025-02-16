<div class="order-summary order-summary-is-collapsed">
     <h2 class="visually-hidden">Thông tin đơn hàng</h2>
     <div class="order-summary-sections">
         <div class="order-summary-section order-summary-section-product-list" data-order-summary-section="line-items">
             <table class="product-table">
                 <thead>
                     <tr>
                         <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                         <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                         <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                         <th scope="col"><span class="visually-hidden">Giá</span></th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($cartItems as $item)
                         <tr class="product" data-product-id="{{ $item->id }}" data-variant-id="{{ $item->id }}">
                             <td class="product-image">
                                 <div class="product-thumbnail">
                                     <div class="product-thumbnail-wrapper">
                                         <img class="product-thumbnail-image" alt="{{ $item->name }}"
                                             src="{{ $item->attributes->image }}" />
                                     </div>
                                     <span class="product-thumbnail-quantity" aria-hidden="true">{{ $item->quantity }}</span>
                                 </div>
                             </td>
                             <td class="product-description">
                                 <span class="product-description-name order-summary-emphasis">{{ $item->name }}</span>
                             </td>
                             <td class="product-quantity visually-hidden">{{ $item->quantity }}</td>
                             <td class="product-price">
                                 <span class="order-summary-emphasis">{{ format_price($item->price * $item->quantity) }}</span>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
 
         <div class="order-summary-section order-summary-section-discount" data-order-summary-section="discount">
             <form id="form_discount_add" accept-charset="UTF-8" action="{{ route('ajax.apply.coupon') }}" method="post">
                 @csrf
                 <div class="fieldset">
                     <div class="field">
                         <div class="field-input-btn-wrapper">
                             <div class="field-input-wrapper">
                                 <label class="field-label" for="discount.code">Mã giảm giá</label>
                                 <input placeholder="Mã giảm giá" class="field-input" data-discount-field="true" autocomplete="false"
                                     autocapitalize="off" spellcheck="false" size="30" type="text" id="discount.code"
                                     name="discount.code" value="">
                             </div>
                             <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                 <span class="btn-content">Sử dụng</span>
                                 <i class="btn-spinner icon icon-button-spinner"></i>
                             </button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
 
         @if (!empty($coupons))
             <div class="order-summary-section order-summary-section-display-discount" data-order-summary-section="discount-display">
                 <div>
                     <div class="hrv-discount-choose-coupons">
                         @if ($coupons->count() > 3)
                             <div>
                                 <svg width="15" height="10" viewBox="0 0 18 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" clip-rule="evenodd"
                                         d="M17.3337 5.3335V2.00016C17.3337 1.07516 16.5837 0.333496 15.667 0.333496H2.33366C1.41699 0.333496 0.675326 1.07516 0.675326 2.00016V5.3335C1.59199 5.3335 2.33366 6.0835 2.33366 7.00016C2.33366 7.91683 1.59199 8.66683 0.666992 8.66683V12.0002C0.666992 12.9168 1.41699 13.6668 2.33366 13.6668H15.667C16.5837 13.6668 17.3337 12.9168 17.3337 12.0002V8.66683C16.417 8.66683 15.667 7.91683 15.667 7.00016C15.667 6.0835 16.417 5.3335 17.3337 5.3335ZM15.667 4.11683C14.6753 4.69183 14.0003 5.77516 14.0003 7.00016C14.0003 8.22516 14.6753 9.3085 15.667 9.8835V12.0002H2.33366V9.8835C3.32533 9.3085 4.00033 8.22516 4.00033 7.00016C4.00033 5.76683 3.33366 4.69183 2.34199 4.11683L2.33366 2.00016H15.667V4.11683ZM9.83366 9.50016H8.16699V11.1668H9.83366V9.50016ZM8.16699 6.16683H9.83366V7.8335H8.16699V6.16683ZM9.83366 2.8335H8.16699V4.50016H9.83366V2.8335Z"
                                         fill="#318DBB"></path>
                                 </svg>
 
                                 <span>Xem thêm mã giảm giá</span>
                             </div>
                         @endif
                         <div id="list_short_coupon">
                             @foreach ($coupons as $item)
                                 <span><span data-code="{{ $item->code }}">Giảm
                                         {{ $item->calculation_unit == 'percent' ? "{$item->discount_percentage}%" : format_price($item->discount_money) }}</span></span>
                             @endforeach
 
                         </div>
                     </div>
                 </div>
             </div>
         @endif
 
         <div class="order-summary-section order-summary-section-total-lines payment-lines" data-order-summary-section="payment-lines">
             <table class="total-line-table">
                 <thead>
                     <tr>
                         <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                         <th scope="col"><span class="visually-hidden">Giá</span></th>
                     </tr>
                 </thead>
                 <tbody id="total_cart">
                     <tr class="total-line total-line-subtotal">
                         <td class="total-line-name">Tạm tính</td>
                         <td class="total-line-price">
                             <span class="order-summary-emphasis" data-checkout-subtotal="{{ $total }}">
                                 {{ format_price($subtotal) }}
                             </span>
                         </td>
                     </tr>
 
                     @foreach ($conditions as $condition)
                         @if ($condition->getType() == 'coupon')
                             <tr class="total-line total-line-reduction">
                                 <td class="total-line-name">
                                     <span>{{ $condition->getName() }}</span>
                                     <span class="applied-reduction-code">
                                         <svg width="16" height="15" xmlns="http://www.w3.org/2000/svg" class="applied-reduction-code-icon" fill="#CE4549">
                                             <path d="M14.476 0H8.76c-.404 0-.792.15-1.078.42L.446 7.207c-.595.558-.595 1.463 0 2.022l5.703 5.35c.296.28.687.42 1.076.42.39 0 .78-.14 1.077-.418l7.25-6.79c.286-.268.447-.632.447-1.01V1.43C16 .64 15.318 0 14.476 0zm-2.62 5.77c-.944 0-1.713-.777-1.713-1.732 0-.954.77-1.73 1.714-1.73.945 0 1.714.776 1.714 1.73 0 .955-.768 1.73-1.713 1.73z"></path>
                                         </svg>
                                         <span class="applied-reduction-code-information">{{ $condition->getAttributes()['coupon_code'] ?? 'N/A' }}</span>
                                     </span>
 
                                     <form id="form_discount_remove" class="dp-inline-block" accept-charset="UTF-8" method="post"
                                         action="{{ route('ajax.coupon.remove') }}">
                                         @csrf
                                         <input type="hidden" name="coupon_code" value="{{ $condition->getAttributes()['coupon_code'] }}">
                                         <button type="submit" class="applied-reduction-code-clear-button icon icon-clear">
                                             <span class="visually-hidden">Xóa</span>
                                         </button>
                                     </form>
                                 </td>
                                 <td class="total-line-price">
                                     <span class="order-summary-emphasis">
                                         {{ format_price($condition->getValue()) }}
                                     </span>
                                 </td>
                             </tr>
                         @endif
                     @endforeach
 
                     @php
                         // Kiểm tra xem có phí vận chuyển không
                         $shippingCondition = $conditions->first(function ($condition) {
                             return $condition->getType() == 'shipping';
                         });
                     @endphp
 
                     @if ($shippingCondition)
                         <tr class="total-line total-line-shipping">
                             <td class="total-line-name">Phí Vận Chuyển</td>
                             <td class="total-line-price">
                                 <span class="order-summary-emphasis final_shipping" data-checkout-subtotal="{{ $shippingCondition->getValue() }}">
                                     {{ format_price($shippingCondition->getValue()) }}
                                 </span>
                             </td>
                         </tr>
                     @else
                         <tr class="total-line total-line-shipping">
                             <td class="total-line-name">Phí Vận Chuyển</td>
                             <td class="total-line-price">
                                 <span class="order-summary-emphasis final_shipping" data-checkout-subtotal="0">
                                     Miễn phí
                                 </span>
                             </td>
                         </tr>
                     @endif
 
                 </tbody>
                 <tfoot class="total-line-table-footer">
                     <tr class="total-line">
                         <td class="total-line-name payment-due-label">
                             <span class="payment-due-label-total">Tổng cộng</span>
                         </td>
                         <td class="total-line-name payment-due">
                             <span class="payment-due-price" id="payment-due-price" data-checkout-payment-due-target="{{ $total }}">
                                 {{ format_price($total) }}
                             </span>
                             <span class="checkout_version" style="display:none;" data_checkout_version="52"></span>
                         </td>
                     </tr>
                 </tfoot>
             </table>
         </div>
     </div>
 </div>
 