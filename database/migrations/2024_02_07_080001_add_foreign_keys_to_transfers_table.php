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
        Schema::table('transfers', function (Blueprint $table) {
            $table->foreign(['from_id'], '259554_5c5034b6e9c61')->references(['id'])->on('accounts')->onDelete('CASCADE');
            $table->foreign(['to_id'], '259554_5c5034b7307c2')->references(['id'])->on('accounts')->onDelete('CASCADE');
            $table->foreign(['payment_method_id'], '259554_5c5034b7623aa')->references(['id'])->on('payment_gateways')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transfers', function (Blueprint $table) {
            $table->dropForeign('259554_5c5034b6e9c61');
            $table->dropForeign('259554_5c5034b7307c2');
            $table->dropForeign('259554_5c5034b7623aa');
        });
    }
};
