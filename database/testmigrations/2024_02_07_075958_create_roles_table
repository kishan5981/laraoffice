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
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name')->nullable()->default('NULL');
            $table->string('slug')->nullable()->default('NULL');
            $table->text('description')->nullable()->default('NULL');
           $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->string('color', 20)->nullable()->default('NULL');
            $table->softDeletes()->default(NULL);
            $table->enum('type', ['contact_type', 'role'])->nullable()->default('role');
            $table->enum('status', ['active', 'inactive'])->nullable()->default('active');
            $table->integer('priority')->nullable()->default(1);
        });
        $sqlFile = public_path('roles.sql'); // Change 'example.sql' to your SQL file name

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
        Schema::dropIfExists('roles');
    }
};
