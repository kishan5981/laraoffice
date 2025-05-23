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
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign(['customer_id'], '259415_5c500ae98af17')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['currency_id'], '259415_5c500ae9b10d1')->references(['id'])->on('currencies')->onDelete('CASCADE');
            $table->foreign(['tax_id'], '259415_5c500ae9d6387')->references(['id'])->on('taxes')->onDelete('CASCADE');
            $table->foreign(['discount_id'], '259415_5c500aea0188f')->references(['id'])->on('discounts')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_invoices_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['proposal_id'], 'fk_acrm_invoices_proposal_id')->references(['id'])->on('proposals')->onDelete('CASCADE');
            $table->foreign(['sale_agent'], 'fk_invoices_sale_agent')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['project_id'], 'fk_project_id_invoices')->references(['id'])->on('client_projects')->onDelete('CASCADE');
            $table->foreign(['quote_id'], 'fk_quote_id_quotes')->references(['id'])->on('quotes')->onDelete('CASCADE');
            $table->foreign(['recurring_period_id'], 'fk_recurring_period_id_invoices')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign('259415_5c500ae98af17');
            $table->dropForeign('259415_5c500ae9b10d1');
            $table->dropForeign('259415_5c500ae9d6387');
            $table->dropForeign('259415_5c500aea0188f');
            $table->dropForeign('fk_acrm_invoices_created_by_id');
            $table->dropForeign('fk_acrm_invoices_proposal_id');
            $table->dropForeign('fk_invoices_sale_agent');
            $table->dropForeign('fk_project_id_invoices');
            $table->dropForeign('fk_quote_id_quotes');
            $table->dropForeign('fk_recurring_period_id_invoices');
        });
    }
};
