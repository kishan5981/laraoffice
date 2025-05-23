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
        Schema::create('ticketit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject')->index('ticketit_subject_index');
            $table->longText('content');
            $table->longText('html')->nullable()->default(NULL);
            $table->unsignedInteger('status_id')->index('ticketit_status_id_index');
            $table->unsignedInteger('priority_id')->index('ticketit_priority_id_index');
            $table->unsignedInteger('user_id')->index('ticketit_user_id_index');
            $table->unsignedInteger('agent_id')->index('ticketit_agent_id_index');
            $table->unsignedInteger('category_id')->index('ticketit_category_id_index');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->timestamp('completed_at')->nullable()->default(NULL)->index('ticketit_completed_at_index');
            $table->unsignedInteger('project_id')->nullable()->default(0)->index('fk_project_id_ticketit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticketit');
    }
};
