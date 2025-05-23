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
        Schema::create('credit_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable()->default('NULL');
            $table->string('title')->nullable()->default('NULL');
            $table->text('address')->nullable()->default('NULL')->comment('Billing Address');
            $table->string('invoice_prefix')->nullable()->default('NULL');
            $table->string('show_quantity_as')->nullable()->default('NULL');
            $table->bigInteger('invoice_no')->nullable()->default(0);
            $table->enum('status', ['Published', 'Draft'])->nullable()->default('Draft');
            $table->string('reference')->nullable()->default('NULL');
            $table->date('invoice_date')->nullable()->default(NULL);
            $table->date('invoice_due_date')->nullable()->default(NULL);
            $table->text('invoice_notes')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('invoices_deleted_at_index');
            $table->unsignedInteger('customer_id')->nullable()->default(0)->index('259415_5c500ae98af17');
            $table->unsignedInteger('currency_id')->nullable()->default(0)->index('259415_5c500ae9b10d1');
            $table->unsignedInteger('tax_id')->nullable()->default(0)->index('259415_5c500ae9d6387');
            $table->unsignedInteger('discount_id')->nullable()->default(0)->index('259415_5c500aea0188f');
            $table->decimal('amount', 15)->nullable()->default(0);
            $table->longText('products')->nullable()->default('NULL');
            $table->string('paymentstatus', 50)->nullable()->default('unpaid');
            $table->binary('signature')->nullable()->default('NULL');
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_created_by_id');
            $table->text('delivery_address')->nullable()->default('NULL')->comment('Shipping Address');
            $table->enum('show_delivery_address', ['yes', 'no'])->nullable()->default('no')->comment('Show shipping details in invoice');
            $table->text('admin_notes')->nullable()->default('NULL');
            $table->unsignedInteger('sale_agent')->nullable()->default(0)->index('fk_invoices_sale_agent');
            $table->longText('terms_conditions')->nullable()->default('NULL');
            $table->enum('prevent_overdue_reminders', ['yes', 'no'])->nullable()->default('no');
            $table->integer('total_cycles')->nullable()->default(0)->comment('Total completed cycles');
            $table->integer('cycles')->nullable()->default(0);
            $table->enum('is_recurring', ['yes', 'no'])->nullable()->default('no');
            $table->unsignedInteger('recurring_period_id')->nullable()->default(0)->index('fk_recurring_period_id_invoices');
            $table->char('recurring_type', 10)->nullable()->default('NULL')->comment('Eg: Day, Month, Year');
            $table->integer('recurring_value')->nullable()->default(0);
            $table->date('last_recurring_date')->nullable()->default(NULL);
            $table->integer('is_recurring_from')->nullable()->default(0);
            $table->date('last_overdue_reminder')->nullable()->default(NULL);
            $table->unsignedInteger('quote_id')->nullable()->default(0)->index('fk_quote_id_quotes');
            $table->unsignedInteger('project_id')->nullable()->default(0)->index('fk_project_id_invoices');
            $table->string('devery_note_no')->nullable()->default('NULL');
            $table->string('po_no')->nullable()->default('NULL');
            $table->string('invoice_number_format', 20)->nullable()->default('numberbased');
            $table->char('invoice_number_separator', 5)->nullable()->default('-');
            $table->integer('invoice_number_length')->nullable()->default(0);
            $table->enum('credit_status', ['Open', 'Closed'])->nullable()->default('Open');
            $table->double('remaining_amount')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_notes');
    }
};
