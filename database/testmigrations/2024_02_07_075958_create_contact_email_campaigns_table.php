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
        Schema::create('contact_email_campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('list_id')->nullable()->default('NULL');
            $table->string('list_name')->nullable()->default('NULL');
            $table->string('subject')->nullable()->default('NULL');
            $table->string('from_name')->nullable()->default('NULL');
            $table->string('from_email')->nullable()->default('NULL');
            $table->enum('is_schedule', ['yes', 'no'])->nullable()->default('no');
            $table->dateTime('schedule_date')->nullable()->default(NULL);
            $table->text('content')->nullable()->default('NULL');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->nullable()->default('0000-00-00 00:00:00');
            $table->string('campaign_id', 50)->nullable()->default('NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_email_campaigns');
    }
};
