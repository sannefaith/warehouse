<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //this is the seeder for the database and it was vvery hard to do 
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UsersTableSeeder::class,
            UserSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
        \App\Models\Role::factory()->hasUsers(10)->create();


    }
}
