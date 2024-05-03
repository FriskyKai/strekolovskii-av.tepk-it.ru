<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderListAdditiveCreateRequest;
use App\Http\Requests\OrderListAdditiveUpdateRequest;
use App\Http\Resources\OrderListAdditiveResource;
use App\Models\OrderListAdditive;
use Illuminate\Http\Request;

class OrderListAdditiveController extends Controller
{
    // Добавление добавки в состав заказа
    public function create(OrderListAdditiveCreateRequest $request) {
        $orderListAdditive = OrderListAdditive::create($request->all());

        return response()->json(new OrderListAdditiveResource($orderListAdditive))->setStatusCode(201);
    }

    // Просмотр всех записей состав заказа_добавка
    public function index() {
        $orderListAdditives = OrderListAdditive::all();
        return response()->json(OrderListAdditiveResource::collection($orderListAdditives))->setStatusCode(200, 'Успешно');
    }

    // Просмотр всех добавок в составе заказа
    public function showByOrderList($id){
        $orderListAdditives = OrderListAdditive::where('order_list_id', $id)->get();

        return response(OrderListAdditiveResource::collection($orderListAdditives));
    }

    // Просмотр добавки в составе заказа
    public function show($id) {
        $orderListAdditive = OrderListAdditive::find($id);

        if (!$orderListAdditive) {
            return response()->json('Добавка в составе заказа не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json(new OrderListAdditiveResource($orderListAdditive))->setStatusCode(200, 'Успешно');
    }

    // Редактирование добавки в составе заказа
    public function update(OrderListAdditiveUpdateRequest $request, $id) {
        $orderListAdditive = OrderListAdditive::find($id);

        if (!$orderListAdditive) {
            return response()->json('Добавка в составе заказа не найдена')->setStatusCode(404, 'Not found');
        }

        $orderListAdditive->update($request->all());
        return response()->json(new OrderListAdditiveResource($orderListAdditive))->setStatusCode(200, 'Изменено');
    }

    // Удаление добавки из состава заказа
    public function destroy($id) {
        $orderListAdditive = OrderListAdditive::find($id);

        if (!$orderListAdditive) {
            return response()->json('Добавка в составе заказа не найдена')->setStatusCode(404, 'Not found');
        }

        OrderListAdditive::destroy($id);
        return response()->json('Добавка в составе заказа удалена')->setStatusCode(200, 'Удалено');
    }
}
