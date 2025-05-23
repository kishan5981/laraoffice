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
        Schema::table('proposals', function (Blueprint $table) {
            $table->foreign(['created_by_id'], 'fk_acrm_proposals_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['quote_id'], 'fk_acrm_proposals_quote_id')->references(['id'])->on('quotes')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], 'fk_invoice_id_proposals')->references(['id'])->on('invoices')->onDelete('CASCADE');
            $table->foreign(['currency_id'], 'fk_proposals_currency_id')->references(['id'])->on('currencies')->onDelete('CASCADE');
            $table->foreign(['customer_id'], 'fk_proposals_customerid')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['discount_id'], 'fk_proposals_discount_id')->references(['id'])->on('discounts')->onDelete('CASCADE');
            $table->foreign(['recurring_period_id'], 'fk_proposals_recurring_period_id')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
            $table->foreign(['sale_agent'], 'fk_proposals_sale_agent')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['tax_id'], 'fk_proposals_tax_id')->references(['id'])->on('taxes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_proposals_created_by_id');
            $table->dropForeign('fk_acrm_proposals_quote_id');
            $table->dropForeign('fk_invoice_id_proposals');
            $table->dropForeign('fk_proposals_currency_id');
            $table->dropForeign('fk_proposals_customerid');
            $table->dropForeign('fk_proposals_discount_id');
            $table->dropForeign('fk_proposals_recurring_period_id');
            $table->dropForeign('fk_proposals_sale_agent');
            $table->dropForeign('fk_proposals_tax_id');
        });
    }
};
