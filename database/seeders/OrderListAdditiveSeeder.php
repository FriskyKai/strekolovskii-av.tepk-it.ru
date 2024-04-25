<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderListAdditiveSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_list_additives')->insert([
            [
                'order_list_id' => 1,
                'additive_id' => 4,
            ],
            [
                'order_list_id' => 4,
                'additive_id' => 1,
            ],
            [
                'order_list_id' => 4,
                'additive_id' => 2,
            ],
            [
                'order_list_id' => 4,
                'additive_id' => 3,
            ],
            [
                'order_list_id' => 4,
                'additive_id' => 4,
            ],
        ]);
    }
}
