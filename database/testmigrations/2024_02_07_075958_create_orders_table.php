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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('status', 50)->nullable()->default('Pending');
            $table->decimal('price', 15)->nullable()->default(0);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('orders_deleted_at_index');
            $table->unsignedInteger('customer_id')->nullable()->default(0)->index('270937_5c7544840dff5');
            $table->unsignedInteger('currency_id')->nullable()->default(0)->index('fk_currency_id_orders');
            $table->unsignedInteger('billing_cycle_id')->nullable()->default(0)->index('270937_5c754484400c2');
            $table->text('products')->nullable()->default('NULL');
            $table->string('slug')->nullable()->default('NULL');
            $table->enum('is_recurring', ['yes', 'no'])->nullable()->default('no');
            $table->integer('total_cycles')->nullable()->default(0);
            $table->integer('cycles')->nullable()->default(0);
            $table->char('recurring_type', 10)->nullable()->default('NULL');
            $table->integer('recurring_value')->nullable()->default(0);
            $table->date('last_recurring_date')->nullable()->default(NULL);
            $table->unsignedInteger('is_recurring_from')->nullable()->default(0)->index('fk_is_recurring_from_orders');
            $table->enum('prevent_overdue_reminders', ['yes', 'no'])->nullable()->default('no');
            $table->date('last_overdue_reminder')->nullable()->default(NULL);
            $table->date('invoice_date')->nullable()->default(NULL);
            $table->string('invoice_due_date', 45)->nullable()->default('NULL');
            $table->string('delivery_address')->nullable()->default('NULL');
            $table->enum('stock_updated', ['yes', 'no'])->nullable()->default('yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
