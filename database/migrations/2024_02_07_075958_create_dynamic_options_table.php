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
        Schema::create('dynamic_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->default(NULL);
            $table->text('description')->nullable();
            $table->string('module', 50)->nullable()->default('1');
            $table->char('type', 10)->nullable()->default('priorities');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('recurring_periods_deleted_at_index');
            $table->string('color', 10)->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dynamic_options');
    }
};
