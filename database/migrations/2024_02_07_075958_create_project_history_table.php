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
        Schema::create('project_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject')->nullable()->default(NULL);
            $table->text('description')->nullable();
            $table->enum('show_to_customer', ['yes', 'no'])->nullable()->default('no');
            $table->timestamp('last_activity')->nullable()->default(NULL);
            $table->unsignedInteger('created_by')->nullable()->default(0)->index('fk_created_by_project_discussions');
            $table->unsignedInteger('contact_id')->nullable()->default(0)->index('fk_contact_id_project_discussions');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('mile_stones_deleted_at_index');
            $table->unsignedInteger('project_id')->nullable()->default(0)->index('298246_5cc68dfc5f286');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_history');
    }
};
