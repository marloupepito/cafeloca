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
            'status' => 'Approved',
            'year' => date('Y')
        ]);

        
        $cafe=['Balbacua Coffee','Maristel Inn and Cafe','Kapehan sa Terminal','Kapehan sa Merkado','Kapehan ni Biyo','Mabuni Coffee','Titings Coffee','Megs Coffee','Kapehan sa Medina','Kapehan sa Baybay'];

        for ($i=0; $i < count($cage) ; $i++) { 
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
                'status' => 'Approved',
                'year' => date('Y')
            ]);
        }
       


    }
}
