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
        Schema::table('contact_companies', function (Blueprint $table) {
            $table->foreign(['created_by_id'], 'fk_contact_companies_created_by_id')->references(['id'])->on('contacts')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign(['country_id'], 'fk_country_id')->references(['id'])->on('countries')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_companies', function (Blueprint $table) {
            $table->dropForeign('fk_contact_companies_created_by_id');
            $table->dropForeign('fk_country_id');
        });
    }
};
