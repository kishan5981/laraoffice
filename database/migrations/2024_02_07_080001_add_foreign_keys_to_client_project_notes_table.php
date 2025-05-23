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
        Schema::table('client_project_notes', function (Blueprint $table) {
            $table->foreign(['user_id'], 'fk_acrm_client_project_notes_user_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['project_id'], 'fk_project_id_project_notes')->references(['id'])->on('client_projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_project_notes', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_client_project_notes_user_id');
            $table->dropForeign('fk_project_id_project_notes');
        });
    }
};
