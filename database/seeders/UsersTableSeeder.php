<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'musyokijimowner@gmail.com')->first();

        if(!$user)
        {
            User::create(
                [
                    'name' => 'Owner Musyoki',
                    'email' => 'musyokijimowner@gmail.com',
                    'role' => 'owner',
                    'password' => Hash::make('password')
                ]
            );

        }

    }
}
