<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('branchid')->nullable();
            $table->string('price')->nullable();
            $table->string('branchname')->nullable();
            $table->string('productname')->nullable();
            $table->string('images')->nullable();
            $table->float('rate')->nullable();
            $table->string('about')->nullable();
            $table->string('menu')->nullable();
            $table->timestamps();
        });
         Schema::create('product_image', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('foreign');
            $table->string('branchid')->nullable();
            $table->string('images')->nullable();
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
        Schema::dropIfExists('products');
    }
}
