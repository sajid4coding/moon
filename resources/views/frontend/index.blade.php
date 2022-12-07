@extends('layouts.frontendmaster')

@section('content')

<!-- sidebar cart - start
================================================== -->
<div class="sidebar-menu-wrapper">
    <div class="cart_sidebar">
        <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
        @if (session('subtotal'))
            <ul class="cart_items_list ul_li_block mb_30 clearfix">
                @forelse ($carts as $cart)
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('uploads/product_thumbnail/') }}/{{ $cart->relationshipwithproduct->thumbnail }}" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">{{ $cart->relationshipwithproduct->name }}</h4>
                            {{-- <span class="item_price">$30.00</span> --}}
                            <span class="price">
                                @if ($cart->relationshipwithproduct->discount_price)
                                    <span>${{ $cart->relationshipwithproduct->discount_price }}</span>
                                    <del>${{ $cart->relationshipwithproduct->regular_price }}</del>
                                @else
                                    <span>${{ $cart->relationshipwithproduct->regular_price }}</span>
                                @endif
                            </span>
                        </div>
                        <a href="{{ route('cart.row.delete',$cart->id) }}" class="remove_btn"><i class="fal fa-trash-alt"></i></a>
                    </li>
                @empty
                    <div class="d-flex justify-content-center">
                        <div class="row m-5 text-center">
                            <div class="col-12">
                                <p class="fw-bold">No products in the cart.</p>
                            </div>
                            <div class="col-12">
                                <a class="btn btn_primary" href="{{ route('shop') }}">Return To Shop</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </ul>
            <ul class="total_price ul_li_block mb_30 clearfix">
                <li>
                    <span>Subtotal:</span>
                    <span>
                        {{-- $ {{ session('subtotal') }} --}}
                        $ {{ session('subtotal') }}
                    </span>
                </li>
                <li>
                    <span>Delivery Charge (+):</span>
                    <span>$ {{ session('shipping_charge') ?? 0 }} </span>
                </li>
                <li>
                    <span>Total:</span>
                    <span class="total_price">$ {{ round(session('subtotal')) + session('shipping_charge') }}</span>
                </li>
            </ul>
            <ul class="btns_group ul_li_block clearfix">
                <li><a class="btn btn_primary" href="{{ route('cart') }}">View Cart</a></li>
                <li><a class="btn btn_secondary" href="checkout.html">Checkout</a></li>
            </ul>
        @else
            <div class="d-flex justify-content-center">
                <div class="row m-5 text-center">
                    <div class="col-12">
                        <p class="fw-bold">No products in the cart.</p>
                    </div>
                    <div class="col-12">
                        <a class="btn btn_primary" href="{{ route('shop') }}">Return To Shop</a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="cart_overlay"></div>
</div>
<!-- sidebar cart - end
================================================== -->

<!-- slider_section - start
================================================== -->
<section class="slider_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="main_slider" data-slick='{"arrows": false}'>
                    <div class="slider_item set-bg-image" data-background="{{ asset('frontend_asset') }}/images/slider/slide-2.jpg">
                        <div class="slider_content">
                            <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                            <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                            <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                            <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                <del>$430.00</del>
                                <span class="sale_price">$350.00</span>
                            </div>
                            <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                        </div>
                    </div>
                    <div class="slider_item set-bg-image" data-background="{{ asset('frontend_asset') }}/images/slider/slide-3.jpg">
                        <div class="slider_content">
                            <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                            <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                            <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                            <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                <del>$430.00</del>
                                <span class="sale_price">$350.00</span>
                            </div>
                            <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                        </div>
                    </div>
                    <div class="slider_item set-bg-image" data-background="{{ asset('frontend_asset') }}/images/slider/slide-1.jpg">
                        <div class="slider_content">
                            <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                            <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                            <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                            <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                <del>$430.00</del>
                                <span class="sale_price">$350.00</span>
                            </div>
                            <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider_section - end
================================================== -->

