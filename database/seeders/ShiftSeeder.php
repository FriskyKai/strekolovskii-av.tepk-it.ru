<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('shifts')->insert([
            [
                'user_id' => '3',
                'start' => '2024-04-25 17:00:00',
                'end' => '2024-04-26 02:00:00',
            ],
            [
                'user_id' => '3',
                'start' => '2024-04-26 17:00:00',
                'end' => '2024-04-27 02:00:00',
            ],
            [
                'user_id' => '3',
                'start' => '2024-04-27 17:00:00',
                'end' => '2024-04-28 02:00:00',
            ],
        ]);
    }
}
