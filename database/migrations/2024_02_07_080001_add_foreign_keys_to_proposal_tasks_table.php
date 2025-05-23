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
        Schema::table('proposal_tasks', function (Blueprint $table) {
            $table->foreign(['recurring_id'], '298242_5cc68c34c3153proposal')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
            $table->foreign(['proposal_id'], '298242_5cc68c34eed43proposal')->references(['id'])->on('proposals')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_proposal_tasks_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['is_recurring_from'], 'fk_is_recurring_from_proposal_tasks')->references(['id'])->on('proposal_tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposal_tasks', function (Blueprint $table) {
            $table->dropForeign('298242_5cc68c34c3153proposal');
            $table->dropForeign('298242_5cc68c34eed43proposal');
            $table->dropForeign('fk_acrm_proposal_tasks_created_by_id');
            $table->dropForeign('fk_is_recurring_from_proposal_tasks');
        });
    }
};
