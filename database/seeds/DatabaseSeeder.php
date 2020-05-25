<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seed Users
         $this->call(UsersTableSeeder::class);
         //Seed Locations
         $this->call(LocationsTableSeeder::class);
    }
}
