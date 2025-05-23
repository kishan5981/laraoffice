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
        Schema::create('internal_notification_user', function (Blueprint $table) {
            $table->unsignedInteger('internal_notification_id')->nullable()->default(0)->index('fk_p_259294_259280_user_i_5c4fd78fc5f92');
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('acrm_internal_notification_user_FK');
            $table->timestamp('read_at')->nullable()->default(NULL);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internal_notification_user');
    }
};
