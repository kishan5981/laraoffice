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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(NULL);
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->string('product_code')->nullable()->default(NULL);
            $table->double('actual_price')->nullable()->default(0);
            $table->double('sale_price')->nullable()->default(0);
            $table->unsignedInteger('stock_quantity')->nullable()->default(0);
            $table->unsignedInteger('alert_quantity')->nullable()->default(0);
            $table->string('thumbnail')->nullable()->default(NULL);
            $table->string('hsn_sac_code')->nullable()->default(NULL);
            $table->string('product_size')->nullable()->default(NULL);
            $table->string('product_weight')->nullable()->default(NULL);
            $table->unsignedInteger('ware_house_id')->nullable()->default(0)->index('259307_5c5022b0a7c5f');
            $table->unsignedInteger('brand_id')->nullable()->default(0)->index('259307_5c5022b0c1b14');
            $table->unsignedInteger('tax_id')->nullable()->default(0)->index('259307_5c5022b0c1b15');
            $table->unsignedInteger('discount_id')->nullable()->default(0)->index('259307_5c5022b0c1b16');
            $table->unsignedInteger('measurement_unit')->nullable()->default(0)->index('259307_5c5022b0c1b17');
            $table->enum('product_status', ['Active', 'Inactive', 'Damaged', 'Fixed asset'])->nullable()->default('Active');
            $table->text('prices')->nullable();
            $table->string('prices_available', 250)->nullable()->default(NULL);
            $table->softDeletes()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
