<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'KevinManceau',
            'email' => 'kevin.manceau@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('KevinManceau'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'JeanClaude',
            'password' => Hash::make('JeanClaude'),
            'email' => 'jean@claude.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'user',
        ]);
        User::create([
            'name' => 'JeanPaul',
            'password' => Hash::make('JeanPaul'),
            'email' => 'jean@paul.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'user',
        ]);
    }
}
