<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReceiveMethodSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('receive_methods')->insert([
            [
                'name' => 'Курьер',
            ],
            [
                'name' => 'Самовывоз',
            ],
        ]);
    }
}
