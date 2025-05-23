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
        Schema::table('invoice_products', function (Blueprint $table) {
            $table->foreign(['invoice_id'], 'fk_invoice_id_invoice_products')->references(['id'])->on('invoices')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'fk_product_id_invoice_products2')->references(['id'])->on('products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_products', function (Blueprint $table) {
            $table->dropForeign('fk_invoice_id_invoice_products');
            $table->dropForeign('fk_product_id_invoice_products2');
        });
    }
};
