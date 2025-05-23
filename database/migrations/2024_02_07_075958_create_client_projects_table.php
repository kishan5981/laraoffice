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
        Schema::create('client_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->default(NULL);
            $table->double('budget')->nullable()->default(0);
            $table->string('phase')->nullable()->default(NULL);
            $table->date('start_date')->nullable()->default(NULL);
            $table->date('due_date')->nullable()->default(NULL);
        $table->text('description')->nullable();
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('client_projects_deleted_at_index');
            $table->enum('priority', ['Low', 'Medium', 'High', 'Urgent'])->nullable()->default('Medium');
            $table->unsignedInteger('status_id')->nullable()->default(0)->index('259358_5c4ff380bc7e4');
            $table->string('demo_url')->nullable()->default(NULL);
            $table->unsignedInteger('client_id')->nullable()->default(0)->index('259358_5c4ff9d6a3140');
            $table->unsignedInteger('billing_type_id')->nullable()->default(0)->index('259358_5c4ff9d6b9c2b');
            $table->date('date_finished')->nullable()->default(NULL);
            $table->integer('progress')->nullable()->default(0);
            $table->enum('progress_from_tasks', ['yes', 'no'])->nullable()->default('yes');
            $table->double('project_rate_per_hour')->nullable()->default(0);
            $table->integer('estimated_hours')->nullable()->default(0);
            $table->double('hourly_rate')->nullable()->default(0);
            $table->unsignedInteger('currency_id')->nullable()->default(0)->index('fk_acrm_client_projects_currency_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_projects');
    }
};
