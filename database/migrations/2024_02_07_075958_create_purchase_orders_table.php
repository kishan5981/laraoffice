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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject')->nullable()->default(NULL);
            $table->string('slug')->nullable()->default(NULL);
            $table->enum('status', ['Published', 'Draft'])->nullable()->default('Draft');
            $table->text('address')->nullable();
            $table->string('invoice_prefix')->nullable()->default(NULL);
            $table->string('show_quantity_as')->nullable()->default(NULL);
            $table->bigInteger('invoice_no')->nullable()->default(0);
            $table->string('reference')->nullable()->default(NULL);
            $table->date('order_date')->nullable()->default(NULL);
            $table->date('order_due_date')->nullable()->default(NULL);
            $table->string('update_stock')->nullable()->default(NULL);
            $table->text('notes')->nullable();
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('purchase_orders_deleted_at_index');
            $table->unsignedInteger('customer_id')->nullable()->default(0)->index('259347_5c502e5c9dd65');
            $table->unsignedInteger('currency_id')->nullable()->default(0)->index('259347_5c502e5cb2ac0');
            $table->unsignedInteger('warehouse_id')->nullable()->default(0)->index('259347_5c502e5cc8928');
            $table->unsignedInteger('tax_id')->nullable()->default(0)->index('259347_5c502e5ce08d5');
            $table->unsignedInteger('discount_id')->nullable()->default(0)->index('259347_5c502e5d01a3a');
            $table->decimal('amount', 15)->nullable()->default(0);
            $table->text('products')->nullable();
            $table->string('paymentstatus', 50)->nullable()->default('unpaid');
            $table->unsignedInteger('recurring_period_id')->nullable()->default(0)->index('fk_po_recurring_period_id');
            $table->text('delivery_address')->nullable()->comment('Shipping address');
            $table->enum('show_delivery_address', ['yes', 'no'])->nullable()->default('no');
            $table->text('admin_notes')->nullable();
            $table->unsignedInteger('sale_agent')->nullable()->default(0)->index('fk_po_sale_agent');
            $table->text('terms_conditions')->nullable();
            $table->enum('prevent_overdue_reminders', ['yes', 'no'])->nullable()->default('no');
            $table->char('invoice_number_format', 20)->nullable()->default('numberbased');
            $table->char('invoice_number_separator', 5)->nullable()->default('-');
            $table->integer('invoice_number_length')->nullable()->default(0);
            $table->binary('signature')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
};
