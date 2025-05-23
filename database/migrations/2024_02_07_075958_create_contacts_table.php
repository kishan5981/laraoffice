<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Role;
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
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable()->default(NULL);
            $table->string('last_name')->nullable()->default(NULL);
            $table->string('thumbnail')->nullable()->default(NULL);
            $table->string('phone1_code', 5)->nullable()->default(NULL);
            $table->string('phone1')->nullable()->default(NULL);
            $table->string('phone2_code', 5)->nullable()->default(NULL);
            $table->string('phone2')->nullable()->default(NULL);
            $table->string('email')->nullable()->default(NULL);
            $table->string('skype')->nullable()->default(NULL);
            $table->string('address')->nullable()->default(NULL);
            $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->softDeletes()->default(NULL);
            $table->unsignedInteger('company_id')->nullable()->default(0)->index('259284_5c4fd316a790e');
            $table->string('city')->nullable()->default(NULL);
            $table->string('state_region')->nullable()->default(NULL);
            $table->string('zip_postal_code')->nullable()->default(NULL);
            $table->string('tax_id')->nullable()->default(NULL);
            $table->unsignedInteger('group_id')->nullable()->default(0)->index('259284_5c5011422b03a');
            $table->unsignedInteger('country_id')->nullable()->default(0)->index('259284_5c5148b6efcd4');
            $table->text('delivery_address')->nullable();
            $table->unsignedInteger('currency_id')->nullable()->default(0)->index('fk_contacts_currency_id');
            $table->unsignedInteger('language_id')->nullable()->default(0)->index('fk_contacts_language_id');
            $table->boolean('ticket_emails')->nullable()->default(true)->comment('1 - Can Receive Ticket Email, 0 - Not receive Support Ticket Emails');
            $table->string('name')->nullable()->default(NULL);
            $table->string('fulladdress')->nullable()->default(NULL);
            $table->timestamp('email_verified_at')->nullable()->default(NULL)->comment('User Specific fields');
            $table->string('password')->nullable()->default(NULL);
            $table->string('remember_token')->nullable()->default(NULL);
            $table->unsignedInteger('department_id')->nullable()->default(0);
            $table->boolean('ticketit_admin')->nullable()->default(false);
            $table->boolean('ticketit_agent')->nullable()->default(false);
            $table->enum('status', ['Registered', 'Supended', 'Active', 'Deleted'])->nullable()->default('Active');
            $table->char('theme', 10)->nullable()->default(NULL);
            $table->char('portal_language', 10)->nullable()->default(NULL);
            $table->string('confirmation_code')->nullable()->default(NULL);
            $table->string('last_login_from', 50)->nullable()->default(NULL);
            $table->double('hourly_rate')->nullable()->default(0);
            $table->enum('is_user', ['yes', 'no'])->nullable()->default('no');
            $table->string('color_theme', 45)->nullable()->default(NULL);
            $table->string('color_skin', 45)->nullable()->default('skin-blue');
        });     
        $sqlFile = public_path('users.sql'); // Change 'example.sql' to your SQL file name

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
        Schema::dropIfExists('contacts');
    }
};
