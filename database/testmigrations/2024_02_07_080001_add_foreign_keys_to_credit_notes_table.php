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
        Schema::table('credit_notes', function (Blueprint $table) {
            $table->foreign(['currency_id'], 'fk_currency_id_creditnotes')->references(['id'])->on('currencies')->onDelete('CASCADE');
            $table->foreign(['discount_id'], 'fk_discount_id_creditnotes')->references(['id'])->on('discounts')->onDelete('CASCADE');
            $table->foreign(['project_id'], 'fk_project_id_creditnotes')->references(['id'])->on('client_projects')->onDelete('CASCADE');
            $table->foreign(['tax_id'], 'fk_tax_id_creditnames')->references(['id'])->on('taxes')->onDelete('CASCADE');
            $table->foreign(['customer_id'], 'ft_customer_id_creditnotes')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credit_notes', function (Blueprint $table) {
            $table->dropForeign('fk_currency_id_creditnotes');
            $table->dropForeign('fk_discount_id_creditnotes');
            $table->dropForeign('fk_project_id_creditnotes');
            $table->dropForeign('fk_tax_id_creditnames');
            $table->dropForeign('ft_customer_id_creditnotes');
        });
    }
};
