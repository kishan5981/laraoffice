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
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable()->default(NULL);
            $table->text('description')->nullable()->default('NULL');
            $table->double('amount')->nullable()->default(0);
            $table->string('ref_no')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('transfers_deleted_at_index');
            $table->unsignedInteger('from_id')->nullable()->default(0)->index('259554_5c5034b6e9c61');
            $table->unsignedInteger('to_id')->nullable()->default(0)->index('259554_5c5034b7307c2');
            $table->unsignedInteger('payment_method_id')->nullable()->default(0)->index('259554_5c5034b7623aa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
