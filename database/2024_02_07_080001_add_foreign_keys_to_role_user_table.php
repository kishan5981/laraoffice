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
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign(['user_id'], 'fk_acrm_role_user_1')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['role_id'], 'fk_role_id_role_user')->references(['id'])->on('roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_role_user_1');
            $table->dropForeign('fk_role_id_role_user');
        });
    }
};
