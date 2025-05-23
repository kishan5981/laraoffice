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
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->nullable()->default(NULL);
            $table->string('title')->nullable()->default(NULL);
            $table->string('photo1')->nullable()->default(NULL);
            $table->string('photo2')->nullable()->default(NULL);
            $table->text('notes')->nullable();
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->unsignedInteger('category_id')->nullable()->default(0)->index('259312_5c4fd97bd71bf_idx');
            $table->unsignedInteger('status_id')->nullable()->default(0)->index('259312_5c4fd97bee5f9');
            $table->unsignedInteger('location_id')->nullable()->default(0)->index('259312_5c4fd97c1c3b2');
            $table->unsignedInteger('assigned_user_id')->nullable()->default(0)->index('259312_5c4fd97c37c6b');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
};
