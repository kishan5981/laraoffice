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
        Schema::create('project_task_user', function (Blueprint $table) {
            $table->unsignedInteger('project_task_id')->nullable()->default(0)->index('fk_p_259358_259280_user_c_5c4ff9d6745f6');
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('fk_acrm_project_task_user_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_task_user');
    }
};
