<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditiveSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('additives')->insert([
            [
                'name' => 'Бекон',
            ],
            [
                'name' => 'Ветчина',
            ],
            [
                'name' => 'Острое Пепперони'
            ],
            [
                'name' => 'Нежный цыплёнок'
            ],
            [
                'name' => 'Сыр Моцарелла',
            ],
            [
                'name' => 'Сыры Чеддер и Пармезан',
            ],
            [
                'name' => 'Помидоры',
            ],
            [
                'name' => 'Маринованные огурчики',
            ],
            [
                'name' => 'Шампиньоны',
            ],
            [
                'name' => 'Сладкий перец',
            ],
            [
                'name' => 'Острый перец Халапеньо',
            ],
            [
                'name' => 'Красный лук',
            ],
        ]);
    }
}
