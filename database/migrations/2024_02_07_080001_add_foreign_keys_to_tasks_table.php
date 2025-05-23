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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign(['status_id'], '259298_5c4fd7e568411')->references(['id'])->on('task_statuses')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'fk_acrm_tasks_contacts_user_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('259298_5c4fd7e568411');
            $table->dropForeign('fk_acrm_tasks_contacts_user_id');
        });
    }
};
