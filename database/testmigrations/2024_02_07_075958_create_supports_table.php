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
        Schema::create('supports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default('NULL');
            $table->string('email')->nullable()->default('NULL');
            $table->string('subject')->nullable()->default('NULL');
            $table->enum('priority', ['Low', 'Medium', 'High', 'Urgent'])->nullable()->default('Medium');
            $table->text('description')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('supports_deleted_at_index');
            $table->unsignedInteger('department_id')->nullable()->default(0)->index('259533_5c50317ee7f26');
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_acrm_supports_createdby_id');
            $table->unsignedInteger('assigned_to_id')->nullable()->default(0)->index('fk_acrm_supports_assigned_to_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supports');
    }
};
