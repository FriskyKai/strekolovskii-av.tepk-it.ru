<?php

use App\Http\Controllers\AdditiveController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlePhotoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Регистрация
Route::post('/register', [AuthController::class, 'singIn']);
// Авторизация
Route::post('/auth', [AuthController::class, 'login']);

// Просмотр всех категорий
Route::get('/categories', [CategoryController::class, 'index']);
// Просмотр категории
Route::get('/categories/{id}', [CategoryController::class, 'show']);

// Просмотр всех товаров
Route::get('/products', [ProductController::class, 'index']);
// Просмотр товара
Route::get('/products/{id}', [ProductController::class, 'show']);

// Просмотр всех фотографий
Route::get('/photos', [PhotoController::class, 'index']);

// Просмотр всех новостных фотографий
Route::get('/article-photos', [ArticlePhotoController::class, 'index']);
// Просмотр новостной фотографии
Route::get('/article-photos/{id}', [ArticlePhotoController::class, 'show']);

// Просмотр всех фотографий в слайдере
Route::get('/slider', [SliderController::class, 'index']);

// Просмотр всех акций
Route::get('/promotions', [PromotionController::class, 'index']);

// Просмотр всех новостей
Route::get('/articles', [ArticleController::class, 'index']);
// Просмотр новости
Route::get('/articles/{id}', [ArticleController::class, 'show']);

