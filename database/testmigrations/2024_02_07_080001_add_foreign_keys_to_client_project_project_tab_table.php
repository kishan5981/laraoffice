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
        Schema::table('client_project_project_tab', function (Blueprint $table) {
            $table->foreign(['client_project_id'], 'fk_p_259358_299518_projec_5cca76c1b594a')->references(['id'])->on('client_projects')->onDelete('CASCADE');
            $table->foreign(['project_tab_id'], 'fk_p_299518_259358_client_5cca76c1b5a79')->references(['id'])->on('project_tabs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_project_project_tab', function (Blueprint $table) {
            $table->dropForeign('fk_p_259358_299518_projec_5cca76c1b594a');
            $table->dropForeign('fk_p_299518_259358_client_5cca76c1b5a79');
        });
    }
};
