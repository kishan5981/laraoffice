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
        Schema::table('task_task_tag', function (Blueprint $table) {
            $table->foreign(['task_tag_id'], 'fk_p_259297_259298_task_t_5c4fd7e7a50e3')->references(['id'])->on('task_tags')->onDelete('CASCADE');
            $table->foreign(['task_id'], 'fk_p_259298_259297_taskta_5c4fd7e7a5022')->references(['id'])->on('tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_task_tag', function (Blueprint $table) {
            $table->dropForeign('fk_p_259297_259298_task_t_5c4fd7e7a50e3');
            $table->dropForeign('fk_p_259298_259297_taskta_5c4fd7e7a5022');
        });
    }
};
