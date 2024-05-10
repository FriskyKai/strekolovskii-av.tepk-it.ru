<?php

use App\Http\Controllers\AdditiveController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlePhotoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderListAdditiveController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StatusController;
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

// Просмотр всех товаров
Route::get('/products', [ProductController::class, 'index']);
// Просмотр всех товаров по категории
Route::get('/products/category/{id}', [ProductController::class, 'showByCategory']);

// Просмотр всех фотографий
Route::get('/photos', [PhotoController::class, 'index']);

// Просмотр всех новостных фотографий
Route::get('/article-photos', [ArticlePhotoController::class, 'index']);
// Просмотр всех новостных фотографий по новости
Route::get('/article-photos/article/{id}', [ArticlePhotoController::class, 'showByArticle']);

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

    // ПОЛЬЗОВАТЕЛЬ
    // Просмотр всех пользователей
    Route::get('/users', [UserController::class, 'index']);
    // Просмотр пользователя
    Route::get('/users/{id}', [UserController::class, 'show']);
    // Редактирование пользователя
    Route::post('/users/{id}', [UserController::class, 'update']);
    // Удаление пользователя
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // ПРОФИЛЬ
    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'profile']);
    // Редактирование профиля пользователя
    Route::post('/profile', [ProfileController::class, 'update']);

    // СМЕНА
    // Добавление смены
    Route::post('/shifts', [ShiftController::class, 'create']);
    // Просмотр всех смен
    Route::get('/shifts', [ShiftController::class, 'index']);
    // Просмотр текущей смены пользователя
    Route::get('/shifts/user/{id}', [ShiftController::class, 'showByUser']);
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
    // Редактирование адреса
    Route::post('/addresses/{id}', [AddressController::class, 'update']);
    // Удаление адреса
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy']);

    // ЗАКАЗ
    // Добавление заказа
    Route::post('/orders', [OrderController::class, 'create']);
    // Просмотр всех заказов пользователя
    Route::get('/orders', [OrderController::class, 'index']);
    // Просмотр всех заказов пользователя
    Route::get('/orders/my', [OrderController::class, 'showByUser']);
    // Просмотр текущего заказа пользователя
    Route::get('/orders/current', [OrderController::class, 'current']);
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
    // Просмотр всех составов заказа по номеру заказа
    Route::get('/order-lists/order/{id}', [OrderListController::class, 'showByOrder']);
    // Просмотр состава заказа
    Route::get('/order-lists/{id}', [OrderListController::class, 'show']);
    // Редактирование состава заказа
    Route::post('/order-lists/{id}', [OrderListController::class, 'update']);
    // Удаление состава заказа
    Route::delete('/order-lists/{id}', [OrderListController::class, 'destroy']);

    // СТАТУСЫ ЗАКАЗА
    // Просмотр всех статусов
    Route::get('/statuses', [StatusController::class, 'index']);

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

    // СОСТАВ ЗАКАЗА_ДОБАВКА
    // Добавление добавки в состав заказа
    Route::post('/order-list-additives', [OrderListAdditiveController::class, 'create']);
    // Просмотр всех записей состав заказа_добавка
    Route::get('/order-list-additives', [OrderListAdditiveController::class, 'index']);
    // Просмотр всех добавок в составе заказа
    Route::get('/order-list-additives/order-list/{id}', [OrderListAdditiveController::class, 'showByOrderList']);
    // Просмотр добавки в составе заказа
    Route::get('/order-list-additives/{id}', [OrderListAdditiveController::class, 'show']);
    // Редактирование добавки в составе заказа
    Route::get('/order-list-additives/{id}', [OrderListAdditiveController::class, 'update']);
    // Удаление добавки из состава заказа
    Route::delete('/order-list-additives/{id}', [OrderListAdditiveController::class, 'destroy']);

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

    // КОРЗИНА
    // Добавление товара в корзину
    Route::post('/carts', [CartController::class, 'create']);
    // Просмотр всего содержимого корзины пользователя
    Route::get('/carts', [CartController::class, 'index']);
    // Увеличение кол-ва товара в корзине
    Route::get('/carts/{id}/increase', [CartController::class, 'increase']);
    // Уменьшение кол-ва товара в корзине
    Route::get('/carts/{id}/decrease', [CartController::class, 'decrease']);
    // Удаление товара из корзины
    Route::delete('/carts/{id}', [CartController::class, 'destroy']);
});

// Функционал админа и менеджера
Route::middleware(['auth:api', 'role:admin|manager'])->group(function () {
    // ИНФОРМАЦИЯ ПО ПРОДАЖАМ
    // Просмотр всех продаж за период (день/месяц/год)
    Route::post('/sales', [SaleController::class, 'getSalesByPeriod']);
    // Просмотр продаж по позиции за период (день/месяц/год)
    Route::post('/sales/{id}', [SaleController::class, 'getSalesByPeriodAndProduct']);

    // ФОТОГРАФИИ
    // Добавление фотографии
    Route::post('/photos', [PhotoController::class, 'store']);
    // Редактирование фотографии
    Route::post('/photos/{id}', [PhotoController::class, 'update']);
    // Удаление фотографии
    Route::delete('/photos/{id}', [PhotoController::class, 'destroy']);
});

// Функционал админа
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    // СЛАЙДЕР
    // Добавление фотографии в слайдер
    Route::post('/slider', [SliderController::class, 'add']);
    // Редактирование фотографии в слайдере
    Route::post('/slider/{id}', [SliderController::class, 'update']);
    // Удаление фотографии в слайдере
    Route::delete('/slider/{id}', [SliderController::class, 'destroy']);

    // НОВОСТЬ_ФОТОГРАФИЯ
    // Добавление новостной фотографии
    Route::post('/article-photos', [ArticlePhotoController::class, 'create']);
    // Редактирование новостной фотографии
    Route::post('/article-photos/{id}', [ArticlePhotoController::class, 'update']);
    // Удаление новостной фотографии
    Route::delete('/article-photos/{id}', [ArticlePhotoController::class, 'destroy']);
});


