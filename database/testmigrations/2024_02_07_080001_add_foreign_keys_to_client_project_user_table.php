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
        Schema::table('client_project_user', function (Blueprint $table) {
            $table->foreign(['user_id'], 'fk_acrm_client_project_user_1')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['client_project_id'], 'fk_p_259358_259280_user_c_5c4ff9d6745f6')->references(['id'])->on('client_projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_project_user', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_client_project_user_1');
            $table->dropForeign('fk_p_259358_259280_user_c_5c4ff9d6745f6');
        });
    }
};
