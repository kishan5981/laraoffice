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
        Schema::table('expenses', function (Blueprint $table) {
            $table->foreign(['expense_category_id'], '259289_5c4fd436771c8')->references(['id'])->on('expense_categories')->onDelete('CASCADE');
            $table->foreign(['account_id'], '259289_5c5008723efd5')->references(['id'])->on('accounts')->onDelete('CASCADE');
            $table->foreign(['payee_id'], '259289_5c50087269673')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['payment_method_id'], '259289_5c50087283e58')->references(['id'])->on('payment_gateways')->onDelete('CASCADE');
            $table->foreign(['currency_id'], 'fk_currency_id_expenses')->references(['id'])->on('currencies')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], 'fk_invoice_id_expenses')->references(['id'])->on('invoices')->onDelete('CASCADE');
            $table->foreign(['project_id'], 'fk_project_id_expenses')->references(['id'])->on('client_projects')->onDelete('CASCADE');
            $table->foreign(['recurring_period_id'], 'fk_recurring_id_expenses')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
            $table->foreign(['tax_id'], 'fk_tax_id_expenses')->references(['id'])->on('taxes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropForeign('259289_5c4fd436771c8');
            $table->dropForeign('259289_5c5008723efd5');
            $table->dropForeign('259289_5c50087269673');
            $table->dropForeign('259289_5c50087283e58');
            $table->dropForeign('fk_currency_id_expenses');
            $table->dropForeign('fk_invoice_id_expenses');
            $table->dropForeign('fk_project_id_expenses');
            $table->dropForeign('fk_recurring_id_expenses');
            $table->dropForeign('fk_tax_id_expenses');
        });
    }
};
