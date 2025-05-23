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
        Schema::create('quotes_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable()->default('NULL');
            $table->date('date_contacted')->nullable()->default(NULL);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('quotes_notes_deleted_at_index');
            $table->unsignedInteger('quote_id')->nullable()->default(0)->index('298254_5cc692936db0a');
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_acrm_quotes_notes_created_by_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes_notes');
    }
};
