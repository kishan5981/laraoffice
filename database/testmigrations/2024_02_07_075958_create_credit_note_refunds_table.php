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
        Schema::create('credit_note_refunds', function (Blueprint $table) {
            $table->integer('id');
            $table->unsignedInteger('credit_note_id');
            $table->unsignedInteger('user_id');
            $table->date('refunded_on');
            $table->string('payment_mode', 40);
            $table->text('note')->nullable()->default('NULL');
            $table->decimal('amount', 10, 0);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_note_refunds');
    }
};
