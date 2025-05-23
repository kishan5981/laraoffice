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
        Schema::table('article_role', function (Blueprint $table) {
            $table->foreign(['role_id'], 'fk_p_259279_259566_articl_5c5036ef25db4')->references(['id'])->on('roles')->onDelete('CASCADE');
            $table->foreign(['article_id'], 'fk_p_259566_259279_role_a_5c5036ef25cd9')->references(['id'])->on('articles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_role', function (Blueprint $table) {
            $table->dropForeign('fk_p_259279_259566_articl_5c5036ef25db4');
            $table->dropForeign('fk_p_259566_259279_role_a_5c5036ef25cd9');
        });
    }
};
