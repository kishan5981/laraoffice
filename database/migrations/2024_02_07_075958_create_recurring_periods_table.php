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
        Schema::create('recurring_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->default(NULL);
            $table->integer('value')->nullable()->default(1);
            $table->char('type', 10)->nullable()->default('\'\'month\'\'')->comment('Eg: day, week, month, year');
            $table->text('description')->nullable()->default(NULL);
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL)->index('recurring_periods_deleted_at_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recurring_periods');
    }
};
