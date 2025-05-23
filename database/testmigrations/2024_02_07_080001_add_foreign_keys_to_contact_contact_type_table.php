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
        Schema::table('contact_contact_type', function (Blueprint $table) {
            $table->foreign(['contact_id'], 'fk_p_259284_259435_contac_5c501141edc45')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['contact_type_id'], 'fk_p_259435_259284_contac_5c501141edcee')->references(['id'])->on('roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_contact_type', function (Blueprint $table) {
            $table->dropForeign('fk_p_259284_259435_contac_5c501141edc45');
            $table->dropForeign('fk_p_259435_259284_contac_5c501141edcee');
        });
    }
};
