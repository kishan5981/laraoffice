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
        Schema::create('purchase_orders_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address')->nullable()->default('NULL');
            $table->text('country')->nullable()->default('NULL');
            $table->string('city')->nullable()->default('NULL');
            $table->text('browser')->nullable()->default('NULL');
            $table->text('comments')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('invoices_history_deleted_at_index');
            $table->unsignedInteger('purchase_order_id')->nullable()->default(0)->index('259415_5c500ae99af17');
            $table->string('operation_type', 45)->nullable()->default('NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders_history');
    }
};
