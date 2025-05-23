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
        Schema::table('client_projects', function (Blueprint $table) {
            $table->foreign(['status_id'], '259358_5c4ff380bc7e4')->references(['id'])->on('project_statuses')->onDelete('CASCADE');
            $table->foreign(['client_id'], '259358_5c4ff9d6a3140')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['billing_type_id'], '259358_5c4ff9d6b9c2b')->references(['id'])->on('project_billing_types')->onDelete('CASCADE');
            $table->foreign(['currency_id'], 'fk_acrm_client_projects_currency_id')->references(['id'])->on('currencies')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_projects', function (Blueprint $table) {
            $table->dropForeign('259358_5c4ff380bc7e4');
            $table->dropForeign('259358_5c4ff9d6a3140');
            $table->dropForeign('259358_5c4ff9d6b9c2b');
            $table->dropForeign('fk_acrm_client_projects_currency_id');
        });
    }
};
