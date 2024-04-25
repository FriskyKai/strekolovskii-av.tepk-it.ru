<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Роли
        $this->call(RoleSeeder::class);

        // Адреса
        $this->call(AddressSeeder::class);

        // Пользователи
        $this->call(UserSeeder::class);

        // Смены сотрудников
        $this->call(ShiftSeeder::class);

        // Типы оплаты заказа
        $this->call(PaymentTypeSeeder::class);

        // Способы получения заказа
        $this->call(ReceiveMethodSeeder::class);

        // Статусы заказа
        $this->call(StatusSeeder::class);

        // Заказы
        $this->call(OrderSeeder::class);

        // Новости
        $this->call(ArticleSeeder::class);

        // Слайдер
        //$this->call(SliderSeeder::class);

        // Фотографии
        $this->call(PhotoSeeder::class);

        // Категории товаров
        $this->call(CategorySeeder::class);

        // Акции
        $this->call(PromotionSeeder::class);

        // Товары
        $this->call(ProductSeeder::class);

        // Составы заказов
        $this->call(OrderListSeeder::class);

        // Добавки
        $this->call(AdditiveSeeder::class);

        // Составы заказов_Добавки
        $this->call(OrderListAdditiveSeeder::class);

        // Корзины
        //$this->call(CarSeeder::class);
    }
}
