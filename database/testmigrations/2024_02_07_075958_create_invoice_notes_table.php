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
        Schema::create('invoice_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable()->default('NULL');
            $table->date('date_contacted')->nullable()->default(NULL);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('quotes_notes_deleted_at_index');
            $table->unsignedInteger('invoice_id')->nullable()->default(0)->index('298254_5cc692936db0a');
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_acrm_contacts_invoice_notes_createdby_id_idx');
            $table->unsignedInteger('quote_id')->nullable()->default(0)->index('298711_5cc8034fec12d');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_notes');
    }
};
