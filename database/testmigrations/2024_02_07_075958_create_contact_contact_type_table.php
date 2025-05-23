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
        Schema::create('contact_contact_type', function (Blueprint $table) {
            $table->unsignedInteger('contact_id')->nullable()->default(0)->index('fk_p_259284_259435_contac_5c501141edc45');
            $table->unsignedInteger('contact_type_id')->nullable()->default(0)->index('fk_p_259435_259284_contac_5c501141edcee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_contact_type');
    }
};
