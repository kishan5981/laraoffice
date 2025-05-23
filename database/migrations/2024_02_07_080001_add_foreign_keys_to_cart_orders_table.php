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
        Schema::table('cart_orders', function (Blueprint $table) {
            $table->foreign(['customer_id'], '270937_5c7544840ggggdff5')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['billing_cycle_id'], '270937_5c754ggggd484400c2')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_orders', function (Blueprint $table) {
            $table->dropForeign('270937_5c7544840ggggdff5');
            $table->dropForeign('270937_5c754ggggd484400c2');
        });
    }
};
