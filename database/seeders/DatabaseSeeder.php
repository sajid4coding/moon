<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ShippingSeeder::class,
            ProductSeeder::class,
            CategoriesSeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            InventoriesSeeder::class,
        ]);
    }
}
