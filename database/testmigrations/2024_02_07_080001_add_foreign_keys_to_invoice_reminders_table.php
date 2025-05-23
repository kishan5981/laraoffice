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
        Schema::table('invoice_reminders', function (Blueprint $table) {
            $table->foreign(['created_by_id'], 'fk_contacts_acrm_invoice_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['reminder_to_id'], 'fk_contacts_acrm_invoice_reminders_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], 'fk_invoice_id_reminders')->references(['id'])->on('invoices')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_reminders', function (Blueprint $table) {
            $table->dropForeign('fk_contacts_acrm_invoice_created_by_id');
            $table->dropForeign('fk_contacts_acrm_invoice_reminders_id');
            $table->dropForeign('fk_invoice_id_reminders');
        });
    }
};
