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
        Schema::create('orders_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable()->default(NULL);
            $table->decimal('amount', 15)->nullable()->default(0);
            $table->string('transaction_id')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('invoice_payments_deleted_at_index');
            $table->unsignedInteger('account_id')->nullable()->default(0)->index('263295_5c5d41a961b5c');
            $table->unsignedInteger('order_id')->nullable()->default(0)->index('263295_5c5d41a961b9c');
            $table->char('paymentmethod', 20)->nullable()->default('NULL');
            $table->text('description')->nullable()->default('NULL');
            $table->string('slug')->nullable()->default('NULL');
            $table->string('payment_status', 20)->nullable()->default('NULL');
            $table->text('transaction_data')->nullable()->default('NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_payments');
    }
};
