<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'surname' => 'Стреколовский',
                'name' => 'Артём',
                'email' => 'strekolovskii@mail.ru',
                'phone' => '88005553531',
                'password' => bcrypt('QWEasd1'),
                'role_id' => 1
            ],
            [
                'surname' => 'Волков',
                'name' => 'Дмитрий',
                'email' => 'volkov@mail.ru',
                'phone' => '88005553532',
                'password' => bcrypt('QWEasd2'),
                'role_id' => 2
            ],
            [
                'surname' => 'Николайчук',
                'name' => 'Ярослав',
                'email' => 'nikolaichuk@mail.ru',
                'phone' => '88005553533',
                'password' => bcrypt('QWEasd3'),
                'role_id' => 3
            ],
            [
                'surname' => 'Григорьев',
                'name' => 'Егор',
                'email' => 'grigoriev@mail.ru',
                'phone' => '88005553534',
                'password' => bcrypt('QWEasd4'),
                'role_id' => 4
            ],
        ]);
    }
}
