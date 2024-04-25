<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'date' => '2024-04-25 19:20:00',
                'status_id' => 4,
                'receive_method_id' => 1,
                'payment_type_id' => 1,
                'user_id' => 4,
                'address_id' => 4,
            ],
            [
                'date' => '2024-04-26 18:30:00',
                'status_id' => 4,
                'receive_method_id' => 1,
                'payment_type_id' => 1,
                'user_id' => 4,
                'address_id' => 4,
            ],
            [
                'date' => '2024-04-25 21:15:00',
                'status_id' => 4,
                'receive_method_id' => 1,
                'payment_type_id' => 1,
                'user_id' => 4,
                'address_id' => 4,
            ],
        ]);
    }
}
