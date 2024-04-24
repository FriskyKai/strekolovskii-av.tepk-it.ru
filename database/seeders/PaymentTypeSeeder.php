<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('payment_types')->insert([
            [
                'name' => 'По карте',
            ],
            [
                'name' => 'Наличными',
            ],
        ]);
    }
}
