<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create User ID
        DB::table('users')->insert([
            'name' => 'Sajid',
            'email' => 'sajid@live.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'number' => '01918968819',
            'profile_image' => '1_1662901127.png',
            'role' => 'Admin',
            'cover_image' => '1_1662901127.png',
            'created_at' => Carbon::now(),
            'status' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'Sajid Customer',
            'email' => 'sajid@customer.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'number' => '01918968819',
            'profile_image' => '1_1662901127.png',
            'role' => 'Customer',
            'cover_image' => '1_1662901127.png',
            'created_at' => Carbon::now(),
            'status' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'Sajid Vendor',
            'email' => 'sajid@vendor.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'number' => '01918968819',
            'profile_image' => '1_1662901127.png',
            'role' => 'Vendor',
            'cover_image' => '1_1662901127.png',
            'created_at' => Carbon::now(),
            'status' => true,
        ]);
    }
}
