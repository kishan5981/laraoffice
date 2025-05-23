<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ContactSeeder;
class DatabaseSeeder extends Seeder
{

    use WithoutModelEvents;


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            // ContactSeeder::class,
        ]);  
    }
}
