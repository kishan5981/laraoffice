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
        Schema::table('proposals_history', function (Blueprint $table) {
            $table->foreign(['proposal_id'], 'fk_proposals_history_proposal_id')->references(['id'])->on('proposals')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals_history', function (Blueprint $table) {
            $table->dropForeign('fk_proposals_history_proposal_id');
        });
    }
};
