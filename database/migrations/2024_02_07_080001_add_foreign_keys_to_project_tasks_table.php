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
        Schema::table('project_tasks', function (Blueprint $table) {
            $table->foreign(['priority'], '298700_5cc801277056bpp')->references(['id'])->on('dynamic_options')->onDelete('CASCADE');
            $table->foreign(['status'], '298700_5cc801279da9fpp')->references(['id'])->on('dynamic_options')->onDelete('CASCADE');
            $table->foreign(['recurring_id'], '298700_5cc80127c8e38pp')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
            $table->foreign(['milestone'], '298700_5cc801285d6cfpp')->references(['id'])->on('mile_stones')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_contacts_project_tasks_createdby_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['is_recurring_from'], 'fk_is_recurring_from_invoice_taskspp')->references(['id'])->on('project_tasks')->onDelete('CASCADE');
            $table->foreign(['project_id'], 'fk_project_id_project_tasks')->references(['id'])->on('client_projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_tasks', function (Blueprint $table) {
            $table->dropForeign('298700_5cc801277056bpp');
            $table->dropForeign('298700_5cc801279da9fpp');
            $table->dropForeign('298700_5cc80127c8e38pp');
            $table->dropForeign('298700_5cc801285d6cfpp');
            $table->dropForeign('fk_acrm_contacts_project_tasks_createdby_id');
            $table->dropForeign('fk_is_recurring_from_invoice_taskspp');
            $table->dropForeign('fk_project_id_project_tasks');
        });
    }
};
