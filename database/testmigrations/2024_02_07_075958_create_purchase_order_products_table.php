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
        Schema::create('purchase_order_products', function (Blueprint $table) {
            $table->unsignedInteger('purchase_order_id')->nullable()->default(0)->index('fk_purchase_order_id_purchase_order_products');
            $table->unsignedInteger('product_id')->nullable()->default(0)->index('fk_product_id_purchase_order_products2');
            $table->string('product_name')->nullable()->default('NULL');
            $table->integer('product_qty')->nullable()->default(0);
            $table->decimal('product_price', 10)->nullable()->default(0);
            $table->decimal('product_tax', 10)->nullable()->default(0)->comment('Tax Rate');
            $table->string('tax_type', 10)->nullable()->default('NULL');
            $table->decimal('tax_value', 10)->nullable()->default(0);
            $table->decimal('product_discount', 10)->nullable()->default(0)->comment('Discount Rate');
            $table->string('discount_type', 10)->nullable()->default('NULL');
            $table->decimal('discount_value', 10, 0)->nullable()->default(0);
            $table->decimal('product_subtotal', 10, 0)->nullable()->default(0);
            $table->decimal('product_amount', 10)->nullable()->default(0);
            $table->integer('pid')->nullable()->default(0);
            $table->string('unit', 15)->nullable()->default('NULL');
            $table->string('hsn', 45)->nullable()->default('NULL');
            $table->integer('alert')->nullable()->default(0);
            $table->integer('stock_quantity')->nullable()->default(0);
            $table->text('product_description')->nullable()->default('NULL');

            $table->index(['purchase_order_id'], 'fk_product_id_purchase_order_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_products');
    }
};