<!-- policy_section - start
================================================== -->
<section class="policy_section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="policy-wrap">
                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Truck"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Free Shipping</h3>
                            <p>
                                Free shipping on all US order
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Headset"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Support 24/ 7</h3>
                            <p>
                                Contact us 24 hours a day
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Wallet"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">100% Money Back</h3>
                            <p>
                                You have 30 days to Return
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Starship"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">90 Days Return</h3>
                            <p>
                                If goods have problems
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- policy_section - end
================================================== -->


<!-- products-with-sidebar-section - start
================================================== -->
<section class="products-with-sidebar-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-3">
                <div class="best-selling-products">
                    <div class="sec-title-link">
                        <h3>Best selling</h3>
                        <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                    </div>
                    <div class="product-area clearfix">
                        @foreach ($products as $product)
                            @include('frontend.parts.product_grids.grid')
                        @endforeach
                        {{-- <div class="grid">
                            <div class="product-pic">
                                <img src="{{ asset('frontend_asset') }}/images/shop/product-img-21.png" alt>
                                <span class="theme-badge">Sale</span>

                            </div>
                            <div class="details">
                                <h4><a href="#">Apple Watch</a></h4>
                                <p><a href="#">Apple Watch Series 7 case Pair any band with cool design</a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                            </bdi>
                                        </span>
                                    </ins>
                                </span>
                                <div class="add-cart-area">
                                    <button class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="product-pic">
                                <img src="{{ asset('frontend_asset') }}/images/shop/product-img-22.png" alt>
                                <span class="theme-badge-2">12% off</span>
                            </div>
                            <div class="details">
                                <h4><a href="#">Mac Mini</a></h4>
                                <p><a href="#">Apple MacBook Pro13.3″ Laptop with new Touch bar ID </a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                            </bdi>
                                        </span>
                                    </ins>
                                    <del aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                            </bdi>
                                        </span>
                                    </del>
                                </span>
                                <div class="add-cart-area">
                                    <button class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="product-pic">
                                <img src="{{ asset('frontend_asset') }}/images/shop/product-img-23.png" alt>
                                <span class="theme-badge">Sale</span>
                            </div>
                            <div class="details">
                                <h4><a href="#">iPad mini</a></h4>
                                <p><a href="#">The ultimate iPad experience all over the world with coll model </a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                            </bdi>
                                        </span>
                                    </ins>
                                </span>
                                <div class="add-cart-area">
                                    <button class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="product-pic">
                                <img src="{{ asset('frontend_asset') }}/images/shop/product-img-24.png" alt>
                                <span class="theme-badge-2">25% off</span>
                            </div>
                            <div class="details">
                                <h4><a href="#">Imac 29"</a></h4>
                                <p><a href="#">Apple iMac 29″ Laptop with new Touch bar ID for you </a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                            </bdi>
                                        </span>
                                    </ins>
                                    <del aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                            </bdi>
                                        </span>
                                    </del>
                                </span>
                                <div class="add-cart-area">
                                    <button class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="product-pic">
                                <img src="{{ asset('frontend_asset') }}/images/shop/product-img-25.png" alt>

                            </div>
                            <div class="details">
                                <h4><a href="#">iPhone 13</a></h4>
                                <p><a href="#">A dramatically more powerful camera system a display</a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                            </bdi>
                                        </span>
                                    </ins>
                                </span>
                                <div class="add-cart-area">
                                    <button class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                @if ($categories->count() > 0)
                    <div class="top_category_wrap">
                        <div class="sec-title-link">
                            <h3>Top categories</h3>
                        </div>
                        <div class="top_category_carousel2" data-slick='{"dots": false}'>
                            @foreach ($categories as $category)
                                <div class="slider_item">
                                    <div class="category_boxed">
                                        <a href="#!">
                                                <span class="item_image">
                                                    <img src="{{ asset('uploads/category_image') }}/{{ $category->category_image }}" alt="image_not_found">
                                                </span>
                                            <span class="item_title">{{ $category->category_name }}</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="carousel_nav carousel-nav-top-right">
                            <button type="button" class="tc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                            <button type="button" class="tc_right_arrow"><i class="fal fa-long-arrow-alt-right"></i></button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-3 order-lg-9">
                <div class="product-sidebar">
                    <div class="widget latest_product_carousel">
                        <div class="title_wrap">
                            <h3 class="area_title">Latest Products</h3>
                            <div class="carousel_nav">
                                <button type="button" class="vs4i_left_arrow"><i class="fal fa-angle-left"></i></button>
                                <button type="button" class="vs4i_right_arrow"><i class="fal fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="vertical_slider_4item" data-slick='{"dots": false}'>
                            @foreach ($latest_products as $latest_product)
                                <div class="slider_item">
                                    <div class="small_product_layout">
                                        <a class="item_image" href="shop_details.html">
                                            <img src="{{ asset('uploads') }}/product_thumbnail/{{ $latest_product->thumbnail }}" alt="image_not_found">
                                        </a>
                                        <div class="item_content">
                                            <h3 class="item_title">
                                                <a href="shop_details.html">{{ $latest_product->name }}</a>
                                            </h3>
                                            <ul class="rating_star ul_li">
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </li>
                                            </ul>
                                            <div class="item_price">
                                                @if ($latest_product->discount_price)
                                                    <span>${{ $latest_product->discount_price }}</span>
                                                    <del>${{ $latest_product->regular_price }}</del>
                                                @else
                                                    <span>${{ $latest_product->regular_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{ asset('frontend_asset') }}/images/latest_product/latest_product_2.png" alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="shop_details.html">Product Sample</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>$690.99</span>
                                            <del>$720.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{ asset('frontend_asset') }}/images/latest_product/latest_product_3.png" alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="shop_details.html">Product Sample</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>$690.99</span>
                                            <del>$720.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{ asset('frontend_asset') }}/images/latest_product/latest_product_4.png" alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="shop_details.html">Product Sample</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>$690.99</span>
                                            <del>$720.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{ asset('frontend_asset') }}/images/latest_product/latest_product_1.png" alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="shop_details.html">Product Sample</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>$690.99</span>
                                            <del>$720.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{ asset('frontend_asset') }}/images/latest_product/latest_product_2.png" alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="shop_details.html">Product Sample</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>$690.99</span>
                                            <del>$720.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{ asset('frontend_asset') }}/images/latest_product/latest_product_3.png" alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="shop_details.html">Product Sample</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>$690.99</span>
                                            <del>$720.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{ asset('frontend_asset') }}/images/latest_product/latest_product_4.png" alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="shop_details.html">Product Sample</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>$690.99</span>
                                            <del>$720.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="widget product-add">
                        <div class="product-img">
                            <img src="{{ asset('frontend_asset') }}/images/shop/product_img_10.png" alt>
                        </div>
                        <div class="details">
                            <h4>iPad pro</h4>
                            <p>iPad pro with M1 chipe</p>
                            <a class="btn btn_primary" href="#" >Start Buying</a>
                        </div>
                    </div>
                    @if ($categories->count() > 0)
                        <div class="widget audio-widget">
                            <h5>Categories <span>{{ $categories->count() }}</span></h5>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="#">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- end container  -->
