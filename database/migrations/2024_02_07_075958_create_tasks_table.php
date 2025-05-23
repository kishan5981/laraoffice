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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(NULL);
            $table->text('description')->nullable()->default(NULL);
            $table->string('attachment')->nullable()->default(NULL);
            $table->date('start_date')->nullable()->default(NULL);
            $table->date('due_date')->nullable()->default(NULL);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->unsignedInteger('status_id')->nullable()->default(0)->index('259298_5c4fd7e568411');
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('fk_acrm_tasks_contacts_user_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
