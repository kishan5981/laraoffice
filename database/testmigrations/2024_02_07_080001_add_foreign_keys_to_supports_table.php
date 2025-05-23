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
        Schema::table('supports', function (Blueprint $table) {
            $table->foreign(['department_id'], '259533_5c50317ee7f26')->references(['id'])->on('departments')->onDelete('CASCADE');
            $table->foreign(['assigned_to_id'], 'fk_acrm_supports_assigned_to_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_supports_createdby_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supports', function (Blueprint $table) {
            $table->dropForeign('259533_5c50317ee7f26');
            $table->dropForeign('fk_acrm_supports_assigned_to_id');
            $table->dropForeign('fk_acrm_supports_createdby_id');
        });
    }
};
