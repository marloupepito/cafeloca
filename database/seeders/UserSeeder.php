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
            'store_location'  => 'Ylagan St.',
            'mobile'  => '09176196962',
            'phone'  => '+934-345-33',
            'about'  => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
            'email' => 'mabuni@gmail.com',
            'password' => Hash::make('admin'),
            'lat' => 10.4939926,
            'lng' => 123.4053125,
            'usertype' => 'cafe',
            'year' => date('Y')
        ]);

        DB::table('users')->insert([
            'store_name' => 'Titings Coffee',
            'store_location'  => 'Broce St.',
            'mobile'  => '09305151163',
            'phone'  => '+934-345-33',
            'about'  => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
            'email' => 'titing@gmail.com',
            'password' => Hash::make('admin'),
            'lat' => 10.4809679,
            'lng' => 123.4157364,
            'usertype' => 'cafe',
            'year' => date('Y')
        ]);

        DB::table('users')->insert([
            'store_name' => 'Megs Coffee',
            'store_location'  => 'Endrina St.',
            'mobile'  => '09208858123',
            'phone'  => '+934-345-33',
            'about'  => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
            'email' => 'megs@gmail.com',
            'password' => Hash::make('admin'),
            'lat' => 10.4834963,
            'lng' => 123.4106342,
            'usertype' => 'cafe',
            'year' => date('Y')
        ]);
    }
}
