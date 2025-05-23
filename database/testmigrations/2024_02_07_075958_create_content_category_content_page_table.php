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
        Schema::create('content_category_content_page', function (Blueprint $table) {
            $table->unsignedInteger('content_category_id')->nullable()->default(0)->index('fk_p_259301_259303_conten_5c4fd82ff2c4c');
            $table->unsignedInteger('content_page_id')->nullable()->default(0)->index('fk_p_259303_259301_conten_5c4fd82ff2cf2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_category_content_page');
    }
};
