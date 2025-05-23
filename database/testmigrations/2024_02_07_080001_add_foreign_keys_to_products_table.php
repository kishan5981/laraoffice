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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['ware_house_id'], '259307_5c5022b0a7c5f')->references(['id'])->on('warehouses')->onDelete('CASCADE');
            $table->foreign(['brand_id'], '259307_5c5022b0c1b14')->references(['id'])->on('brands')->onDelete('CASCADE');
            $table->foreign(['tax_id'], '259307_5c5022b0c1b15')->references(['id'])->on('taxes')->onDelete('CASCADE');
            $table->foreign(['discount_id'], '259307_5c5022b0c1b16')->references(['id'])->on('discounts')->onDelete('CASCADE');
            $table->foreign(['measurement_unit'], '259307_5c5022b0c1b17')->references(['id'])->on('measurement_units')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('259307_5c5022b0a7c5f');
            $table->dropForeign('259307_5c5022b0c1b14');
            $table->dropForeign('259307_5c5022b0c1b15');
            $table->dropForeign('259307_5c5022b0c1b16');
            $table->dropForeign('259307_5c5022b0c1b17');
        });
    }
};
