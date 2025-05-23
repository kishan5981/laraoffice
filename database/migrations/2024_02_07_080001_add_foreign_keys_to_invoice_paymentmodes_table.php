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
        Schema::table('invoice_paymentmodes', function (Blueprint $table) {
            $table->foreign(['invoice_id'], 'fk_paymodes_invoice_id')->references(['id'])->on('invoices')->onDelete('CASCADE');
            $table->foreign(['payment_gateway_id'], 'fk_paymodes_paymode_id')->references(['id'])->on('payment_gateways')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_paymentmodes', function (Blueprint $table) {
            $table->dropForeign('fk_paymodes_invoice_id');
            $table->dropForeign('fk_paymodes_paymode_id');
        });
    }
};
