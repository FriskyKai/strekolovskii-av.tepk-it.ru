<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('promotions')->insert([
            [
                'percent' => 10,
            ],
            [
                'percent' => 20,
            ],
            [
                'percent' => 25,
            ],
        ]);
    }
}
