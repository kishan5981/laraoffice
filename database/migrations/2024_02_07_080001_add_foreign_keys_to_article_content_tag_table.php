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
        Schema::table('article_content_tag', function (Blueprint $table) {
            $table->foreign(['content_tag_id'], 'fk_p_259302_259566_articl_5c5036ef21ee1')->references(['id'])->on('content_tags')->onDelete('CASCADE');
            $table->foreign(['article_id'], 'fk_p_259566_259302_conten_5c5036ef21e14')->references(['id'])->on('articles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_content_tag', function (Blueprint $table) {
            $table->dropForeign('fk_p_259302_259566_articl_5c5036ef21ee1');
            $table->dropForeign('fk_p_259566_259302_conten_5c5036ef21e14');
        });
    }
};
