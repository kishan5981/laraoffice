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
        Schema::table('dashboard_widgets_role', function (Blueprint $table) {
            $table->foreign(['dash_board_id'], 'fk_acrm_dashboard_widgets_role_1')->references(['id'])->on('dashboard_widgets')->onDelete('CASCADE');
            $table->foreign(['role_id'], 'fk_acrm_dashboard_widgets_role_2')->references(['id'])->on('roles')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dashboard_widgets_role', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_dashboard_widgets_role_1');
            $table->dropForeign('fk_acrm_dashboard_widgets_role_2');
        });
    }
};
