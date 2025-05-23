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
        Schema::table('invoice_products_expenses', function (Blueprint $table) {
            $table->foreign(['expense_id'], 'fk_acrm_invoice_products_1223')->references(['id'])->on('expenses')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], 'fk_invoice_id_invoice_products223')->references(['id'])->on('invoices')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_products_expenses', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_invoice_products_1223');
            $table->dropForeign('fk_invoice_id_invoice_products223');
        });
    }
};
