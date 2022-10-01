<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star_rates', function (Blueprint $table) {
            $table->id();
            $table->string('userid')->nullable();
            $table->string('postid')->nullable();
            $table->string('rate')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('who')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('star_rates');
    }
}
