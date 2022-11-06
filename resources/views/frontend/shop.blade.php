@extends('layouts.frontendmaster')

@section('content')

<!-- breadcrumb_section - start
================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="{{ route('/') }}">Home</a></li>
            <li>Product Grid</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
================================================== -->

<!-- product_section - start
================================================== -->
<section class="product_section section_space">
    <h2 class="hidden">Product sidebar</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <aside class="sidebar_section p-0 mt-0">
                    <div class="sb_widget sb_category">
                        <h3 class="sb_widget_title">Categories</h3>
                        <ul class="sb_category_list ul_li_block">
                            @foreach ($products as $product)
                                <li>
                                    <a href="#!">{{ $product->relationwithcategory->category_name }} <span>({{ $products->where('category_id', $product->relationwithcategory->id)->count() }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sb_widget">
                        <h3 class="sb_widget_title">Your Filter</h3>
                        <div class="filter_sidebar">
                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Category</h3>
                                <form action="#">
                                    <div class="select_option clearfix">
                                        <select class="form-select">
                                            <option data-display="Select Category">Select Your Option</option>
                                            <option value="1" selected>HP</option>
                                            <option value="2">HP</option>
                                            <option value="3">HP</option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Manufacturer</h3>
                                <form action="#">
                                    <ul class="fs_brand_list ul_li_block">
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="apple_brand" type="checkbox" name="brand_checkbox" />
                                                <label for="apple_brand">Apple <span>(19)</span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="asus_brand" type="checkbox" name="brand_checkbox" />
                                                <label for="asus_brand">Asus <span>(1)</span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="bank_oluvsen_brand" type="checkbox" name="brand_checkbox" />
                                                <label for="bank_oluvsen_brand">Bank & Oluvsen <span>(1)</span></label>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>

                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Filter by Color</h3>
                                <ul class="filter_memory_list ul_li_block">
                                    @forelse ($colors as $color)
                                        <li>
                                            <a href="#!">{{ $color->color_name }}</a>
                                        </li>
                                    @empty
                                        <div class="alert alert-danger">
                                            No Product Color Available
                                        </div>
                                    @endforelse
                                    {{-- <li>
                                        <a href="#!">Green<span>(12)</span></a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-lg-9">
                <div class="filter_topbar">
                    <div class="row align-items-center">
                        <div class="col col-md-4">
                            <ul class="layout_btns nav" role="tablist">
                                <li>
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fal fa-bars"></i></button>
                                </li>
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                        <i class="fal fa-th-large"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="col col-md-4">
                            <form action="#">
                                <div class="select_option clearfix">
                                    <select class="form-select">
                                        <option data-display="Defaul Sorting">Select Your Option</option>
                                        <option value="1">Sorting By Name</option>
                                        <option value="2">Sorting By Price</option>
                                        <option value="3">Sorting By Size</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="col col-md-4">
                            <div class="result_text">Showing 1-12 of 30 relults</div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="shop-product-area shop-product-area-col">
                            <div class="product-area shop-grid-product-area clearfix">
                                @foreach ($products as $product)
                                    @include('frontend.parts.product_grids.grid')
                                @endforeach
                                {{-- <div class="grid">
                                    <div class="product-pic">
                                        <img src="{{ asset('uploads/product_thumbnail') }}/{{ $product->thumbnail }}" alt />
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">{{ $product->name }}</a></h4>
                                        <p><a href="#">{{ $product->short_description }}</a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="grid">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-21.png" alt />
                                        <span class="theme-badge">Sale</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Apple Watch</a></h4>
                                        <p><a href="#">Apple Watch Series 7 case Pair any band </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
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
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-22.png" alt />
                                        <span class="theme-badge-2">12% off</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Mac Mini</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>904.21 </bdi>
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
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-23.png" alt />
                                        <span class="theme-badge">Sale</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">iPad mini</a></h4>
                                        <p><a href="#">The ultimate iPad experience all over the world </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
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
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-24.png" alt />
                                        <span class="theme-badge-2">25% off</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Imac 29"</a></h4>
                                        <p><a href="#">Apple iMac 29″ Laptop with Touch ID for you </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>904.21 </bdi>
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
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-25.png" alt />
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
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
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-23.png" alt />
                                        <span class="theme-badge">Sale</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">iPad mini</a></h4>
                                        <p><a href="#">The ultimate iPad experience all over the world </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
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
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-24.png" alt />
                                        <span class="theme-badge-2">25% off</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Imac 29"</a></h4>
                                        <p><a href="#">Apple iMac 29″ Laptop with Touch ID for you </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>904.21 </bdi>
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
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-25.png" alt />
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
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

                        <div class="pagination_wrap">
                            <ul class="pagination_nav">
                                <li class="active"><a href="#!">01</a></li>
                                <li><a href="#!">02</a></li>
                                <li><a href="#!">03</a></li>
                                <li class="prev_btn">
                                    <a href="#!"><i class="fal fa-angle-left"></i></a>
                                </li>
                                <li class="next_btn">
                                    <a href="#!"><i class="fal fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="product_layout2_wrap">
                            <div class="product-area-row">
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product_img_12.png" alt />
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Macbook Pro</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-21.png" alt />
                                        <span class="theme-badge">Sale</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Apple Watch</a></h4>
                                        <p><a href="#">Apple Watch Series 7 case Pair any band </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-22.png" alt />
                                        <span class="theme-badge-2">12% off</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Mac Mini</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>904.21 </bdi>
                                                </span>
                                            </del>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-23.png" alt />
                                        <span class="theme-badge">Sale</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">iPad mini</a></h4>
                                        <p><a href="#">The ultimate iPad experience all over the world </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="{{ asset('frontend_asset/images/shop') }}/product-img-24.png" alt />
                                        <span class="theme-badge-2">25% off</span>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Imac 29"</a></h4>
                                        <p><a href="#">Apple iMac 29″ Laptop with Touch ID for you </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>904.21 </bdi>
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

                        <div class="pagination_wrap">
                            <ul class="pagination_nav">
                                <li class="active"><a href="#!">01</a></li>
                                <li><a href="#!">02</a></li>
                                <li><a href="#!">03</a></li>
                                <li class="prev_btn">
                                    <a href="#!"><i class="fal fa-angle-left"></i></a>
                                </li>
                                <li class="next_btn">
                                    <a href="#!"><i class="fal fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_section - end
================================================== -->

@endsection
