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
        Schema::table('content_page_content_tag', function (Blueprint $table) {
            $table->foreign(['content_tag_id'], 'fk_p_259302_259303_conten_5c4fd83002d39')->references(['id'])->on('content_tags')->onDelete('CASCADE');
            $table->foreign(['content_page_id'], 'fk_p_259303_259302_conten_5c4fd83002c71')->references(['id'])->on('content_pages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_page_content_tag', function (Blueprint $table) {
            $table->dropForeign('fk_p_259302_259303_conten_5c4fd83002d39');
            $table->dropForeign('fk_p_259303_259302_conten_5c4fd83002c71');
        });
    }
};
