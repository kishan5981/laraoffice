<?php

namespace Database\Factories;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{

    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
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
    
        $userDefinitions = [];
    
        foreach ($users as $userData) {
            $userDefinitions[] = [
                'name' => $userData['role'],
                'email' => $userData['email'],
                'email_verified_at' => now(),
                'password' => Hash::make($userData['password']),
                'remember_token' => Str::random(10),
                'status' => 'active',
                'company_id' => $this->faker->randomNumber(),
                'group_id' => $this->faker->randomNumber(),
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'thumbnail' => $this->faker->imageUrl(),
                'phone1_code' => $this->faker->countryCode(),
                'phone1' => $this->faker->phoneNumber(),
                'phone2_code' => $this->faker->countryCode(),
                'phone2' => $this->faker->phoneNumber(),
                'skype' => $this->faker->userName(),
                'address' => $this->faker->address(),
                'city' => $this->faker->city(),
                'state_region' => $this->faker->state(),
                'zip_postal_code' => $this->faker->postcode(),
                'tax_id' => $this->faker->randomNumber(9, true),
                'country_id' => $this->faker->randomNumber(),
                'delivery_address' => $this->faker->address(),
                'currency_id' => $this->faker->randomNumber(),
                'language_id' => $this->faker->randomNumber(),
                'ticket_emails' => true,
                'department_id' => 0,
                'ticketit_admin' => false,
                'ticketit_agent' => false,
                'theme' => 'default',
                'portal_language' => null,
                'confirmation_code' => $this->faker->uuid(),
                'last_login_from' => $this->faker->ipv4(),
                'hourly_rate' => $this->faker->randomFloat(2, 0, 100),
                'is_user' => 'no',
                'color_theme' => 'skin-blue',
                'color_skin' => 'skin-blue',
            ];
        }
    
        return $userDefinitions;
    }
    
}
