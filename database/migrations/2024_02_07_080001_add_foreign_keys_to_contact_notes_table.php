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
        Schema::table('contact_notes', function (Blueprint $table) {
            $table->foreign(['contact_id'], '259436_5c500fb829d8c')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_notes', function (Blueprint $table) {
            $table->dropForeign('259436_5c500fb829d8c');
        });
    }
};
