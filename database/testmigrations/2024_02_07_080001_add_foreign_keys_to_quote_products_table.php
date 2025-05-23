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
        Schema::table('quote_products', function (Blueprint $table) {
            $table->foreign(['product_id'], 'fk_product_id_quote_products2')->references(['id'])->on('products')->onDelete('CASCADE');
            $table->foreign(['quote_id'], 'fk_quote_id_quote_products')->references(['id'])->on('quotes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quote_products', function (Blueprint $table) {
            $table->dropForeign('fk_product_id_quote_products2');
            $table->dropForeign('fk_quote_id_quote_products');
        });
    }
};
