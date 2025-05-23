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
        Schema::table('proposal_products', function (Blueprint $table) {
            $table->foreign(['product_id'], 'fk_product_id_proposal_products2')->references(['id'])->on('products')->onDelete('CASCADE');
            $table->foreign(['proposal_id'], 'fk_proposal_id_proposal_products')->references(['id'])->on('proposals')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposal_products', function (Blueprint $table) {
            $table->dropForeign('fk_product_id_proposal_products2');
            $table->dropForeign('fk_proposal_id_proposal_products');
        });
    }
};
