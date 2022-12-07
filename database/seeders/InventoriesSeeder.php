<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InventoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->insert([
            'id' => '1',
            'vendor_id' => '3',
            'product_id' => '1',
            'size_id' => '1',
            'color_id' => '1',
            'quantity' => '150',
            'created_at' => Carbon::now()
        ]);
        DB::table('inventories')->insert([
            'id' => '2',
            'vendor_id' => '3',
            'product_id' => '1',
            'size_id' => '2',
            'color_id' => '2',
            'quantity' => '12',
            'created_at' => Carbon::now()
        ]);
        DB::table('inventories')->insert([
            'id' => '3',
            'vendor_id' => '3',
            'product_id' => '2',
            'size_id' => '3',
            'color_id' => '3',
            'quantity' => '11',
            'created_at' => Carbon::now()
        ]);
        DB::table('inventories')->insert([
            'id' => '4',
            'vendor_id' => '3',
            'product_id' => '2',
            'size_id' => '1',
            'color_id' => '1',
            'quantity' => '60',
            'created_at' => Carbon::now()
        ]);
        DB::table('inventories')->insert([
            'id' => '5',
            'vendor_id' => '3',
            'product_id' => '2',
            'size_id' => '4',
            'color_id' => '5',
            'quantity' => '70',
            'created_at' => Carbon::now()
        ]);
        DB::table('inventories')->insert([
            'id' => '6',
            'vendor_id' => '3',
            'product_id' => '2',
            'size_id' => '3',
            'color_id' => '5',
            'quantity' => '760',
            'created_at' => Carbon::now()
        ]);
    }
}
