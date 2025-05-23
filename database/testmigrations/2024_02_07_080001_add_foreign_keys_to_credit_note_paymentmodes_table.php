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
        Schema::table('credit_note_paymentmodes', function (Blueprint $table) {
            $table->foreign(['credit_note_id'], 'fk_credit_note_id_paymodes')->references(['id'])->on('credit_notes')->onDelete('CASCADE');
            $table->foreign(['payment_gateway_id'], 'fk_payment_gateway_id_creditpaymodes')->references(['id'])->on('payment_gateways')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credit_note_paymentmodes', function (Blueprint $table) {
            $table->dropForeign('fk_credit_note_id_paymodes');
            $table->dropForeign('fk_payment_gateway_id_creditpaymodes');
        });
    }
};
