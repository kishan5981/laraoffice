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
        Schema::create('messenger_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->timestamp('sent_at')->nullable()->default(NULL);
            $table->timestamp('sender_read_at')->nullable()->default(NULL);
            $table->timestamp('receiver_read_at')->nullable()->default(NULL);
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
        Schema::dropIfExists('messenger_topics');
    }
};
