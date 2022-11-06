<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'id' => '1',
            'size' => 'S',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'id' => '2',
            'size' => 'M',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'id' => '3',
            'size' => 'L',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'id' => '4',
            'size' => 'XXL',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'id' => '5',
            'size' => 'XXXL',
            'user_id' => '3',
            'created_at' => Carbon::now()
        ]);
    }
}
