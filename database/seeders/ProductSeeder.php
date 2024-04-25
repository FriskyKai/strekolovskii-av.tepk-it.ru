<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Солнечный Дворик',
                'new' => true,
                'bestseller' => false,
                'price' => 240,
                'description' => 'Тонкое тесто, Томатный соус, Свежие томаты, Маринованные оливки, Ароматные травы, Сыр Моцарелла.',
                'photo_id' => 1,
                'category_id' => 1,
            ],
            [
                'name' => 'Итальянская классика',
                'new' => false,
                'bestseller' => false,
                'price' => 260,
                'description' => 'Тонкое тесто, Томатный соус, Пикантная пепперони, Нежные шампиньоны, Ароматные итальянские травы, Сыр моцарелла.',
                'photo_id' => 2,
                'category_id' => 1,
            ],
            [
                'name' => 'Вегетарианская радуга',
                'new' => false,
                'bestseller' => false,
                'price' => 250,
                'description' => 'Тонкое тесто, Томатный соус, Свежие цветные перцы, Ароматные красные луковицы, Сладкие маслины, Сыр моцарелла.',
                'photo_id' => 3,
                'category_id' => 1,
            ],
        ]);
    }
}
