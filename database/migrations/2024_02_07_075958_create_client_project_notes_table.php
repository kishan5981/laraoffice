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
        Schema::create('client_project_notes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('project_id')->index('fk_project_id_project_notes');
            $table->longText('description');
            $table->unsignedInteger('user_id')->index('fk_acrm_client_project_notes_user_id_idx');
            $table->timestamp('created_at')->useCurrent(); 
            $table->timestamp('updated_at')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_project_notes');
    }
};
