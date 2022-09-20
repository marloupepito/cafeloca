<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'store_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'lat' => 10.4939926,
            'lng' => 123.4053125,
            'usertype' => 'admin',
            'year' => date('Y')
        ]);

         DB::table('users')->insert([
            'store_name' => 'Mabuni Coffee',
            'email' => 'mabuni@gmail.com',
            'password' => Hash::make('admin'),
            'lat' => 10.4939926,
            'lng' => 123.4053125,
            'usertype' => 'cafe',
            'year' => date('Y')
        ]);

        DB::table('users')->insert([
            'store_name' => 'Titings Coffee',
            'email' => 'titing@gmail.com',
            'password' => Hash::make('admin'),
            'lat' => 10.4809679,
            'lng' => 123.4157364,
            'usertype' => 'cafe',
            'year' => date('Y')
        ]);

        DB::table('users')->insert([
            'store_name' => 'Megs Coffee',
            'email' => 'megs@gmail.com',
            'password' => Hash::make('admin'),
            'lat' => 10.4834963,
            'lng' => 123.4106342,
            'usertype' => 'cafe',
            'year' => date('Y')
        ]);
    }
}
