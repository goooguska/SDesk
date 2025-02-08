<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->departments() as $department) {
            Department::factory()->create(
                [
                    'name' => $department,
                ]
            );
        }
    }

    private function departments(): array
    {
        return [
            'Начальство',
            'Работа с клиентами',
            'VIP Работа с клиентами',
            'IT отдел',
        ];
    }
}
