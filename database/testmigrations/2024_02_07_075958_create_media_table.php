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
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_type')->nullable()->default('NULL');
            $table->unsignedBigInteger('model_id')->nullable()->default(0);
            $table->string('collection_name');
            $table->string('name');
            $table->string('file_name');
            $table->string('disk');
            $table->string('mime_type')->nullable()->default('NULL');
            $table->unsignedInteger('size');
            $table->text('manipulations');
            $table->text('custom_properties');
            $table->text('responsive_images');
            $table->unsignedInteger('order_column')->nullable()->default(0);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);

            $table->index(['model_type', 'model_id'], 'media_model_type_model_id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
};
