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
        Schema::table('order_products', function (Blueprint $table) {
            $table->foreign(['order_id'], 'fk_order_id_order_products')->references(['id'])->on('orders')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'fk_product_id_order_products2')->references(['id'])->on('products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropForeign('fk_order_id_order_products');
            $table->dropForeign('fk_product_id_order_products2');
        });
    }
};
