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
        Schema::create('ticketit_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->longText('html')->nullable()->default(NULL);
            $table->unsignedInteger('user_id')->index('ticketit_comments_user_id_index');
            $table->unsignedInteger('ticket_id')->index('ticketit_comments_ticket_id_index');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticketit_comments');
    }
};
