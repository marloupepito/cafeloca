<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('store_name')->nullable();
            $table->string('store_location')->nullable();
            $table->string('profile')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->longText('about')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('usertype')->nullable();
            $table->string('year')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }


      //       {
      //     text: 'administrator',
      //     disabled: true,
      //   },
      //   {
      //     text: 'Accounts',
      //     disabled: false,
      //     href: '#',
      //   },
      // ],
      //   headers: [
      //     {
      //       text: 'Stores',
      //       align: 'start',
      //       filterable: false,
      //       value: 'store_name',
      //     },
      //     { text: 'Email', value: 'email' },
      //     { text: 'Mobile', value: 'mobile' },
      //     { text: 'Address', value: 'address' },
      //     { text: 'Status', value: 'status' },
      //     { text: 'Iron (%)', value: 'iron' },
      //   ],
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
