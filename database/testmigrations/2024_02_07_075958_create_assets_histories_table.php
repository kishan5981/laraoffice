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
        Schema::create('assets_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->unsignedInteger('asset_id')->nullable()->default(0)->index('259313_5c4fd98601861');
            $table->unsignedInteger('status_id')->nullable()->default(0)->index('259313_5c4fd98619efc');
            $table->unsignedInteger('location_id')->nullable()->default(0)->index('259313_5c4fd98631757');
            $table->unsignedInteger('assigned_user_id')->nullable()->default(0)->index('fk_acrm_assets_histories_assigned_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets_histories');
    }
};
