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
                'description' => 'Тонкое тесто, Томатный соус, Свежие томаты, Маринованные оливки, Зелёные травы, Моцарелла.',
                'photo_id' => 1,
                'category_id' => 1,
            ],
        ]);
    }
}
