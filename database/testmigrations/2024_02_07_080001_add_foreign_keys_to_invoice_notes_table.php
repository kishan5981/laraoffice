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
        Schema::table('invoice_notes', function (Blueprint $table) {
            $table->foreign(['quote_id'], '298711_5cc8034fec12d')->references(['id'])->on('quotes')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_contacts_invoice_notes_createdby')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], 'fk_invoice_id_notes')->references(['id'])->on('invoices')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_notes', function (Blueprint $table) {
            $table->dropForeign('298711_5cc8034fec12d');
            $table->dropForeign('fk_acrm_contacts_invoice_notes_createdby');
            $table->dropForeign('fk_invoice_id_notes');
        });
    }
};
