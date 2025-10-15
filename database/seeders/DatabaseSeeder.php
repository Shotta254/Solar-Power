<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Administrator
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@work.com',
            'password' => Hash::make('12345678'),
            'role' => 'piDSSAdministrator',
        ]);

        // Sales Clerk
        User::factory()->create([
            'name' => 'Sales Clerk',
            'email' => 'salesclerk@work.com',
            'password' => Hash::make('12345678'),
            'role' => 'piDSSsalesclerk',
        ]);

        // Technician
        User::factory()->create([
            'name' => 'Technician',
            'email' => 'technician@work.com',
            'password' => Hash::make('12345678'),
            'role' => 'piDSSTechnician',
        ]);

        // Add items to inventory
        $this->call([
            ItemSeeder::class,
        ]);

        // Example demo user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'customer',
        ]);
    }
}
