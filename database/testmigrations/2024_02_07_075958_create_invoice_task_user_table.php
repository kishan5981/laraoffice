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
        Schema::create('invoice_task_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invoice_task_id')->nullable()->default(0)->index('fk_invoice_task_id');
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('fk_acrm_contacts_invoice_task_user_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_task_user');
    }
};
