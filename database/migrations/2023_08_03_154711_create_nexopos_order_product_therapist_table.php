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
        Schema::create('nexopos_order_product_therapist', function (Blueprint $table) {
            $table->unsignedBigInteger('nexopos_order_product_id');
            $table->unsignedBigInteger('therapist_id');

            $table->foreign('nexopos_order_product_id')->references('id')->on('nexopos_orders_products')->onDelete('cascade');
            $table->foreign('therapist_id')->references('id')->on('therapists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nexopos_order_product_therapist');
    }
};
