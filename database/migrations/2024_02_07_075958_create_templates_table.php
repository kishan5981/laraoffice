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
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('key')->unique('templates_key_unique');
            $table->enum('type', ['Content', 'Header', 'Footer']);
            $table->string('subject');
            $table->string('from_email')->nullable()->default(NULL);
            $table->string('from_name')->nullable()->default(NULL);
            $table->text('content');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('templates_deleted_at_index');
            $table->char('status', 10)->nullable()->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
};
