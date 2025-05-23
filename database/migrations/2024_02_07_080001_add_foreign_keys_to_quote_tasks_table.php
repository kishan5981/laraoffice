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
        Schema::table('quote_tasks', function (Blueprint $table) {
            $table->foreign(['recurring_id'], '298242_5cc68c34c3153')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
            $table->foreign(['quote_id'], '298242_5cc68c34eed43')->references(['id'])->on('quotes')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_acrm_quote_tasks_created_by_id')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['is_recurring_from'], 'fk_is_recurring_from_quote_tasks')->references(['id'])->on('quote_tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quote_tasks', function (Blueprint $table) {
            $table->dropForeign('298242_5cc68c34c3153');
            $table->dropForeign('298242_5cc68c34eed43');
            $table->dropForeign('fk_acrm_quote_tasks_created_by_id');
            $table->dropForeign('fk_is_recurring_from_quote_tasks');
        });
    }
};
