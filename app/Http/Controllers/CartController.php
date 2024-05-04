<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartCreateRequest;
use App\Http\Requests\CartUpdateRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Создание корзины
    public function create(CartCreateRequest $request) {
        $cart = Cart::create($request->all());

        return response()->json(new CartResource($cart))->setStatusCode(201);
    }

    // Просмотр всех корзин
    public function index() {
        $carts = Cart::all();
        return response()->json(CartResource::collection($carts))->setStatusCode(200, 'Успешно');
    }

    // Просмотр всех товаров в корзине по пользователю
    public function showByUser($id) {
        $carts = Cart::where('user_id', $id)->get();

        return response()->json(CartResource::collection($carts))->setStatusCode(200, 'Успешно');
    }

    // Просмотр корзины
    public function show($id) {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json('Корзина не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json(new CartResource($cart))->setStatusCode(200, 'Успешно');
    }

    // Редактирование корзины
    public function update(CartUpdateRequest $request, $id) {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json('Корзина не найдена')->setStatusCode(404, 'Not found');
        }

        $cart->update($request->all());
        return response()->json(new CartResource($cart))->setStatusCode(200, 'Изменено');
    }

    // Удаление корзины
    public function destroy($id) {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json('Корзина не найдена')->setStatusCode(404, 'Not found');
        }

        Cart::destroy($id);
        return response()->json('Корзина удалена')->setStatusCode(200, 'Удалено');
    }
}
