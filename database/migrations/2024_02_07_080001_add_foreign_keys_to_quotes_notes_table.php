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
        Schema::table('quotes_notes', function (Blueprint $table) {
            $table->foreign(['quote_id'], '298254_5cc692936db0a')->references(['id'])->on('quotes')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_quotes_notes_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes_notes', function (Blueprint $table) {
            $table->dropForeign('298254_5cc692936db0a');
            $table->dropForeign('fk_acrm_quotes_notes_created_by_id');
        });
    }
};
