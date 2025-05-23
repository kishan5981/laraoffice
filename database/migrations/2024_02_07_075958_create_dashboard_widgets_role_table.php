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
        Schema::create('dashboard_widgets_role', function (Blueprint $table) {
            $table->unsignedInteger('dash_board_id')->index('fk_acrm_dashboard_widgets_role_1');
            $table->unsignedInteger('role_id')->index('fk_acrm_dashboard_widgets_role_2_idx');
            $table->integer('display_order')->nullable()->default(0);
            $table->integer('display_columns')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard_widgets_role');
    }
};
