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
        Schema::create('proposals_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address')->nullable()->default(NULL);
            $table->text('country')->nullable();
            $table->string('city')->nullable()->default(NULL);
            $table->text('browser')->nullable();
            $table->text('comments')->nullable();
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('proposals_history_deleted_at_index');
            $table->unsignedInteger('proposal_id')->nullable()->default(0)->index('259415_5c500ae99af17proposal');
            $table->char('operation_type', 20)->nullable()->default(NULL)->comment('general, crud, email, sms, cron, payment, status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals_history');
    }
};
