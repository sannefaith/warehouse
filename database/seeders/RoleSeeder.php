<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
//make class
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'user']);

    }
}
