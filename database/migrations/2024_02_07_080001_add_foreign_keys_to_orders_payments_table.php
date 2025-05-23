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
        Schema::table('orders_payments', function (Blueprint $table) {
            $table->foreign(['account_id'], 'fk_order_payments_account_id')->references(['id'])->on('accounts')->onDelete('CASCADE');
            $table->foreign(['order_id'], 'fk_order_payments_order_id')->references(['id'])->on('orders')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_payments', function (Blueprint $table) {
            $table->dropForeign('fk_order_payments_account_id');
            $table->dropForeign('fk_order_payments_order_id');
        });
    }
};
