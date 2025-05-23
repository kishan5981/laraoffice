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
        Schema::create('contact_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(NULL);
            $table->string('address')->nullable()->default(NULL);
            $table->string('website')->nullable()->default(NULL);
            $table->string('email')->nullable()->default(NULL);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->unsignedInteger('created_by_id')->nullable()->default(0)->index('fk_contact_companies_created_by_id_idx');
            $table->unsignedInteger('country_id')->nullable()->default(0)->index('fk_country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_companies');
    }
};
