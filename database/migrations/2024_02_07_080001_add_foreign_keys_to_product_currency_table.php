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
        Schema::table('product_currency', function (Blueprint $table) {
            $table->foreign(['currency_id'], 'fk_p_36585_259307_produc_5c4fd87b376ec')->references(['id'])->on('currencies')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'fk_p_66365_259305_produc_5c4fd87b37625')->references(['id'])->on('products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_currency', function (Blueprint $table) {
            $table->dropForeign('fk_p_36585_259307_produc_5c4fd87b376ec');
            $table->dropForeign('fk_p_66365_259305_produc_5c4fd87b37625');
        });
    }
};
