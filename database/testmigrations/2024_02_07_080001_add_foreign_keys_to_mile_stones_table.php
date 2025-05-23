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
        Schema::table('mile_stones', function (Blueprint $table) {
            $table->foreign(['project_id'], '298246_5cc68dfc5f286')->references(['id'])->on('client_projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mile_stones', function (Blueprint $table) {
            $table->dropForeign('298246_5cc68dfc5f286');
        });
    }
};
