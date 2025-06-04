<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PrivilegedUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Maria Pura', 'email' => 'maria.pura@example.com'],
            ['name' => 'America Reynoso', 'email' => 'america.reynoso@example.com'],
            ['name' => 'Nicole Volquez', 'email' => 'nicole.volquez@example.com'],
            ['name' => 'Ivelia Bido', 'email' => 'ivelia.bido@example.com'],
            ['name' => 'Estefany Perez', 'email' => 'estefany.perez@example.com'],
            ['name' => 'Damaris Brazoban', 'email' => 'damaris.brazoban@example.com'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}
