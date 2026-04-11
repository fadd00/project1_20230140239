<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Alice Doe', 'email' => 'alice@example.com', 'role' => 'user'],
            ['name' => 'Bob Smith', 'email' => 'bob@example.com', 'role' => 'user'],
            ['name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'role' => 'user'],
        ];

        foreach ($users as $u) {
            User::firstOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'role' => $u['role'], 
                ]
            );
        }
    }
}
