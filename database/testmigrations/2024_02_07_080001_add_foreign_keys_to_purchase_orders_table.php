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
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->foreign(['customer_id'], '259347_5c502e5c9dd65')->references(['id'])->on('contacts')->onDelete('CASCADE');
            $table->foreign(['currency_id'], '259347_5c502e5cb2ac0')->references(['id'])->on('currencies')->onDelete('CASCADE');
            $table->foreign(['warehouse_id'], '259347_5c502e5cc8928')->references(['id'])->on('warehouses')->onDelete('CASCADE');
            $table->foreign(['tax_id'], '259347_5c502e5ce08d5')->references(['id'])->on('taxes')->onDelete('CASCADE');
            $table->foreign(['discount_id'], '259347_5c502e5d01a3a')->references(['id'])->on('discounts')->onDelete('CASCADE');
            $table->foreign(['recurring_period_id'], 'fk_po_recurring_period_id')->references(['id'])->on('recurring_periods')->onDelete('CASCADE');
            $table->foreign(['sale_agent'], 'fk_po_sale_agent')->references(['id'])->on('contacts')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->dropForeign('259347_5c502e5c9dd65');
            $table->dropForeign('259347_5c502e5cb2ac0');
            $table->dropForeign('259347_5c502e5cc8928');
            $table->dropForeign('259347_5c502e5ce08d5');
            $table->dropForeign('259347_5c502e5d01a3a');
            $table->dropForeign('fk_po_recurring_period_id');
            $table->dropForeign('fk_po_sale_agent');
        });
    }
};
