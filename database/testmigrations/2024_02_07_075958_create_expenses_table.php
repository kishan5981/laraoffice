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
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable()->default('NULL');
            $table->date('entry_date')->nullable()->default(NULL);
            $table->string('amount');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->unsignedInteger('expense_category_id')->nullable()->default(0)->index('259289_5c4fd436771c8');
            $table->text('description')->nullable()->default('NULL');
            $table->string('ref_no')->nullable()->default('NULL');
            $table->unsignedInteger('account_id')->nullable()->default(0)->index('259289_5c5008723efd5');
            $table->unsignedInteger('payee_id')->nullable()->default(0)->index('259289_5c50087269673');
            $table->unsignedInteger('payment_method_id')->nullable()->default(0)->index('259289_5c50087283e58');
            $table->enum('is_recurring', ['yes', 'no'])->nullable()->default('no');
            $table->unsignedInteger('recurring_period_id')->nullable()->default(0)->index('fk_recurring_id_expenses');
            $table->integer('recurring_value')->nullable()->default(0);
            $table->string('recurring_type', 10)->nullable()->default('NULL');
            $table->integer('cycles')->nullable()->default(0);
            $table->integer('total_cycles')->nullable()->default(0);
            $table->date('last_recurring_date')->nullable()->default(NULL);
            $table->unsignedInteger('is_recurring_from')->nullable()->default(0);
            $table->unsignedInteger('project_id')->nullable()->default(0)->index('fk_project_id_expenses');
            $table->enum('create_invoice_billable', ['yes', 'no'])->nullable()->default('no');
            $table->enum('send_invoice_to_customer', ['yes', 'no'])->nullable()->default('no');
            $table->enum('billable', ['yes', 'no'])->nullable()->default('no');
            $table->enum('billed', ['yes', 'no'])->nullable()->default('no');
            $table->unsignedInteger('invoice_id')->nullable()->default(0)->index('fk_invoice_id_expenses');
            $table->unsignedInteger('tax_id')->nullable()->default(0)->index('fk_tax_id_expenses');
            $table->double('tax_value')->nullable()->default(0);
            $table->enum('tax_type', ['value', 'percent'])->nullable()->default('value');
            $table->unsignedInteger('currency_id')->nullable()->default(0)->index('fk_currency_id_expenses');
            $table->unsignedInteger('credit_notes_id')->nullable()->default(0);
            $table->string('payee_name', 45)->nullable()->default('NULL')->comment('If the contact is deleted we can use this name, so that admin have track on all expenses even when contact deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
