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
        Schema::table('incomes', function (Blueprint $table) {
            $table->foreign(['income_category_id'], '259288_5c4fd43129965')->references(['id'])->on('income_categories')->onDelete('CASCADE');
            $table->foreign(['account_id'], '259288_5c500722c2930')->references(['id'])->on('accounts')->onDelete('CASCADE');
            $table->foreign(['payer_id'], '259288_5c500722ee978')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['original_currency_id'], 'fk_original_currency_id')->references(['id'])->on('currencies')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropForeign('259288_5c4fd43129965');
            $table->dropForeign('259288_5c500722c2930');
            $table->dropForeign('259288_5c500722ee978');
            $table->dropForeign('fk_original_currency_id');
        });
    }
};
