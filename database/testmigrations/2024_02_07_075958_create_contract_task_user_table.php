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
        Schema::create('contract_task_user', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger('contract_task_id')->nullable()->default(0);
            $table->unsignedInteger('user_id')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_task_user');
    }
};
