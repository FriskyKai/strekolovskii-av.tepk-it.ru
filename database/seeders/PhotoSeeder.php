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
                'path' => 'photos/photo1.jpg',
            ],
            [
                'path' => 'photos/photo2.png',
            ],
            [
                'path' => 'photos/photo3.jpg',
            ],
        ]);
    }
}
