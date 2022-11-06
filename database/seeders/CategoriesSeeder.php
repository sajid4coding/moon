<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Categories
        DB::table('categories')->insert([
            'category_name' => 'Man',
            'category_slug' => 'man',
            'category_image' => 'Man_1662222244.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Woman',
            'category_slug' => 'woman',
            'category_image' => 'Woman_1662222282.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'category_name' => 'iPad',
            'category_slug' => 'ipad',
            'category_image' => 'iPad_1662222325.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'category_name' => 'iPhone',
            'category_slug' => 'iphone',
            'category_image' => 'iPhone_1662222342.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Mini Mac',
            'category_slug' => 'mini mac',
            'category_image' => 'Mini Mac_1662222359.png',
            'created_at' => Carbon::now()
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Headphone',
            'category_slug' => 'headphone',
            'category_image' => 'Headphone_1662222377.png',
            'created_at' => Carbon::now()
        ]);
    }
}
