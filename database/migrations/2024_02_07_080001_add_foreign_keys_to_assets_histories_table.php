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
        Schema::table('assets_histories', function (Blueprint $table) {
            $table->foreign(['asset_id'], '259313_5c4fd98601861')->references(['id'])->on('assets')->onDelete('CASCADE');
            $table->foreign(['status_id'], '259313_5c4fd98619efc')->references(['id'])->on('assets_statuses')->onDelete('CASCADE');
            $table->foreign(['location_id'], '259313_5c4fd98631757')->references(['id'])->on('assets_locations')->onDelete('CASCADE');
            $table->foreign(['assigned_user_id'], 'fk_acrm_assets_histories_assigned_user_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets_histories', function (Blueprint $table) {
            $table->dropForeign('259313_5c4fd98601861');
            $table->dropForeign('259313_5c4fd98619efc');
            $table->dropForeign('259313_5c4fd98631757');
            $table->dropForeign('fk_acrm_assets_histories_assigned_user_id');
        });
    }
};
