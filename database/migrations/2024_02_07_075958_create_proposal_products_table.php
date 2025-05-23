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
        Schema::create('proposal_products', function (Blueprint $table) {
            $table->unsignedInteger('proposal_id')->nullable()->default(0)->index('fk_proposal_id_proposal_products');
            $table->unsignedInteger('product_id')->nullable()->default(0)->index('fk_product_id_proposal_products2');
            $table->string('product_name')->nullable()->default(NULL);
            $table->decimal('product_qty', 10)->nullable()->default(0)->comment('Quantity may have decimal value in case of project task invoice');
            $table->decimal('product_price', 10)->nullable()->default(0);
            $table->decimal('product_tax', 10)->nullable()->default(0)->comment('Tax Rate');
            $table->string('tax_type', 10)->nullable()->default(NULL);
            $table->decimal('tax_value', 10)->nullable()->default(0);
            $table->decimal('product_discount', 10)->nullable()->default(0)->comment('Discount Rate');
            $table->string('discount_type', 10)->nullable()->default(NULL);
            $table->decimal('discount_value', 10, 0)->nullable()->default(0);
            $table->decimal('product_subtotal', 10, 0)->nullable()->default(0);
            $table->decimal('product_amount', 10)->nullable()->default(0);
            $table->integer('pid')->nullable()->default(0);
            $table->string('unit', 15)->nullable()->default(NULL);
            $table->string('hsn', 45)->nullable()->default(NULL);
            $table->integer('alert')->nullable()->default(0);
            $table->integer('stock_quantity')->nullable()->default(0);
            $table->text('product_description')->nullable();

            $table->index(['proposal_id'], 'fk_product_id_proposal_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal_products');
    }
};
