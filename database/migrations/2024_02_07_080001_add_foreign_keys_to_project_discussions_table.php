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
        Schema::table('project_discussions', function (Blueprint $table) {
            $table->foreign(['contact_id'], 'fk_contact_id_project_discussions')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['created_by'], 'fk_contacts_acrm_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['project_id'], 'fk_project_id_project_discussions')->references(['id'])->on('client_projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_discussions', function (Blueprint $table) {
            $table->dropForeign('fk_contact_id_project_discussions');
            $table->dropForeign('fk_contacts_acrm_created_by_id');
            $table->dropForeign('fk_project_id_project_discussions');
        });
    }
};
