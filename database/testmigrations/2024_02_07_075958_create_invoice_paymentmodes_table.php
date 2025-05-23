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
        Schema::create('invoice_paymentmodes', function (Blueprint $table) {
            $table->unsignedInteger('invoice_id')->nullable()->default(0)->index('fk_p_259566_259301_conten_5c5036ef1e1ea');
            $table->unsignedInteger('payment_gateway_id')->nullable()->default(0)->index('fk_p_259301_259566_articl_5c5036ef1e28b');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_paymentmodes');
    }
};
