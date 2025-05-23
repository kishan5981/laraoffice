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
        Schema::table('invoice_products_tasks', function (Blueprint $table) {
            $table->foreign(['task_id'], 'fk_acrm_invoice_products_task_id22')->references(['id'])->on('project_tasks')->onDelete('CASCADE');
            $table->foreign(['time_entry_id'], 'fk_acrm_invoice_products_tasks_time_entry_id')->references(['id'])->on('time_entries')->onDelete('CASCADE');
            $table->foreign(['invoice_id'], 'fk_invoice_id_invoice_products22')->references(['id'])->on('invoices')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_products_tasks', function (Blueprint $table) {
            $table->dropForeign('fk_acrm_invoice_products_task_id22');
            $table->dropForeign('fk_acrm_invoice_products_tasks_time_entry_id');
            $table->dropForeign('fk_invoice_id_invoice_products22');
        });
    }
};
