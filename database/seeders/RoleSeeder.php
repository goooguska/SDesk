<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles() as $role) {
            Role::factory()->create(
                [
                    'name' => $role['name'],
                    'isAdmin' => $role['isAdmin'],
                ]
            );
        }
    }

    private function roles(): array
    {
        return [
            [
                'name' => 'Администратор',
                'isAdmin' => true,
            ],
            [
                'name' => 'Руководитель',
                'isAdmin' => true,
            ],
            [
                'name' => 'Сотрудник',
                'isAdmin' => false,
            ],
        ];
    }
}
