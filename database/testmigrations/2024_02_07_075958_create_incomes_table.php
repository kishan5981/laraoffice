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
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable()->default('NULL');
            $table->date('entry_date')->nullable()->default(NULL);
            $table->string('amount');
            $table->double('original_amount')->nullable()->default(0);
            $table->unsignedInteger('original_currency_id')->nullable()->default(0)->index('fk_original_currency_id');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->unsignedInteger('income_category_id')->nullable()->default(0)->index('259288_5c4fd43129965');
            $table->text('description')->nullable()->default('NULL');
            $table->string('ref_no')->nullable()->default('NULL');
            $table->unsignedInteger('account_id')->nullable()->default(0)->index('259288_5c500722c2930');
            $table->unsignedInteger('payer_id')->nullable()->default(0)->index('259288_5c500722ee978');
            $table->string('payer_name', 45)->nullable()->default('NULL')->comment('If the contact is deleted we can use this name, so that admin have track on all incomes even when contact deleted');
            $table->string('pay_method_id')->nullable()->default('NULL')->index('259288_5c5007230da07');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
};
