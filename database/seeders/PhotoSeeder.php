<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('photos')->insert([
            [
                'path' => 'storage\app\public\photos\photo1.jpg',
            ],
            [
                'path' => 'storage\app\public\photos\photo2.png',
            ],
            [
                'path' => 'storage\app\public\photos\photo3.jpg',
            ],
        ]);
    }
}
