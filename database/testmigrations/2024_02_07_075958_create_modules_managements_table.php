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
        Schema::create('modules_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default('NULL');
            $table->string('slug')->nullable()->default('NULL');
            $table->enum('type', ['Core', 'Custom'])->nullable()->default('Core');
            $table->enum('enabled', ['Yes', 'No'])->nullable()->default('No');
            $table->text('description')->nullable()->default('NULL');
            $table->longText('settings_data')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('modules_managements_deleted_at_index');
            $table->enum('can_inactive', ['yes', 'no'])->nullable()->default('yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules_managements');
    }
};
