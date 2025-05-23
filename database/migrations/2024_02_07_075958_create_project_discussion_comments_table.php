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
        Schema::create('project_discussion_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_created_by_project_discussions');
            $table->unsignedInteger('contact_id')->nullable()->default(0)->index('fk_contact_id_project_discussions');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('mile_stones_deleted_at_index');
            $table->unsignedInteger('project_id')->nullable()->default(0)->index('298246_5cc68dfc5f286');
            $table->unsignedInteger('discussion_id')->nullable()->default(0);
            $table->unsignedInteger('parent_id')->nullable()->default(0);
            $table->string('attachment')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_discussion_comments');
    }
};
