<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@rescue.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create superadmin user
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@rescue.com',
            'password' => bcrypt('superadmin123'),
            'role' => 'superadmin',
        ]);

        $this->call([
            AnimalSeeder::class,
        ]);
    }
}
