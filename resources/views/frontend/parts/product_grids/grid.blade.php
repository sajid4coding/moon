<div class="grid">
    <div class="product-pic">
        <img src="{{ asset('uploads') }}/product_thumbnail/{{ $product->thumbnail }}" alt>
        @if ($product->discount_price)
            <span class="theme-badge-2">{{ round(($product->regular_price - $product->discount_price) / $product->regular_price*100, 1) }} % off</span>
        @endif
        {{-- <span class="theme-badge-2">12% off</span> --}}
    </div>
    <div class="details">
        <h4><a href="{{ route('single.page',$product->id ) }}">{{ $product->name }}</a></h4>
        <p><a href="#">{{ $product->short_description }}</a></p>
        <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        <span class="price">
            @if ($product->discount_price)
                <ins>
                    <span class="woocommerce-Price-amount amount">
                        <bdi>
                            <span class="woocommerce-Price-currencySymbol">$</span>{{ $product->discount_price }}
                        </bdi>
                    </span>
                </ins>
                <del aria-hidden="true">
                    <span class="woocommerce-Price-amount amount">
                        <bdi>
                            <span class="woocommerce-Price-currencySymbol">$</span>{{ $product->regular_price }}
                        </bdi>
                    </span>
                </del>
            @else
                <ins>
                    <span class="woocommerce-Price-amount amount">
                        <bdi>
                            <span class="woocommerce-Price-currencySymbol">$</span>{{ $product->regular_price }}
                        </bdi>
                    </span>
                </ins>
            @endif
        </span>
        <div class="add-cart-area">
            <button class="add-to-cart">Add to cart</button>
            {{-- <a href="#"><button class="add-to-cart">Add to cart</button></a> --}}
        </div>
    </div>
</div>