</section>
<!-- products-with-sidebar-section - end
================================================== -->


<!-- promotion_section - start
================================================== -->
<section class="promotion_section">
    <div class="container">
        <div class="row promotion_banner_wrap">
            <div class="col col-lg-6">
                <div class="promotion_banner">
                    <div class="item_image">
                        <img src="{{ asset('frontend_asset') }}/images/promotion/banner_img_1.png" alt>
                    </div>
                    <div class="item_content">
                        <h3 class="item_title">Protective sleeves <span>combo.</span></h3>
                        <p>It is a long established fact that a reader will be distracted</p>
                        <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6">
                <div class="promotion_banner">
                    <div class="item_image">
                        <img src="{{ asset('frontend_asset') }}/images/promotion/banner_img_2.png" alt>
                    </div>
                    <div class="item_content">
                        <h3 class="item_title">Nutrillet blender <span>combo.</span></h3>
                        <p>
                            It is a long established fact that a reader will be distracted
                        </p>
                        <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- promotion_section - end
================================================== -->

<!-- new_arrivals_section - start
================================================== -->
<section class="new_arrivals_section section_space">
    <div class="container">
        <div class="sec-title-link">
            <h3>New Arrivals</h3>
        </div>

        <div class="row newarrivals_products">
            <div class="col col-lg-5">
                <div class="deals_product_layout1">
                    <div class="bg_area">
                        <h3 class="item_title">Best <span>Product</span> Deals</h3>
                        <p>
                            Get a 20% Cashback when buying TWS Product From SoundPro Audio Technology.
                        </p>
                        <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="col col-lg-7">
                <div class="new-arrivals-grids clearfix">
                    <div class="grid">
                        <div class="product-pic">
                            <img src="{{ asset('frontend_asset') }}/images/shop/product-img-28.png" alt>
                        </div>
                        <div class="details">
                            <h4><a href="#">iPhone 13 pro</a></h4>
                            <p><a href="#">A dramatically more powerful camera system a display</a></p>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                        </bdi>
                                    </span>
                                </ins>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="product-pic">
                            <img src="{{ asset('frontend_asset') }}/images/shop/product-img-26.png" alt>
                            <span class="theme-badge-2">20% off</span>
                        </div>
                        <div class="details">
                            <h4><a href="#">Apple</a></h4>
                            <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch bar ID </a></p>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                        </bdi>
                                    </span>
                                </ins>
                                <del aria-hidden="true">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                        </bdi>
                                    </span>
                                </del>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="product-pic">
                            <img src="{{ asset('frontend_asset') }}/images/shop/product-img-27.png" alt>
                            <span class="theme-badge-2">15% off</span>

                        </div>
                        <div class="details">
                            <h4><a href="#">Mac Mini</a></h4>
                            <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                        </bdi>
                                    </span>
                                </ins>
                                <del aria-hidden="true">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                        </bdi>
                                    </span>
                                </del>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="product-pic">
                            <img src="{{ asset('frontend_asset') }}/images/shop/product_img_12.png" alt>
                            <span class="theme-badge">Sale</span>
                        </div>
                        <div class="details">
                            <h4><a href="#">Apple</a></h4>
                            <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                        </bdi>
                                    </span>
                                </ins>
                                <del aria-hidden="true">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                        </bdi>
                                    </span>
                                </del>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new_arrivals_section - end
