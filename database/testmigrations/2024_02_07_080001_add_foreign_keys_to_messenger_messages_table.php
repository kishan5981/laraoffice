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
        Schema::table('messenger_messages', function (Blueprint $table) {
            $table->foreign(['topic_id'], 'messenger_messages_topic_id_foreign')->references(['id'])->on('messenger_topics')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messenger_messages', function (Blueprint $table) {
            $table->dropForeign('messenger_messages_topic_id_foreign');
        });
    }
};
