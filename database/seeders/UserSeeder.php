<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $ownerRole = Role::where('name', 'owner')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin Musyoki',
            'role' => 'admin',
            'email' => 'musyokijimadmin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),

        ]);

        $owner = User::create([
            'name' => 'Owner Musyoki',
            'role' => 'owner',
            'email' => 'musyokijimowner@owner.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),

        ]);

        $user = User::create([
            'name' => 'User Musyoki',
            'role' => 'user',
            'email' => 'musyokijimuser@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),

        ]);

        $admin->roles()->attach($adminRole);
        $owner->roles()->attach($ownerRole);
        $user->roles()->attach($userRole);

    }
}
