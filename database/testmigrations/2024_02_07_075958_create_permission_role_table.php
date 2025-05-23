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
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedInteger('permission_id')->nullable()->default(0)->index('fk_p_259278_259279_role_p_5c4fd266c9ac3');
            $table->unsignedInteger('role_id')->nullable()->default(0)->index('fk_p_259279_259278_permis_5c4fd266c9bbd');
        });
        $sqlFile = public_path('role_permissions.sql'); // Change 'example.sql' to your SQL file name

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
        Schema::dropIfExists('permission_role');
    }
};
