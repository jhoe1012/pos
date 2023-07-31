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
        Schema::table('nexopos_orders_products', function (Blueprint $table) {
            if ( ! Schema::hasColumn( 'nexopos_orders_products', 'commision' ) ) {
                $table->float( 'commision' )->default(0);
            }
            if ( ! Schema::hasColumn( 'nexopos_orders_products', 'commision_total' ) ) {
                $table->float( 'commision_total' )->default(0);
            }
            if ( ! Schema::hasColumn( 'nexopos_orders_products', 'commision_total_price' ) ) {
                $table->float( 'commision_total_price' )->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nexopos_orders_products', function (Blueprint $table) {
            if ( Schema::hasColumn( 'nexopos_orders_products', 'commision' ) ) {
                $table->dropColumn( 'commision' );
            }
            if ( Schema::hasColumn( 'nexopos_orders_products', 'commision_total' ) ) {
                $table->dropColumn( 'commision_total' );
            }
            if ( Schema::hasColumn( 'nexopos_orders_products', 'commision_total_price' ) ) {
                $table->dropColumn( 'commision_total_price' );
            }
        });
    }
};
