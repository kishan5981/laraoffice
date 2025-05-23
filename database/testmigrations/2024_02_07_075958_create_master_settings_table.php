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
        Schema::create('master_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module')->nullable()->default('NULL');
            $table->string('slug')->nullable()->default('NULL');
            $table->string('key')->nullable()->default('NULL');
            $table->text('description')->nullable()->default('NULL');
            $table->longText('settings_data')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('master_settings_deleted_at_index');
            $table->string('moduletype', 50)->nullable()->default('NULL');
            $table->enum('status', ['Active', 'Inactive'])->nullable()->default('Active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_settings');
    }
};
