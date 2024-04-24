<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('roles')->insert([
             [
                 'code' => 'admin',
                 'name' => 'Администратор',
             ],
             [
                 'code' => 'manager',
                 'name' => 'Менеджер',
             ],
             [
                 'code' => 'worker',
                 'name' => 'Сотрудник',
             ],
             [
                 'code' => 'user',
                 'name' => 'Пользователь',
             ],
         ]);
    }
}
