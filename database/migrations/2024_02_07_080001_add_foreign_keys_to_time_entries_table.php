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
        Schema::table('time_entries', function (Blueprint $table) {
            $table->foreign(['project_id'], '259360_5c4ffba07819c')->references(['id'])->on('client_projects')->onDelete('CASCADE');
            $table->foreign(['completed_by_id'], 'fk_acrm_time_entries_completed_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'fk_acrm_time_entries_user_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['task_id'], 'fk_task_id_time_entries')->references(['id'])->on('project_tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->dropForeign('259360_5c4ffba07819c');
            $table->dropForeign('fk_acrm_time_entries_completed_by_id');
            $table->dropForeign('fk_acrm_time_entries_user_id');
            $table->dropForeign('fk_task_id_time_entries');
        });
    }
};
