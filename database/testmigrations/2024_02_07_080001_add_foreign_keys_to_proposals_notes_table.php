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
        Schema::table('proposals_notes', function (Blueprint $table) {
            $table->foreign(['proposal_id'], '298254_5cc692936db0aproposal')->references(['id'])->on('proposals')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_proposals_notes_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals_notes', function (Blueprint $table) {
            $table->dropForeign('298254_5cc692936db0aproposal');
            $table->dropForeign('fk_acrm_proposals_notes_created_by_id');
        });
    }
};
