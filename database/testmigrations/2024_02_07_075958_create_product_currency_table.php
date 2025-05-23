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
        Schema::create('product_currency', function (Blueprint $table) {
            $table->unsignedInteger('product_id')->nullable()->default(0)->index('fk_p_66365_259305_produc_5c4fd87b37625');
            $table->unsignedInteger('currency_id')->nullable()->default(0)->index('fk_p_36585_259307_produc_5c4fd87b376ec');
            $table->string('currency_code', 10)->nullable()->default('NULL');
            $table->decimal('currency_actual_price', 10)->nullable()->default(0);
            $table->decimal('currency_sale_price', 10)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_currency');
    }
};
