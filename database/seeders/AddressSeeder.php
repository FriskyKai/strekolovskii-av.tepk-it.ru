<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('addresses')->insert([
            [
                'name' => 'Иркутсткий тракт, 175',
            ],
            [
                'name' => 'Ул.Беринга, 13/1, кв.123',
            ],
            [
                'name' => 'Ул.Бела Куна, 24/2, кв.123',
            ],
            [
                'name' => 'Ул.Мичурина, 89, кв.123',
            ],
            [
                'name' => 'Московский тракт, 83, кв.123',
            ],
            [
                'name' => 'Проспект Ленина, 210, кв.123',
            ],
        ]);
    }
}
