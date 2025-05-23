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
        Schema::table('invoices_history', function (Blueprint $table) {
            $table->foreign(['invoice_id'], '259415_5c500ae99af17')->references(['id'])->on('invoices')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices_history', function (Blueprint $table) {
            $table->dropForeign('259415_5c500ae99af17');
        });
    }
};
