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
        Schema::create('time_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start_date')->nullable()->default(NULL);
            $table->dateTime('end_date')->nullable()->default(NULL);
            $table->text('description')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('time_entries_deleted_at_index');
            $table->unsignedInteger('project_id')->nullable()->default(0)->index('259360_5c4ffba07819c');
            $table->unsignedInteger('task_id')->nullable()->default(0)->index('fk_task_id_time_entries');
            $table->unsignedInteger('completed_by_id')->nullable()->default(0)->index('fk_acrm_time_entries_completed_by_id');
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('fk_acrm_time_entries_user_id');
            $table->double('hourly_rate')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_entries');
    }
};
