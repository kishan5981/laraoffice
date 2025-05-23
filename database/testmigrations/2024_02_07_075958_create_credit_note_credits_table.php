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
        Schema::create('credit_note_credits', function (Blueprint $table) {
            $table->unsignedInteger('credit_note_id')->index('fk_acrm_credits_credit_note_id_idx');
            $table->unsignedInteger('invoice_id')->index('fk_acrm_credits_invoice_id_idx');
            $table->unsignedInteger('user_id')->index('fk_acrm_credits_user_id_idx');
            $table->decimal('amount', 15);
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
        Schema::dropIfExists('credit_note_credits');
    }
};
