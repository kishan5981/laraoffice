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
        Schema::table('assets', function (Blueprint $table) {
            $table->foreign(['category_id'], '259312_5c4fd97bd71bf22')->references(['id'])->on('assets_categories')->onDelete('CASCADE');
            $table->foreign(['status_id'], '259312_5c4fd97bee5f9')->references(['id'])->on('assets_statuses')->onDelete('CASCADE');
            $table->foreign(['location_id'], '259312_5c4fd97c1c3b2')->references(['id'])->on('assets_locations')->onDelete('CASCADE');
            $table->foreign(['assigned_user_id'], 'fk_acrm_assets_assigned_user_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign('259312_5c4fd97bd71bf22');
            $table->dropForeign('259312_5c4fd97bee5f9');
            $table->dropForeign('259312_5c4fd97c1c3b2');
            $table->dropForeign('fk_acrm_assets_assigned_user_id');
        });
    }
};
