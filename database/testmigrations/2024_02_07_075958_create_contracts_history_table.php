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
        Schema::create('contracts_history', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('ip_address')->nullable()->default('NULL');
            $table->text('country')->nullable()->default('NULL');
            $table->string('city')->nullable()->default('NULL');
            $table->text('browser')->nullable()->default('NULL');
            $table->text('comments')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL);
            $table->unsignedInteger('contract_id')->nullable()->default(0);
            $table->char('operation_type', 20)->nullable()->default('NULL')->comment('general, crud, email, sms, cron, payment, status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts_history');
    }
};
