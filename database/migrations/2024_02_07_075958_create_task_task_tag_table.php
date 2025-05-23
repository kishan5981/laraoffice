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
        Schema::create('task_task_tag', function (Blueprint $table) {
            $table->unsignedInteger('task_id')->nullable()->default(0)->index('fk_p_259298_259297_taskta_5c4fd7e7a5022');
            $table->unsignedInteger('task_tag_id')->nullable()->default(0)->index('fk_p_259297_259298_task_t_5c4fd7e7a50e3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_task_tag');
    }
};
