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
        Schema::create('proposals_reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable()->default('NULL');
            $table->date('date')->nullable()->default(NULL);
            $table->enum('isnotified', ['yes', 'no'])->nullable()->default('yes');
            $table->enum('notify_by_email', ['no', 'yes'])->nullable()->default('yes');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('proposals_reminders_deleted_at_index');
            $table->unsignedInteger('proposal_id')->nullable()->default(0)->index('298253_5cc691865346cproposal');
            $table->unsignedInteger('reminder_to_id')->nullable()->default(0)->index('fk_acrm_contacts_proposals_reminders_to');
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_acrm_proposals_reminders_created_by_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals_reminders');
    }
};
