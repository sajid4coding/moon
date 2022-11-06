<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Shippings
        DB::table('shippings')->insert([
            'shipping_name' => 'Inside City',
            'shipping_charge' => 60,
            'created_at' => Carbon::now()
        ]);
        DB::table('shippings')->insert([
            'shipping_name' => 'Outside City',
            'shipping_charge' => 120,
            'created_at' => Carbon::now()
        ]);
    }
}
