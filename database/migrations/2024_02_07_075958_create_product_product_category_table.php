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
        Schema::create('product_product_category', function (Blueprint $table) {
            $table->unsignedInteger('product_id')->nullable()->default(0)->index('fk_p_259307_259305_produc_5c4fd87b37625');
            $table->unsignedInteger('product_category_id')->nullable()->default(0)->index('fk_p_259305_259307_produc_5c4fd87b376ec');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_category');
    }
};
