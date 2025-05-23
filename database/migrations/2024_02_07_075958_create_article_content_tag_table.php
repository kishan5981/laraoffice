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
        Schema::create('article_content_tag', function (Blueprint $table) {
            $table->unsignedInteger('article_id')->nullable()->default(0)->index('fk_p_259566_259302_conten_5c5036ef21e14');
            $table->unsignedInteger('content_tag_id')->nullable()->default(0)->index('fk_p_259302_259566_articl_5c5036ef21ee1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_content_tag');
    }
};
