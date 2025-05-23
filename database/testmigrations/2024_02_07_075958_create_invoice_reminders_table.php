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
        Schema::create('invoice_reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable()->default('NULL');
            $table->date('date')->nullable()->default(NULL);
            $table->enum('isnotified', ['yes', 'no'])->nullable()->default('yes');
            $table->enum('notify_by_email', ['no', 'yes'])->nullable()->default('yes');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('quotes_reminders_deleted_at_index');
            $table->unsignedInteger('invoice_id')->nullable()->default(0)->index('298253_5cc691865346c');
            $table->unsignedInteger('reminder_to_id')->nullable()->default(0)->index('fk_contacts_acrm_invoice_reminders_id_idx');
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_contacts_acrm_invoice_created_by_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_reminders');
    }
};
