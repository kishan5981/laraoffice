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
        Schema::table('contact_documents', function (Blueprint $table) {
            $table->foreign(['contact_id'], '259458_5c501af71b1d4')->references(['id'])->on('contacts')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_documents', function (Blueprint $table) {
            $table->dropForeign('259458_5c501af71b1d4');
        });
    }
};
