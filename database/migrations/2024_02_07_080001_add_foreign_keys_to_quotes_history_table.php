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
        Schema::table('quotes_history', function (Blueprint $table) {
            $table->foreign(['quote_id'], 'fk_quotes_history_quote_id')->references(['id'])->on('quotes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes_history', function (Blueprint $table) {
            $table->dropForeign('fk_quotes_history_quote_id');
        });
    }
};
