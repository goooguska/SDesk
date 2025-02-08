<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\Responsible;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponsibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $requests = Request::all();

        foreach ($requests as $request) {
            Responsible::factory()->create([
                'user_id'    => $users->random(),
                'request_id' => $request->id,
            ]);
        }

    }
}
