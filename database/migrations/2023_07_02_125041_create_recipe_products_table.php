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
        Schema::create('recipe_products', function (Blueprint $table) {
            $table->id();
            $table->integer('recipe_id');
            $table->integer('product_id');
            $table->integer('unit_id');
            $table->string('barcode')->nullable();
            $table->float('quantity', 18, 5);
            $table->float('low_quantity', 18, 5)->default(0);
            $table->float('sale_price', 18, 5)->default(0); // could be 0 if the product support variations
            $table->float('sale_price_edit', 18, 5)->default(0); // to let the system consider the price sent by the client
            $table->float('sale_price_without_tax', 18, 5)->default(0); // must be computed automatically
            $table->float('sale_price_with_tax', 18, 5)->default(0); // must be computed automatically
            $table->float('sale_price_tax', 18, 5)->default(0);
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
        Schema::dropIfExists('recipe_products');
    }
};
