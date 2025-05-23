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
        Schema::create('project_task_timers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('task_id')->index('task_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable()->default(NULL);
            $table->unsignedInteger('user_id');
            $table->decimal('hourly_rate', 15)->nullable()->default(0);
            $table->text('note')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_task_timers');
    }
};
