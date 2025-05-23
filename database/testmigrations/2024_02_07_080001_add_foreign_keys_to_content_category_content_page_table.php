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
        Schema::table('content_category_content_page', function (Blueprint $table) {
            $table->foreign(['content_category_id'], 'fk_p_259301_259303_conten_5c4fd82ff2c4c')->references(['id'])->on('content_categories')->onDelete('CASCADE');
            $table->foreign(['content_page_id'], 'fk_p_259303_259301_conten_5c4fd82ff2cf2')->references(['id'])->on('content_pages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_category_content_page', function (Blueprint $table) {
            $table->dropForeign('fk_p_259301_259303_conten_5c4fd82ff2c4c');
            $table->dropForeign('fk_p_259303_259301_conten_5c4fd82ff2cf2');
        });
    }
};
