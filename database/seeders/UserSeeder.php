<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = file_get_contents(database_path('usernames.txt'));
        $usernames = explode(' ', $data);

        foreach ($usernames as $username) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'username' => $username,
                'password' => Hash::make('12345678')
            ]);
        }
    }
}
