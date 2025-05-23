<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     
    public function run(): void
    {
        // Contact::factory()->count(50)->create();
        $faker = Faker::create();
        $users = [
            // Admin Role
            [
                'id' => DEFAULT_ADMIN_ID, 
                'email' => 'admin@admin.com', 
                'password' => 'password', // password
                'role' => ADMIN_TYPE, 
            ],
    
            // Executive
            [
                'id' => DEFAULT_EXECUTIVE_ID, 
                'email' => 'sam@gmail.com', 
                'password' => 'password', // password
                'role' => EXECUTIVE_TYPE, 
            ],
    
            // Customer
            [
                'id' => DEFAULT_CUSTOMER_ID,
                'email' => 'domenic@gmail.com', 
                'password' => 'password', // password
                'role' => CUSTOMERS_TYPE, 
            ],
    
            // Sale Agent
            [
                'id' => DEFAULT_SALEAGENT_ID,
                'email' => 'cieo@gmail.com', 
                'password' => 'password', // password
                'role' => CONTACT_SALE_AGENT, 
            ],
    
            // Supplier
            [
                'id' => DEFAULT_SUPPLIER_ID,
                'email' => 'brent@gmail.com', 
                'password' => 'password', // password
                'role' => SUPPLIERS_TYPE, 
            ],
    
            // Sales Manager
            [
                'id' => DEFAULT_SALEMANAGER_ID,
                'email' => 'lavinia@gmail.com', 
                'password' => 'password', // password
                'role' => SALES_MANAGER_TYPE, 
            ],
    
            // Employee
            [
                'id' => DEFAULT_EMPLOYEE_ID,
                'email' => 'himla@gmail.com', 
                'password' => 'password', // password
                'role' => EMPLOYEES_TYPE, 
            ],
    
            // Client
            [
                'id' => DEFAULT_CLIENT_ID,
                'email' => 'merle@gmail.com', 
                'password' => 'password', // password
                'role' => CONTACT_CLIENT_TYPE, 
            ],
    
            // Project Manager
            [
                'id' => DEFAULT_PROJECTMANAGER_ID,
                'email' => 'joanie@gmail.com', 
                'password' => 'password', // password
                'role' => PROJECT_MANAGER, 
            ],
    
            // Business Manager
            [
                'id' => DEFAULT_BUSINESSMANAGER_ID, 
                'email' => 'robert@gmail.com', 
                'password' => 'password', // password
                'role' => BUSINESS_MANAGER_TYPE, 
            ],
    
            // Stock Manager
            [
                'id' => DEFAULT_STOCKMANAGER_ID,                 
                'email' => 'donald@example.com', 
                'password' => 'password', // password
                'role' => STOCK_MANAGER, 
            ],
        ];
    
        foreach ($users as $userData) {
            Contact::create([
                'name' => $userData['role'],
                'email' => $userData['email'],
                'email_verified_at' => now(),
                'password' => Hash::make($userData['password']),
                'remember_token' => Str::random(10),
                'status' => 'active',
                'company_id' => $faker->randomNumber(),
                'group_id' => $faker->randomNumber(),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'thumbnail' => $faker->imageUrl(),
                'phone1_code' => $faker->countryCode(),
                'phone1' => $faker->phoneNumber(),
                'phone2_code' => $faker->countryCode(),
                'phone2' => $faker->phoneNumber(),
                'skype' => $faker->userName(),
                'address' => $faker->address(),
                'city' => $faker->city(),
                'state_region' => $faker->state(),
                'zip_postal_code' => $faker->postcode(),
                'tax_id' => $faker->randomNumber(9, true),
                'country_id' => $faker->randomNumber(),
                'delivery_address' => $faker->address(),
                'currency_id' => $faker->randomNumber(),
                'language_id' => $faker->randomNumber(),
                'ticket_emails' => true,
                'department_id' => 0,
                'ticketit_admin' => false,
                'ticketit_agent' => false,
                'theme' => 'default',
                'portal_language' => null,
                'confirmation_code' => $faker->uuid(),
                'last_login_from' => $faker->ipv4(),
                'hourly_rate' => $faker->randomFloat(2, 0, 100),
                'is_user' => 'no',
                'color_theme' => 'skin-blue',
                'color_skin' => 'skin-blue',
            ]);
        }

    }
}
