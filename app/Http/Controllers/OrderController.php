<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Создание заказа
    public function create(OrderCreateRequest $request) {
        $order = Order::create($request->all());

        return response()->json(new OrderResource($order))->setStatusCode(201);
    }

    // Просмотр всех заказов
    public function index() {
        $orders = Order::all();
        return response()->json(OrderResource::collection($orders))->setStatusCode(200, 'Успешно');
    }

    // Просмотр заказа
    public function show($id) {
        $order = Order::find($id);

        if (!$order) {
            return response()->json('Заказ не найден')->setStatusCode(404, 'Not found');
        }

        return response()->json(new OrderResource($order))->setStatusCode(200, 'Успешно');
    }

    // Редактирование заказа
    public function update(OrderUpdateRequest $request, $id) {
        $order = Order::find($id);

        if (!$order) {
            return response()->json('Заказ не найден')->setStatusCode(404, 'Not found');
        }

        $order->update($request->all());
        return response()->json(new OrderResource($order))->setStatusCode(200, 'Изменено');
    }

    // Удаление заказа
    public function destroy($id) {
        $order = Order::find($id);

        if (!$order) {
            return response()->json('Заказ не найден')->setStatusCode(404, 'Not found');
        }

        Order::destroy($id);
        return response()->json('Заказ удален')->setStatusCode(200, 'Удалено');
    }
}
