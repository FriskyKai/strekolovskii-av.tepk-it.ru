<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_lists')->insert([
            [
                'order_id' => 1,
                'product_id' => 1,
                'count' => 1,
                'price' => 240,
                'total' => 240,
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'count' => 1,
                'price' => 260,
                'total' => 260,
            ],
            [
                'order_id' => 2,
                'product_id' => 2,
                'count' => 1,
                'price' => 260,
                'total' => 260,
            ],
            [
                'order_id' => 3,
                'product_id' => 3,
                'count' => 2,
                'price' => 250,
                'total' => 500,
            ],
        ]);
    }
}
