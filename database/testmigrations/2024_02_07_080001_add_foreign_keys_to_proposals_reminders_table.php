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
        Schema::table('proposals_reminders', function (Blueprint $table) {
            $table->foreign(['proposal_id'], '298253_5cc691865346cproposal')->references(['id'])->on('proposals')->onDelete('CASCADE');
            $table->foreign(['reminder_to_id'], 'fk_acrm_contacts_proposals_reminders_to')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_proposals_reminders_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals_reminders', function (Blueprint $table) {
            $table->dropForeign('298253_5cc691865346cproposal');
            $table->dropForeign('fk_acrm_contacts_proposals_reminders_to');
            $table->dropForeign('fk_acrm_proposals_reminders_created_by_id');
        });
    }
};
