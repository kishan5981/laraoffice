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
        Schema::create('mile_stones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(NULL);
            $table->text('description')->nullable();
            $table->enum('description_visible_to_customer', ['yes', 'no'])->nullable()->default('yes');
            $table->date('due_date')->nullable()->default(NULL);
            $table->string('color')->nullable()->default(NULL);
            $table->integer('milestone_order')->nullable()->default(0);
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
        Schema::dropIfExists('mile_stones');
    }
};
