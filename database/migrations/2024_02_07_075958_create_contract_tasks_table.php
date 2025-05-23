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
        Schema::create('contract_tasks', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('name')->nullable()->default('\'\'\'\'');
            $table->text('description')->nullable();
            $table->unsignedInteger('priority_id')->nullable()->default(0);
            $table->date('startdate')->nullable()->default(NULL);
            $table->date('duedate')->nullable()->default(NULL);
            $table->date('datefinished')->nullable()->default(NULL);
            $table->unsignedInteger('status_id')->nullable()->default(0);
            $table->enum('recurring_type', ['day', 'week', 'month', 'year'])->nullable()->default('month');
            $table->unsignedInteger('recurring_value')->nullable()->default(0)->comment('0 means not recurring');
            $table->integer('cycles')->nullable()->default(0);
            $table->unsignedInteger('total_cycles')->nullable()->default(0);
            $table->date('last_recurring_date')->nullable()->default(NULL);
            $table->enum('is_public', ['yes', 'no'])->nullable()->default('yes');
            $table->enum('billable', ['yes', 'no'])->nullable()->default('yes');
            $table->enum('billed', ['yes', 'no'])->nullable()->default('no');
            $table->double('hourly_rate')->nullable()->default(0);
            $table->integer('kanban_order')->nullable()->default(0);
            $table->integer('milestone_order')->nullable()->default(0);
            $table->enum('visible_to_client', ['yes', 'no'])->nullable()->default('no');
            $table->enum('deadline_notified', ['yes', 'no'])->nullable()->default('no');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL);
            $table->unsignedInteger('recurring_id')->nullable()->default(0);
            $table->unsignedInteger('contract_id')->nullable()->default(0);
            $table->unsignedInteger('created_by_id')->nullable()->default(0);
            $table->unsignedInteger('mile_stone_id')->nullable()->default(0);
            $table->unsignedInteger('is_recurring_from')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_tasks');
    }
};
