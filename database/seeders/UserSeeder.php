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
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'lat' => 10.4939926,
            'lng' => 123.4053125,
            'usertype' => 'admin',
            'status' => 'Approved',
            'year' => date('Y')
        ]);

        
        $cafe=['Benigs Cafe','Delicano Cafe','Hayhay Coffee Shop','Insikwate','Kapehan sa Medina','Jimenez Coffee Shop','Meguel Coffee Shop','Mercy Coffee Shop','VCJ Coffee Shop','Titings Coffee'];
        $owner = ['Benigs','Delicans','Felicita Hayhay','Insikwate Proprietor','Nora Masaba','Minnie Jimenes','Miguel Ticala',
            'Mercy Lopez','Vcj Proprietor','Ma. Isabel P. Bulaon'];
        $address = ['1 Pili Street, San Carlos City, Negros Occidental',
                'F9RR+WHX, Eco - Translink Hwy, San Carlos City, Negros Occidental','Rizal, San Carlos City, Negros Occidental',
                'Green Ville Balas Negros Occidental','F9RP+HWM, Dakbayan sa San Carlos, Negros Occidental','Guadalupe, San Carlos City, Negros Occidental',
                'Guadalupe, San Carlos City, Negros Occidental','Eco - Translink Hwy, San Carlos City, Negros Occidental','F9VV+3F3, Eco - Translink Hwy, San Carlos City, Negros Occidental',
                'FCM9+2J San Carlos City, Negros Occidental'
            ];
        for ($i=0; $i < count($cafe) ; $i++) { 
            DB::table('users')->insert([
                'store_name' => $cafe[$i],
                'owner' => $owner[$i],
                'store_location'  => $address[$i],
                'mobile'  => '09176196962',
                'phone'  => '+934-345-33',
                'about'  => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
                'email' => 'sample'.$i.'@gmail.com',
                'username' => 'coffee'.$i,
                'password' => Hash::make('admin'),
                'lat' => 10.4939926,
                'lng' => 123.4053125,
                'usertype' => 'cafe',
                'status' => 'Approved',
                'year' => date('Y')
            ]);
        }



        for ($i=0; $i < count($cafe); $i++) { 
            $cofeList =['Moka Pot','Sunrise Roast','Latte on the Rocks','Coffee Bloom','A Cup of Joy','The Caffeine Fix',
            'Coffee Hilltop','The Tea Corner','Mocha Avenue','French Brew','Coffee Cauldron','Karnataka Special','Coffee Pup','Coffee Coastal',
            'Tarts and beans'];
    
            $about =['A Moka pot is a kind of coffee maker. A name like this one will appeal to any coffee lover out there.',
            'If you have a cafe that opens up early in the morning, a name like this is perfect for you. Market your cafe as the ideal place for a cup of coffee',
            'A playful twist to “whiskey on the rocks”, this name is a catchy and funny one','You could fill your cafe with all sorts of plants and flowers, giving the whole place a fresh feel.',
            'Sometimes, you don’t have to go out of your way to make your name seem unique. A cup of coffee, for most of us, is simply a cup of joy!',
            'For many of us, a good cup of coffee is the perfect solution when we’re feeling low or have had a bad day. ',
            'Giving your coffee shop a name like “Coffee Hilltop” makes it seem different and more interesting.',
            ' You could also try to market different kinds of tea from all over the world. ',
            'Everyone loves a good mocha. Mentioning a particular drink in your cafe’s name is a great way to promote your restaurant.',
            'If you have specialty coffee beans sourced from a number of countries, a name like this can help attract customers.',
            'Inspired from Harry Potter’s ‘Leaky Cauldron’, this name will definitely make all the Potterheads out there flock to you! ',
            'Different kinds of coffee beans sourced from all the coffee-producing states of India, you should use this in your name.',
            'You absolutely need to mention this in your name. ‘Coffee Pup’ is a twist on ‘Coffee Cup’ and will definitely make people smile.',
            'This name is also a great option if you’re located in seaside town. You could even use the beach or the sea as inspiration for your décor.',
            'This way, it comes off as the perfect place to have treats in, along with coffee. '];
           
             $menu=['Coffee','Bread','Delicacy','Snack']; 

             $image=['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg',
             '11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg','19.jpg','20.jpg',
             '21.jpg','22.jpg','23.jpg','24.jpg','25.jpg','26.jpg','27.jpg','28.jpg','29.jpg','30.jpg',
             '31.jpg','32.jpg','33.jpg','34.jpg','35.jpg','36.jpg','37.jpg','38.jpg',
            ]; 
             $randomcofeList = $cofeList[array_rand($cofeList)];
             $randomMenu = $menu[array_rand($menu)];
             $randomImage = $image[array_rand($image)];
             $randomAbout = $about[array_rand($about)];

            DB::table('products')->insert([
                'branchid' => $i+2,
                'price' => 10,
                'branchname' => $cafe[$i],
                'productname' => $randomcofeList,
                'images' => $randomImage,
                'about' => $randomAbout,
                'menu' => $randomMenu,
            ]);

            DB::table('product_image')->insert([
                'foreign' => $i+1,
                'branchid' => $i+2,
                'images' => $randomImage,
            ]);
            
        }
       


    }
}
