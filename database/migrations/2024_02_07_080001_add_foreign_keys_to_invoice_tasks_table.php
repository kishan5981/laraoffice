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
        Schema::table('invoice_tasks', function (Blueprint $table) {
            $table->foreign(['priority_id'], '298700_5cc801277056b')->references(['id'])->on('dynamic_options')->onDelete('CASCADE');
            $table->foreign(['status_id'], '298700_5cc801279da9f')->references(['id'])->on('dynamic_options')->onDelete('CASCADE');
            $table->foreign(['recurring_id'], '298700_5cc80127c8e38')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], '298700_5cc8012800e26')->references(['id'])->on('invoices')->onDelete('CASCADE');
            $table->foreign(['mile_stone_id'], '298700_5cc801285d6cf')->references(['id'])->on('mile_stones')->onDelete('CASCADE');
            $table->foreign(['created_by_id'], 'fk_contacts_acrm_invoice_tasks_users')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['is_recurring_from'], 'fk_is_recurring_from_invoice_tasks')->references(['id'])->on('invoice_tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_tasks', function (Blueprint $table) {
            $table->dropForeign('298700_5cc801277056b');
            $table->dropForeign('298700_5cc801279da9f');
            $table->dropForeign('298700_5cc80127c8e38');
            $table->dropForeign('298700_5cc8012800e26');
            $table->dropForeign('298700_5cc801285d6cf');
            $table->dropForeign('fk_contacts_acrm_invoice_tasks_users');
            $table->dropForeign('fk_is_recurring_from_invoice_tasks');
        });
    }
};
