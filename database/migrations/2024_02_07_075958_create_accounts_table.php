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
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(NULL);
            $table->text('description')->nullable();
            $table->string('initial_balance')->nullable()->default(NULL);
            $table->string('account_number')->nullable()->default(NULL);
            $table->string('contact_person')->nullable()->default(NULL);
            $table->string('phone')->nullable()->default(NULL);
            $table->string('url')->nullable()->default(NULL);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes()->default(NULL)->index('accounts_deleted_at_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
