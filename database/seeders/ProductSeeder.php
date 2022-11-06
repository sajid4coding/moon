<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create products
        DB::table('products')->insert([
            'vendor_id' => '3',
            'name' => 'Macbook Pro',
            'category_id' => '5',
            'purchase_price' => '471.48',
            'regular_price' => '471.48',
            'short_description' => 'Apple MacBook Pro13.3″ Laptop with new Touch bar ID',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
            'thumbnail' => 'product_img_12.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('products')->insert([
            'vendor_id' => '3',
            'name' => 'Apple Watch',
            'category_id' => '1',
            'purchase_price' => '471.48',
            'regular_price' => '471.48',
            'short_description' => 'Apple Watch Series 7 case Pair any band with cool design',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
            'thumbnail' => 'product-img-21.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('products')->insert([
            'vendor_id' => '3',
            'name' => 'Mac Mini',
            'category_id' => '5',
            'purchase_price' => '471.48',
            'regular_price' => '904.21',
            'discount_price' => '471.48',
            'short_description' => 'Apple MacBook Pro13.3″ Laptop with new Touch bar ID',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
            'thumbnail' => 'product-img-22.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('products')->insert([
            'vendor_id' => '3',
            'name' => 'iPad mini',
            'category_id' => '3',
            'purchase_price' => '471.48',
            'regular_price' => '471.48',
            'short_description' => 'The ultimate iPad experience all over the world with coll model',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
            'thumbnail' => 'product-img-23.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('products')->insert([
            'vendor_id' => '3',
            'name' => 'Imac 29"',
            'category_id' => '5',
            'purchase_price' => '471.48',
            'regular_price' => '904.21',
            'discount_price' => '471.48',
            'short_description' => 'Apple iMac 29″ Laptop with new Touch bar ID for you',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
            'thumbnail' => 'product-img-23.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('products')->insert([
            'vendor_id' => '3',
            'name' => 'iPhone 13',
            'category_id' => '4',
            'purchase_price' => '471.48',
            'regular_price' => '471.48',
            'short_description' => 'A dramatically more powerful camera system a display',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
            'thumbnail' => 'product-img-25.png',
            'created_at' => Carbon::now()
        ]);
    }
}
