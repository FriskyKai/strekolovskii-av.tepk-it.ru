<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderListCreateRequest;
use App\Http\Requests\OrderListUpdateRequest;
use App\Http\Resources\OrderListResource;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    // Создание состава заказа
    public function create(OrderListCreateRequest $request) {
        $orderList = OrderList::create($request->all());

        return response()->json(new OrderListResource($orderList))->setStatusCode(201);
    }

    // Просмотр всех составов заказов
    public function index() {
        $orderLists = OrderList::all();
        return response()->json(OrderListResource::collection($orderLists))->setStatusCode(200, 'Успешно');
    }

    // Просмотр всех составов заказа по номеру заказа
    public function showByOrder($id) {
        $orderLists = OrderList::where('order_id', $id)->get();

        return response()->json(OrderListResource::collection($orderLists))->setStatusCode(200, 'Успешно');
    }

    // Просмотр состава заказа
    public function show($id) {
        $orderList = OrderList::find($id);

        if (!$orderList) {
            return response()->json('Состав заказа не найден')->setStatusCode(404, 'Not found');
        }

        return response()->json(new OrderListResource($orderList))->setStatusCode(200, 'Успешно');
    }

    // Редактирование состава заказа
    public function update(OrderListUpdateRequest $request, $id) {
        $orderList = OrderList::find($id);

        if (!$orderList) {
            return response()->json('Состав заказа не найден')->setStatusCode(404, 'Not found');
        }

        $orderList->fill($request->all());

        $orderList->total = $orderList->count * $orderList->price;

        $orderList->save();

        return response()->json(new OrderListResource($orderList))->setStatusCode(200, 'Изменено');
    }

    // Удаление состава заказа
    public function destroy($id) {
        $orderList = OrderList::find($id);

        if (!$orderList) {
            return response()->json('Состав заказа не найден')->setStatusCode(404, 'Not found');
        }

        OrderList::destroy($id);
        return response()->json('Состав заказа удален')->setStatusCode(200, 'Удалено');
    }
}
