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
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign(['company_id'], '259284_5c4fd316a790e')->references(['id'])->on('contact_companies')->onDelete('SET NULL');
            $table->foreign(['group_id'], '259284_5c5011422b03a')->references(['id'])->on('contact_groups')->onDelete('SET NULL');
            $table->foreign(['country_id'], '259284_5c5148b6efcd4')->references(['id'])->on('countries')->onDelete('SET NULL');
            $table->foreign(['currency_id'], 'fk_contacts_currency_id')->references(['id'])->on('currencies')->onDelete('SET NULL');
            $table->foreign(['language_id'], 'fk_contacts_language_id')->references(['id'])->on('languages')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign('259284_5c4fd316a790e');
            $table->dropForeign('259284_5c5011422b03a');
            $table->dropForeign('259284_5c5148b6efcd4');
            $table->dropForeign('fk_contacts_currency_id');
            $table->dropForeign('fk_contacts_language_id');
        });
    }
};
