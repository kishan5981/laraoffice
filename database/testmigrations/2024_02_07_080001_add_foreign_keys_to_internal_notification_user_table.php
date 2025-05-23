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
        Schema::table('internal_notification_user', function (Blueprint $table) {
            $table->foreign(['user_id'], 'acrm_internal_notification_user_FK')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['internal_notification_id'], 'fk_p_259294_259280_user_i_5c4fd78fc5f92')->references(['id'])->on('internal_notifications')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internal_notification_user', function (Blueprint $table) {
            $table->dropForeign('acrm_internal_notification_user_FK');
            $table->dropForeign('fk_p_259294_259280_user_i_5c4fd78fc5f92');
        });
    }
};
