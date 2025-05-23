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
        Schema::create('contact_language', function (Blueprint $table) {
            $table->unsignedInteger('contact_id')->nullable()->default(0)->index('fk_p_259284_259346_langua_5c501141f1b07');
            $table->unsignedInteger('language_id')->nullable()->default(0)->index('fk_p_259346_259284_contac_5c501141f1ba0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_language');
    }
};
