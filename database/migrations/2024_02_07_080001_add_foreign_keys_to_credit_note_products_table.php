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
        Schema::table('credit_note_products', function (Blueprint $table) {
            $table->foreign(['credit_note_id'], 'fk_credit_note_id_credit_note_products')->references(['id'])->on('credit_notes')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'fk_product_id_credit_note_products2')->references(['id'])->on('products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credit_note_products', function (Blueprint $table) {
            $table->dropForeign('fk_credit_note_id_credit_note_products');
            $table->dropForeign('fk_product_id_credit_note_products2');
        });
    }
};
