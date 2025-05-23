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
        Schema::create('dashboard_widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->default('NULL');
            $table->enum('status', ['active', 'inactive'])->nullable()->default('active');
            $table->enum('type', ['numbers', 'chart', 'list', 'view'])->nullable()->default('numbers');
            $table->string('slug', 45)->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->integer('columns')->nullable()->default(4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard_widgets');
    }
};
