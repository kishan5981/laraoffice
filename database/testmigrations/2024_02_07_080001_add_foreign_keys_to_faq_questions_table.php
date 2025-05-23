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
        Schema::table('faq_questions', function (Blueprint $table) {
            $table->foreign(['category_id'], '259293_5c4fd46b088cb')->references(['id'])->on('faq_categories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq_questions', function (Blueprint $table) {
            $table->dropForeign('259293_5c4fd46b088cb');
        });
    }
};
