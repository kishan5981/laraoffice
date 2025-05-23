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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign(['customer_id'], '270937_5c7544840dff5')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['billing_cycle_id'], '270937_5c754484400c2')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
            $table->foreign(['currency_id'], 'fk_currency_id_orders')->references(['id'])->on('currencies')->onDelete('CASCADE');
            $table->foreign(['is_recurring_from'], 'fk_is_recurring_from_orders')->references(['id'])->on('orders')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('270937_5c7544840dff5');
            $table->dropForeign('270937_5c754484400c2');
            $table->dropForeign('fk_currency_id_orders');
            $table->dropForeign('fk_is_recurring_from_orders');
        });
    }
};
