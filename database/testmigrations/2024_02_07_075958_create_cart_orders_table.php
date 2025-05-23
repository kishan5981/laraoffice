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
        Schema::create('cart_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['Pending', 'Active'])->nullable()->default('Active');
            $table->decimal('price', 15)->nullable()->default(0);
            $table->text('products')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('cart_orders_deleted_at_index');
            $table->unsignedInteger('customer_id')->nullable()->default(0)->index('270937_5c7544840ggggdff5');
            $table->unsignedInteger('billing_cycle_id')->nullable()->default(0)->index('270937_5c754ggggd484400c2');
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_orders');
    }
};
