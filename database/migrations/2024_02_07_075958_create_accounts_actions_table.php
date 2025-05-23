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
        Schema::create('accounts_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action');
            $table->string('action_model')->nullable()->default(NULL);
            $table->integer('action_id')->nullable()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('fk_acrm_accounts_actions_user_id_idx');
            $table->text('record')->nullable();
            $table->double('amount')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts_actions');
    }
};
