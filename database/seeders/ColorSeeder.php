<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'id' => '1',
            'color_name' => 'Red',
            'color' => '#ff0000',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'id' => '2',
            'color_name' => 'Green',
            'color' => '#008000',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'id' => '3',
            'color_name' => 'Yellow',
            'color' => '#ffff00',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'id' => '4',
            'color_name' => 'Pink',
            'color' => '#ff00ff',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'id' => '5',
            'color_name' => 'Blue',
            'color' => '#0000ff',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'id' => '6',
            'color_name' => 'Black',
            'color' => '#000000',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
    }
}
