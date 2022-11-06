<div>
    @if (cart_count() == 0)
    <!-- empty_cart_section - start
    ================================================== -->
    <section class="empty_cart_section section_space">
        <div class="container">
            <div class="empty_cart_content text-center">
                <span class="cart_icon">
                    <i class="icon icon-ShoppingCart"></i>
                </span>
                <h3>There are no more items in your cart</h3>
                <a class="btn btn_secondary" href="{{ route('/') }}"><i class="far fa-chevron-left"></i> Continue shopping </a>
            </div>
        </div>
    </section>
    <!-- empty_cart_section - end
    ================================================== -->
    @else

    <!-- cart_section - start
    ================================================== -->
    <section class="cart_section section_space">
        <div class="container">
            <div class="cart_table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp
                        <style>
                            .light_red{
                                background: rgba(196, 53, 53, 0.507);
                            }
                        </style>
                        @foreach ($carts as $cart)
                            <tr class="@if(get_inventory($cart->product_id, $cart->size_id, $cart->color_id) < $cart->quantity) light_red ? '' @endif">
                                <td>
                                    <div class="cart_product">
                                        <img src="{{ asset('uploads/product_thumbnail/') }}/{{ $cart->relationshipwithproduct->thumbnail }}" alt="image_not_found">
                                        <h3>
                                            <a class="text-dark" href="{{ route('single.page', $cart->product_id) }}">{{ $cart->relationshipwithproduct->name }}</a>
                                            <small>({{ $cart->relationshipwithsize->size }}, {{ $cart->relationshipwithcolor->color_name }})</small>
                                            <br> <small class="badge bg-primary">Vendor</small> : <small class="badge bg-info text-dark">{{ $cart->relationshipwithuser->name }}</small>
                                            <br>
                                            @if (get_inventory($cart->product_id, $cart->size_id, $cart->color_id) < $cart->quantity)
                                                <small class="badge bg-primary">Available Product</small> : <small class="badge bg-info text-dark">{{ get_inventory($cart->product_id, $cart->size_id, $cart->color_id) }}</small>
                                            @endif
                                        </h3>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="price">
                                        @if ($cart->relationshipwithproduct->discount_price)
                                            <span>${{ $cart->relationshipwithproduct->discount_price }}</span>
                                            <del>${{ $cart->relationshipwithproduct->regular_price }}</del>
                                        @else
                                            <span>${{ $cart->relationshipwithproduct->regular_price }}</span>
                                        @endif
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="quantity_input">
                                        <button wire:click="decrement({{ $cart->id }})" class="input_number_decrement">
                                            <i class="fal fa-minus"></i>
                                        </button>
                                        <input wire:keyup="quantity_input({{ $cart->id }}, $event.target.value)" type="number" value="{{ $cart->quantity }}" />
                                        <button wire:click="increment({{ $cart->id }})" class="input_number_increment">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="price_text">
                                        ${{ cart_total($cart->product_id, $cart->quantity) }}
                                        @php
                                            $subtotal += cart_total($cart->product_id, $cart->quantity);
                                        @endphp

                                    </span>
                                </td>
                                <td class="text-center"><button wire:click="cart_row_delete({{ $cart->id }})" class="remove_btn"><i class="fal fa-trash-alt"></i></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart_btns_wrap">
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="coupon_form form_item mb-0">
                            <input type="text" wire:model="coupon" placeholder=" @if (session('coupon_info')) {{ session('coupon_info')->coupon_name }} @else Coupon Code... @endif">
                            <button wire:click="apply_coupon({{ $subtotal }},{{ $carts->first()->vendor_id }})" class="btn btn_dark">Apply Coupon</button>
                            <div class="info_icon">
                                <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                            </div>
                        </div>
                        <small class="text-danger">{{ $coupon_error }}</small>
                    </div>

                    <div class="col col-lg-6">
                        @if ($shipping_id != 0)
                            <ul class="btns_group ul_li_right">
                                {{-- <li><a class="btn border_black" href="#!">Update Cart</a></li> --}}
                                <li><a class="btn btn_dark" href="{{ route('checkout') }}">Prceed To Checkout</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6">
                    <div class="calculate_shipping">
                        <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span></h3>
                        <form action="#">
                            <div class="select_option clearfix">
                                <select class="form-select" wire:model="calculate_shipping">
                                    <option value="0">Select Your Option</option>
                                   @foreach ($shippings as $shipping)
                                     <option value="{{ $shipping->id }}">{{ $shipping->shipping_name }}</option>
                                   @endforeach
                                </select>
                            </div>
                            <br>
                            {{-- <button type="submit" class="btn btn_primary rounded-pill">Update Total</button> --}}
                        </form>
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="cart_total_table">
                        <h3 class="wrap_title">Cart Totals</h3>
                        <ul class="ul_li_block">
                            <li>
                                <span>Cart Subtotal</span>
                                <span>
                                    $ {{ $subtotal }}
                                    @php
                                        session(['subtotal' => round($subtotal)])
                                    @endphp
                                </span>
                            </li>
                            @if (session('coupon_info'))
                                <li>
                                    <span>Discount (-)</span>
                                    <span class="text-danger">$
                                        @if (session('coupon_info')->coupon_type == 'Parcentage')
                                            {{ session('coupon_info')->discount }}% <small>({{ session('coupon_info')->coupon_name }})</small>
                                        @else
                                            {{ session('coupon_info')->discount }} <small>({{ session('coupon_info')->coupon_name }})</small>
                                        @endif
                                    </span>
                                </li>
                            @endif
                            @if (session('coupon_info'))
                                <li>
                                    <span>After Coupon Discount</span>
                                    <span>$
                                        @if (session('coupon_info')->coupon_type == 'Parcentage')
                                            {{ round($subtotal - (session('coupon_info')->discount * $subtotal) / 100) }}
                                            @php
                                                session(['after_discount' => round($subtotal - (session('coupon_info')->discount * $subtotal) / 100)])
                                            @endphp
                                        @else
                                            {{ round($subtotal - session('coupon_info')->discount) }}
                                            @php
                                                session(['after_discount' => round($subtotal - session('coupon_info')->discount)])
                                            @endphp
                                        @endif
                                    </span>
                                </li>
                            @endif
                            <li>
                                <span>Delivery Charge (+)</span>
                                <span>$ {{ session('shipping_charge') ?? 0 }} </span>
                            </li>
                            <li>
                                <span>Order Total</span>
                                <span class="total_price">$
                                    @if (session('coupon_info'))
                                        {{ session('after_discount') + session('shipping_charge') }}
                                    @else
                                        @if (session('shipping_charge') != 0)
                                            {{-- {{ session('after_discount') + session('shipping_charge') }} --}}
                                            {{ session('subtotal') + session('shipping_charge') }}
                                        @else
                                            {{ round(session('subtotal')) }}
                                        @endif
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart_section - end
    ================================================== -->

    @endif
</div>
