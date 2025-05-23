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
        Schema::table('cart_orders_products', function (Blueprint $table) {
            $table->foreign(['product_id'], '270937_5c7rerre54ggggd484400c2')->references(['id'])->on('products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_orders_products', function (Blueprint $table) {
            $table->dropForeign('270937_5c7rerre54ggggd484400c2');
        });
    }
};
