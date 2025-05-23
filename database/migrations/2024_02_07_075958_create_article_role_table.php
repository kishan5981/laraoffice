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
        Schema::create('article_role', function (Blueprint $table) {
            $table->unsignedInteger('article_id')->nullable()->default(0)->index('fk_p_259566_259279_role_a_5c5036ef25cd9');
            $table->unsignedInteger('role_id')->nullable()->default(0)->index('fk_p_259279_259566_articl_5c5036ef25db4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_role');
    }
};
