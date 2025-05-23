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
        Schema::table('invoice_payments', function (Blueprint $table) {
            $table->foreign(['account_id'], '263295_5c5d41a961b5c')->references(['id'])->on('accounts')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], '263295_5c5d41a961b9c')->references(['id'])->on('invoices')->onDelete('CASCADE');
            $table->foreign(['credit_note_id'], 'fk_credit_note_id_invoicepayments')->references(['id'])->on('credit_notes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_payments', function (Blueprint $table) {
            $table->dropForeign('263295_5c5d41a961b5c');
            $table->dropForeign('263295_5c5d41a961b9c');
            $table->dropForeign('fk_credit_note_id_invoicepayments');
        });
    }
};
