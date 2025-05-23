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
        Schema::table('article_content_category', function (Blueprint $table) {
            $table->foreign(['content_category_id'], 'fk_p_259301_259566_articl_5c5036ef1e28b')->references(['id'])->on('content_categories')->onDelete('CASCADE');
            $table->foreign(['article_id'], 'fk_p_259566_259301_conten_5c5036ef1e1ea')->references(['id'])->on('articles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_content_category', function (Blueprint $table) {
            $table->dropForeign('fk_p_259301_259566_articl_5c5036ef1e28b');
            $table->dropForeign('fk_p_259566_259301_conten_5c5036ef1e1ea');
        });
    }
};
