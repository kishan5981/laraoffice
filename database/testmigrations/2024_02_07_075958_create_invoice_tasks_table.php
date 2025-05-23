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
        Schema::create('invoice_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default('NULL');
            $table->text('description')->nullable()->default('NULL');
            $table->date('startdate')->nullable()->default(NULL);
            $table->date('duedate')->nullable()->default(NULL);
            $table->date('datefinished')->nullable()->default(NULL);
            $table->enum('recurring_type', ['day', 'week', 'month', 'year'])->nullable()->default('month');
            $table->unsignedInteger('recurring_value')->nullable()->default(0)->comment('0 means not rec urring');
            $table->integer('cycles')->nullable()->default(0);
            $table->unsignedInteger('total_cycles')->nullable()->default(0);
            $table->date('last_recurring_date')->nullable()->default(NULL);
            $table->enum('is_public', ['yes', 'no'])->nullable()->default('yes');
            $table->enum('billable', ['yes', 'no'])->nullable()->default('yes');
            $table->enum('billed', ['yes', 'no'])->nullable()->default('no');
            $table->decimal('hourly_rate', 15)->nullable()->default(0);
            $table->integer('kanban_order')->nullable()->default(0);
            $table->integer('milestone_order')->nullable()->default(0);
            $table->enum('visible_to_client', ['yes', 'no'])->nullable()->default('no');
            $table->enum('deadline_notified', ['yes', 'no'])->nullable()->default('no');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('invoice_tasks_deleted_at_index');
            $table->unsignedInteger('priority_id')->nullable()->default(0)->index('298700_5cc801277056b');
            $table->unsignedInteger('status_id')->nullable()->default(0)->index('298700_5cc801279da9f');
            $table->unsignedInteger('recurring_id')->nullable()->default(0)->index('298700_5cc80127c8e38');
            $table->unsignedInteger('invoice_id')->nullable()->default(0)->index('298700_5cc8012800e26');
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_contacts_acrm_invoice_tasks_users_idx');
            $table->unsignedInteger('mile_stone_id')->nullable()->default(0)->index('298700_5cc801285d6cf');
            $table->unsignedInteger('is_recurring_from')->nullable()->default(0)->index('fk_is_recurring_from_invoice_tasks');
            $table->string('attachments')->nullable()->default('NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_tasks');
    }
};
