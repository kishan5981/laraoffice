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
        Schema::table('credit_notes_history', function (Blueprint $table) {
            $table->foreign(['credit_note_id'], '259415_5c500ae99af17fdfd')->references(['id'])->on('credit_notes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credit_notes_history', function (Blueprint $table) {
            $table->dropForeign('259415_5c500ae99af17fdfd');
        });
    }
};
