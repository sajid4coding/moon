<?php
use App\Models\{Cart, Inventory, Product};

function cart_count(){
    return Cart::where('user_id', auth()->id())->count();
};

function cart_total($product_id, $quantity){
    $price = Product::find($product_id)->discount_price;

    if($price){
        $price = Product::find($product_id)->discount_price;
    }else{
        $price = Product::find($product_id)->regular_price;
    }

    return $price*$quantity;
};

function get_inventory($product_id, $size_id, $color_id){
    return Inventory::where([
        'product_id' => $product_id,
        'size_id' => $size_id,
        'color_id' => $color_id
    ])->first()->quantity;
};
