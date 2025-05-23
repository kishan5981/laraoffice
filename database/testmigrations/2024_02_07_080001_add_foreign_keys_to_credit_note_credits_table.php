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
        Schema::table('credit_note_credits', function (Blueprint $table) {
            $table->foreign(['credit_note_id'], 'fk_acrm_credits_credit_note_id')->references(['id'])->on('credit_notes')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], 'fk_acrm_credits_invoice_id')->references(['id'])->on('invoices')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'fk_acrm_credits_user_id')->references(['id'])->on('contacts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credit_note_credits', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_credits_credit_note_id');
            $table->dropForeign('fk_acrm_credits_invoice_id');
            $table->dropForeign('fk_acrm_credits_user_id');
        });
    }
};
