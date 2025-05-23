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
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->nullable()->default(0)->index('fk_p_259279_259280_user_r_5c4fd26c5adde');
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('fk_user_id_role_user_idx');
        });
        $sqlFile = public_path('user_roles.sql'); // Change 'example.sql' to your SQL file name

        // Check if the SQL file exists
        if (file_exists($sqlFile)) {
            // Read SQL file content
            $sqlContent = file_get_contents($sqlFile);

            // Execute SQL queries
            DB::unprepared($sqlContent);
        } else {
            // Handle error if SQL file doesn't exist
            echo "SQL file not found!";
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
};
