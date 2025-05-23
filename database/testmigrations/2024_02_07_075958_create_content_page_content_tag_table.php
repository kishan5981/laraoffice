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
        Schema::create('content_page_content_tag', function (Blueprint $table) {
            $table->unsignedInteger('content_page_id')->nullable()->default(0)->index('fk_p_259303_259302_conten_5c4fd83002c71');
            $table->unsignedInteger('content_tag_id')->nullable()->default(0)->index('fk_p_259302_259303_conten_5c4fd83002d39');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_page_content_tag');
    }
};
