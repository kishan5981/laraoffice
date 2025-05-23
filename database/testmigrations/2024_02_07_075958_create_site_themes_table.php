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
        Schema::create('site_themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->default('NULL');
            $table->string('slug')->nullable()->default('NULL');
            $table->string('theme_title_key')->nullable()->default('NULL');
            $table->text('settings_data')->nullable()->default('NULL');
            $table->string('description')->nullable()->default('NULL');
            $table->char('is_active', 2)->nullable()->default('0');
            $table->string('theme_color')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('site_themes_deleted_at_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_themes');
    }
};
