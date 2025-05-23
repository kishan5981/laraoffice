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
        Schema::create('proposal_task_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proposal_task_id')->nullable()->default(0)->index('fk_proposal_task_id');
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('fk_acrm_contacts_proposal_task_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal_task_user');
    }
};
