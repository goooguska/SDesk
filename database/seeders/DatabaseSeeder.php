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
        User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('pass'),
        ]);

        $this->call([
            DepartmentSeeder::class,
            RoleSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
            RequestSeeder::class,
        ]);
    }
}
