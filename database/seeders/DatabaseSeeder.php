<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        //$this->call(AddressSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(ShiftSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(ReceiveMethodSeeder::class);
        $this->call(StatusSeeder::class);
        //$this->call(OrderSeeder::class);
        //$this->call(ArticleSeeder::class);
        //$this->call(SliderSeeder::class);
        //$this->call(PhotoSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PromotionSeeder::class);
        //$this->call(ProductSeeder::class);
        //$this->call(OrderListSeeder::class);
        $this->call(AdditiveSeeder::class);
        //$this->call(OrderListAdditiveSeeder::class);
        //$this->call(CarSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
