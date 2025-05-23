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
        Schema::table('contact_language', function (Blueprint $table) {
            $table->foreign(['contact_id'], 'fk_p_259284_259346_langua_5c501141f1b07')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['language_id'], 'fk_p_259346_259284_contac_5c501141f1ba0')->references(['id'])->on('languages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_language', function (Blueprint $table) {
            $table->dropForeign('fk_p_259284_259346_langua_5c501141f1b07');
            $table->dropForeign('fk_p_259346_259284_contac_5c501141f1ba0');
        });
    }
};