// Роуты для авторизированных пользователей
Route::middleware('auth:api')->group(function () {
    // Выход
    Route::get('/logout', [AuthController::class, 'logout']);

    // РОЛЬ
    // Добавление роли
    Route::post('/roles', [RoleController::class, 'create']);
    // Просмотр всех ролей
    Route::get('/roles', [RoleController::class, 'index']);
    // Просмотр роли
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    // Редактирование роли
    Route::post('/roles/{id}', [RoleController::class, 'update']);
    // Удаление роли
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

    // ПОЛЬЗОВАТЕЛЬ
    // Просмотр всех пользователей
    Route::get('/users', [UserController::class, 'index']);
    // Просмотр пользователя (Для админа)
    Route::get('/users/{id}', [UserController::class, 'show']);
    // Профиль пользователя (Для пользователя)
    Route::get('/profile', [UserController::class, 'profile']);
    // Редактирование пользователя
    Route::post('/users/{id}', [UserController::class, 'update']);
    // Удаление пользователя
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // СМЕНА
    // Добавление смены
    Route::post('/shifts', [ShiftController::class, 'create']);
    // Просмотр всех смен
    Route::get('/shifts', [ShiftController::class, 'index']);
    // Просмотр смены
    Route::get('/shifts/{id}', [ShiftController::class, 'show']);
    // Редактирование смены
    Route::post('/shifts/{id}', [ShiftController::class, 'update']);
    // Удаление смены
    Route::delete('/shifts/{id}', [ShiftController::class, 'destroy']);

    // АДРЕС
    // Добавление адреса
    Route::post('/addresses', [AddressController::class, 'create']);
    // Просмотр всех адресов
    Route::get('/addresses', [AddressController::class, 'index']);
    // Просмотр адреса
    Route::get('/addresses/{id}', [AddressController::class, 'show']);
    // Редактирование адреса
    Route::post('/addresses/{id}', [AddressController::class, 'update']);
    // Удаление адреса
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy']);

    // ЗАКАЗ
    // Добавление заказа
    Route::post('/orders', [OrderController::class, 'create']);
    // Просмотр всех заказов
    Route::get('/orders', [OrderController::class, 'index']);
    // Просмотр заказа
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    // Редактирование заказа
    Route::post('/orders/{id}', [OrderController::class, 'update']);
    // Удаление заказа
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

    // СОСТАВ ЗАКАЗА
    // Добавление состава заказа
    Route::post('/order-lists', [OrderListController::class, 'create']);
    // Просмотр всех составов заказов
    Route::get('/order-lists', [OrderListController::class, 'index']);
    // Просмотр состава заказа
    Route::get('/order-lists/{id}', [OrderListController::class, 'show']);
    // Редактирование состава заказа
    Route::post('/order-lists/{id}', [OrderListController::class, 'update']);
    // Удаление состава заказа
    Route::delete('/order-lists/{id}', [OrderListController::class, 'destroy']);

    // ДОБАВКА
    // Добавление добавки
    Route::post('/additives', [AdditiveController::class, 'create']);
    // Просмотр всех добавок
    Route::get('/additives', [AdditiveController::class, 'index']);
    // Просмотр добавки
    Route::get('/additives/{id}', [AdditiveController::class, 'show']);
    // Редактирование добавки
    Route::post('/additives/{id}', [AdditiveController::class, 'update']);
    // Удаление добавки
    Route::delete('/additives/{id}', [AdditiveController::class, 'destroy']);

//    # Нужно будет доредачить
//    // СОСТАВ ЗАКАЗА_ДОБАВКА
//    // Просмотр всех добавок в составах заказов
//    Route::get('/order-list-additives', [OrderListAdditiveController::class, 'index']);
//    // Просмотр всех добавок в составе заказа
//    Route::get('/order-list-additives/{id}', [OrderListAdditiveController::class, 'index']);
//    // Добавление добавки в состав заказа
//    Route::post('/order-list-additives', [OrderListAdditiveController::class, 'create']);
//    // Просмотр добавки в составе заказа
//    Route::get('/order-list-additives/{id}', [OrderListAdditiveController::class, 'index']);
//    // Редактирование добавки в составе заказа
//    Route::get('/order-list-additives/{id}', [OrderListAdditiveController::class, 'index']);
//    // Удаление добавки из состава заказа
//    Route::delete('/order-list-additives/{id}', [OrderListAdditiveController::class, 'destroy']);

    // ТОВАР
    // Добавление товара
    Route::post('/products', [ProductController::class, 'create']);
    // Редактирование товара
    Route::post('/products/{id}', [ProductController::class, 'update']);
    // Удаление товара
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    // КАТЕГОРИЯ
    // Добавление категории
    Route::post('/categories', [CategoryController::class, 'create']);
    // Редактирование категории
    Route::post('/categories/{id}', [CategoryController::class, 'update']);
    // Удаление категории
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // АКЦИЯ
    // Добавление акции
    Route::post('/promotions', [PromotionController::class, 'create']);
    // Просмотр акции
    Route::get('/promotions/{id}', [PromotionController::class, 'show']);
    // Редактирование акции
    Route::post('/promotions/{id}', [PromotionController::class, 'update']);
    // Удаление акции
    Route::delete('/promotions/{id}', [PromotionController::class, 'destroy']);

    // НОВОСТИ
    // Добавление новости
    Route::post('/articles', [ArticleController::class, 'create']);
    // Редактирование новости
    Route::post('/articles/{id}', [ArticleController::class, 'update']);
    // Удаление новости
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);

    // ФОТОГРАФИИ
    // Добавление фотографии
    Route::post('/photos', [PhotoController::class, 'store']);
    // Просмотр фотографии
    Route::get('/photos/{id}', [PhotoController::class, 'show']);
    // Редактирование фотографии
    Route::post('/photos/{id}', [PhotoController::class, 'update']);
    // Удаление фотографии
    Route::delete('/photos/{id}', [PhotoController::class, 'destroy']);

    // НОВОСТЬ_ФОТОГРАФИЯ
    // Добавление новостной фотографии
    Route::post('/article-photos', [ArticlePhotoController::class, 'create']);
    // Редактирование новостной фотографии
    Route::post('/article-photos/{id}', [ArticlePhotoController::class, 'update']);
    // Удаление новостной фотографии
    Route::delete('/article-photos/{id}', [ArticlePhotoController::class, 'destroy']);

    // СЛАЙДЕР
    // Добавление фотографии в слайдер
    Route::post('/slider', [SliderController::class, 'add']);
    // Редактирование фотографии в слайдере
    Route::post('/slider/{id}', [SliderController::class, 'update']);
    // Удаление фотографии в слайдере
    Route::delete('/slider/{id}', [SliderController::class, 'destroy']);

    // КОРЗИНА
    // Добавление корзины
    Route::post('/carts', [CartController::class, 'create']);
    // Просмотр всех корзин
    Route::get('/carts', [CartController::class, 'index']);
    // Просмотр корзины
    Route::get('/carts/{id}', [CartController::class, 'show']);
    // Редактирование корзины
    Route::post('/carts/{id}', [CartController::class, 'update']);
    // Удаление корзины
    Route::delete('/carts/{id}', [CartController::class, 'destroy']);
});
