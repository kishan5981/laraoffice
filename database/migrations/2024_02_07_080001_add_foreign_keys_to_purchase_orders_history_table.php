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
        Schema::table('purchase_orders_history', function (Blueprint $table) {
            $table->foreign(['purchase_order_id'], 'fk_purchase_order_id')->references(['id'])->on('purchase_orders')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_orders_history', function (Blueprint $table) {
            $table->dropForeign('fk_purchase_order_id');
        });
    }
};
