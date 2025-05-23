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
        Schema::create('ticketit_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang')->nullable()->default(NULL)->unique('ticketit_settings_lang_unique');
            $table->string('slug')->index('ticketit_settings_slug_index');
            $table->mediumText('value');
            $table->mediumText('default');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);

            $table->index(['lang'], 'ticketit_settings_lang_index');
            $table->unique(['slug'], 'ticketit_settings_slug_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticketit_settings');
    }
};