================================================== -->

<!-- brand_section - start
================================================== -->
<div class="brand_section pb-0">
    <div class="container">
        <div class="brand_carousel">
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_1.png" alt="image_not_found">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_1.png" alt="image_not_found">
                </a>
            </div>
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_2.png" alt="image_not_found">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_2.png" alt="image_not_found">
                </a>
            </div>
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_3.png" alt="image_not_found">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_3.png" alt="image_not_found">
                </a>
            </div>
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_4.png" alt="image_not_found">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_4.png" alt="image_not_found">
                </a>
            </div>
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_5.png" alt="image_not_found">
                    <img src="{{ asset('frontend_asset') }}/images/brand/brand_5.png" alt="image_not_found">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- brand_section - end
================================================== -->

<!-- viewed_products_section - start
================================================== -->
<section class="viewed_products_section section_space">
    <div class="container">

        <div class="sec-title-link mb-0">
            <h3>Recently Viewed Products</h3>
        </div>

        <div class="viewed_products_wrap arrows_topright">
            <div class="viewed_products_carousel row" data-slick='{"dots": false}'>
                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_1.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Electronics</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_2.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">PC & Laptop</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_3.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Tables & Mobiles</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_4.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Accessories</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_5.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">TV & Audio</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_6.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Games & Consoles</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_1.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Electronics</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_2.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">PC & Laptop</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_3.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Tables & Mobiles</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_4.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Accessories</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_5.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">TV & Audio</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend_asset') }}/images/viewed_products/viewed_product_img_6.png" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Games & Consoles</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_nav">
                <button type="button" class="vpc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                <button type="button" class="vpc_right_arrow"><i class="fal fa-long-arrow-alt-right"></i></button>
            </div>
        </div>
    </div>
</section>
<!-- viewed_products_section - end
================================================== -->


@endsection
