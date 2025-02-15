<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->statuses() as $status) {
            Status::factory()->create(
                [
                    'name' => $status,
                ]
            );
        }
    }

    private function statuses(): array
    {
        return [
            'В работе',
            'Новая',
            'Выполнена',
            'Отклонена',
        ];
    }
}
