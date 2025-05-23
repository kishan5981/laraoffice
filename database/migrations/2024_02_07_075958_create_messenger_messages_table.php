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
        Schema::create('messenger_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('topic_id')->index('messenger_messages_topic_id_foreign');
            $table->integer('sender_id');
            $table->text('content');
            $table->timestamp('sent_at')->useCurrent();
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messenger_messages');
    }
};
