<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('module', 50)->nullable()->default(NULL);
            $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->enum('status', ['active', 'inactive'])->nullable()->default('active');
        });

        // Import data from CSV file
        $sqlFile = public_path('permissions.sql'); // Change 'example.sql' to your SQL file name

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
        Schema::dropIfExists('permissions');
    }
};
