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
        Schema::table('project_task_timers', function (Blueprint $table) {
            $table->foreign(['task_id'], 'fk_contacts_acrm_project_task_timers_task_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['task_id'], 'fk_task_id_tasktimers')->references(['id'])->on('project_tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_task_timers', function (Blueprint $table) {
            $table->dropForeign('fk_contacts_acrm_project_task_timers_task_id');
            $table->dropForeign('fk_task_id_tasktimers');
        });
    }
};
