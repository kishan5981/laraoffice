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
        Schema::table('purchase_order_products', function (Blueprint $table) {
            $table->foreign(['product_id'], 'fk_product_id_purchase_order_products2')->references(['id'])->on('products')->onDelete('CASCADE');
            $table->foreign(['purchase_order_id'], 'fk_purchase_order_id_purchase_order_products')->references(['id'])->on('purchase_orders')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_order_products', function (Blueprint $table) {
            $table->dropForeign('fk_product_id_purchase_order_products2');
            $table->dropForeign('fk_purchase_order_id_purchase_order_products');
        });
    }
};
