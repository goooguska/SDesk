<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::all();
        $roles = Role::all();

        foreach ($this->names() as $name) {
            User::factory()->create([
                'fullname' => $name,
                'department_id' => $departments->random()->id,
                'role_id' => $roles->random()->id,
            ]);
        }

    }

    private function names(): array
    {
        return [
                "Гусева Пелагея Давидовна",
                "Михайлов Артём Дмитриевич",
                "Медведев Тихон Миронович",
                "Крылова Кира Георгиевна",
                "Сахаров Артём Константинович",
                "Дементьева Вера Львовна",
                "Иванов Антон Ильич",
                "Григорьев Андрей Львович",
                "Бирюкова Екатерина Александровна",
                "Павловский Лев Даниилович",
                "Колесников Макар Максимович",
                "Афанасьева Анна Артёмовна",
                "Кочергина Вероника Егоровна",
                "Фомин Кирилл Даниилович",
                "Куприянов Артур Алексеевич"
        ];
    }
}
