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
        Schema::table('project_task_user', function (Blueprint $table) {
            $table->foreign(['user_id'], 'fk_acrm_project_task_user_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['project_task_id'], 'fk_project_task_id_ass')->references(['id'])->on('project_tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_task_user', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_project_task_user_id');
            $table->dropForeign('fk_project_task_id_ass');
        });
    }
};
