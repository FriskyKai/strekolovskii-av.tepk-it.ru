<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartCreateRequest;
use App\Http\Requests\CartUpdateRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Создание корзины
    public function create(CartCreateRequest $request) {
        $cart = Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'count' => $request->count ? $request->count : 1
        ]);

        return response()->json(new CartResource($cart))->setStatusCode(201);
    }

    // Просмотр всего содержимого корзины пользователя
    public function index() {
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        if (!$carts) {
            return response()->json('Содержимое не найдено')->setStatusCode(404, 'Not found');
        }

        return response()->json(CartResource::collection($carts))->setStatusCode(200, 'Успешно');
    }

    // Увеличение кол-ва товара в корзине
    public function increase($id) {
        $cart = Cart::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if (!$cart) {
            return response()->json('Содержимое не найдено')->setStatusCode(404, 'Not found');
        }

        if ($cart->count == 10) {
            return response()->json('Слишком много')->setStatusCode(422, 'Unprocessable Entity');
        }

        $cart->count++;
        $cart->save();

        return response()->json(new CartResource($cart))->setStatusCode(200, 'Изменено');
    }

    // Уменьшение кол-ва товара в корзине
    public function decrease($id) {
        $cart = Cart::where('user_id', Auth::user()->id)->where('id', $id)->first();

        if (!$cart) {
            return response()->json('Содержимое не найдено')->setStatusCode(404, 'Not found');
        }

        if ($cart->count == 1) {
            Cart::destroy($id);
            return response()->json('Товар удалён из корзины')->setStatusCode(200, 'Удалено');
        }

        $cart->count--;
        $cart->save();

        return response()->json(new CartResource($cart))->setStatusCode(200, 'Изменено');
    }

    // Удаление товара из корзины
    public function destroy($id) {
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json('Корзина не найдена')->setStatusCode(404, 'Not found');
        }

        Cart::destroy($id);
        return response()->json('Корзина удалена')->setStatusCode(200, 'Удалено');
    }
}
