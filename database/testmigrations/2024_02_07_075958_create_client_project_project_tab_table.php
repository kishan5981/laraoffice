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
        Schema::create('client_project_project_tab', function (Blueprint $table) {
            $table->unsignedInteger('client_project_id')->nullable()->default(0)->index('fk_p_259358_299518_projec_5cca76c1b594a');
            $table->unsignedInteger('project_tab_id')->nullable()->default(0)->index('fk_p_299518_259358_client_5cca76c1b5a79');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_project_project_tab');
    }
};
