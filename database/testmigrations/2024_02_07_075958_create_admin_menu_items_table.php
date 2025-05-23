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
        Schema::create('admin_menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('link');
            $table->unsignedInteger('parent')->default(0);
            $table->integer('sort')->default(0);
            $table->string('class')->nullable()->default('NULL');
            $table->unsignedInteger('menu')->index('admin_menu_items_menu_foreign');
            $table->integer('depth')->default(0);
            $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->string('permission')->nullable()->default('NULL');
            $table->string('icon_html')->nullable()->default('NULL');
            $table->string('theme', 20)->nullable()->default('NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_menu_items');
    }
};
