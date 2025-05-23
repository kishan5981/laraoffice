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
        Schema::create('cart_orders_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->default(1);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->unsignedInteger('cart_order_id')->nullable()->default(0)->index('270937_5c75448ffff40ggggdff5');
            $table->unsignedInteger('product_id')->nullable()->default(0)->index('270937_5c7rerre54ggggd484400c2');
            $table->string('slug')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_orders_products');
    }
};
