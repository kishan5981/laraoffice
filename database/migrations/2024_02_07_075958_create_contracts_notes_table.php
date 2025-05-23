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
        Schema::create('contracts_notes', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->text('description')->nullable();
            $table->date('date_contacted')->nullable()->default(NULL);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL);
            $table->unsignedInteger('contract_id')->nullable()->default(0);
            $table->unsignedInteger('created_by_id')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts_notes');
    }
};
