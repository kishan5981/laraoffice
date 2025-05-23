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
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable()->default(NULL);
            $table->string('title')->nullable()->default(NULL);
            $table->text('address')->nullable()->default(NULL);
            $table->string('invoice_prefix')->nullable()->default(NULL);
            $table->string('show_quantity_as')->nullable()->default(NULL);
            $table->bigInteger('invoice_no')->nullable()->default(0);
            $table->enum('status', ['Published', 'Draft'])->nullable()->default('Draft');
            $table->string('reference')->nullable()->default(NULL);
            $table->date('invoice_date')->nullable()->default(NULL);
            $table->date('invoice_due_date')->nullable()->default(NULL);
            $table->text('invoice_notes')->nullable()->default(NULL)->comment('Client Notes');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('recurring_invoices_deleted_at_index');
            $table->unsignedInteger('customer_id')->nullable()->default(0)->index('259430_5c500cea0e179');
            $table->unsignedInteger('currency_id')->nullable()->default(0)->index('259430_5c500cea382ac');
            $table->unsignedInteger('tax_id')->nullable()->default(0)->index('259430_5c500cea57b0d');
            $table->unsignedInteger('discount_id')->nullable()->default(0)->index('259430_5c500cea7d32d');
            $table->unsignedInteger('recurring_period_id')->nullable()->default(0)->index('259430_5c500ceaa1e4c');
            $table->decimal('amount', 15)->nullable()->default(0);
            $table->longText('products')->nullable()->default(NULL);
            $table->char('paymentstatus', 20)->nullable()->default(NULL);
            $table->unsignedInteger('invoice_id')->nullable()->default(0)->index('fk_invoice_id_quotes');
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_acrm_quotes_created_by_id');
            $table->text('delivery_address')->nullable()->default(NULL)->comment('Shipping address');
            $table->enum('show_delivery_address', ['yes', 'no'])->nullable()->default('no');
            $table->text('admin_notes')->nullable()->default(NULL);
            $table->unsignedInteger('sale_agent')->nullable()->default(0)->index('fk_quotes_sale_agent');
            $table->longText('terms_conditions')->nullable()->default(NULL);
            $table->enum('prevent_overdue_reminders', ['yes', 'no'])->nullable()->default('no');
            $table->boolean('is_expiry_notified')->nullable()->default(false);
            $table->char('invoice_number_format', 20)->nullable()->default('numberbased');
            $table->char('invoice_number_separator', 5)->nullable()->default('-');
            $table->integer('invoice_number_length')->nullable()->default(0);
            $table->unsignedInteger('proposal_id')->nullable()->default(0)->index('fk_acrm_quotes_proposal_id_idx');
            $table->binary('signature')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
};
