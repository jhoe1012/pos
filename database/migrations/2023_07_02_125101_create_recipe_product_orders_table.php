<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_product_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('recipe_id');
            $table->integer('product_id');
            $table->integer('unit_id');
            $table->string('barcode')->nullable();
            $table->float('quantity', 18, 5);
            $table->float('unit_price', 18, 5)->default(0); // could be 0 if the product support variations
            $table->float('total_price', 18, 5)->default(0); // could be 0 if the product support variations
            $table->float('total_price_without_tax', 18, 5)->default(0); // must be computed automatically
            $table->float('total_price_with_tax', 18, 5)->default(0); // must be computed automatically
           
            $table->string('uuid')->nullable();
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
        Schema::dropIfExists('recipe_product_orders');
    }
};
